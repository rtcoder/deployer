<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * @param Request $request
     * @param ProjectResource $projectResource
     * @return Renderable
     */
    public function index(Request $request, ProjectResource $projectResource): Renderable
    {
        $page = $request->get('page') ?? 1;
        return view('pages.projects.index', [
            'projects' => $projectResource->list($page)
        ]);
    }

    public function add(): Renderable
    {
        return view('pages.projects.add', [
            'projectTypesNames' => Project::TYPES_NAMES
        ]);
    }

    public function create(ProjectRequest $request): RedirectResponse
    {
        $project = Project::query()->create($request->all());
        if (!$project->id) {
            return redirect()->back()->withInput($request->all());
        }
        return redirect()->route('projects');
    }

    public function show(int $id, ProjectResource $projectResource): Renderable
    {
        return view('pages.projects.edit', [
            'project' => $projectResource->find($id),
            'projectTypesNames' => Project::TYPES_NAMES
        ]);
    }

    public function update(int $id, ProjectRequest $request, ProjectResource $projectResource): RedirectResponse
    {
        $project = $projectResource->find($id);
        $project->update($request->all());
        return redirect()->route('projects');
    }
}
