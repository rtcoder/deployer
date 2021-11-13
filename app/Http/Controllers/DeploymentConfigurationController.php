<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectDeploymentConfigurationResource;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeploymentConfigurationController extends Controller
{

    public function index(
        int $project_id,
        Request $request,
        ProjectDeploymentConfigurationResource $projectDeploymentConfigurationResource,
        ProjectResource $projectResource
    ): Renderable
    {
        $page = $request->get('page') ?? 1;
        return view('pages.project-configurations.index', [
            'configurations' => $projectDeploymentConfigurationResource->list($project_id, $page),
            'projectName' => $projectResource->getProjectName($project_id),
            'projectId' => $project_id
        ]);
    }

    public function add(int $project_id, ProjectResource $projectResource): Renderable
    {
        return view('pages.project-configurations.add', [
            'projectTypesNames' => Project::TYPES_NAMES,
            'projectName' => $projectResource->getProjectName($project_id)
        ]);
    }

    public function create(int $project_id, ProjectRequest $request): RedirectResponse
    {
        $project = Project::query()->create($request->all());
        if (!$project->id) {
            return redirect()->back()->withInput($request->all());
        }
        return redirect()->route('projects.configurations');
    }

    public function show(
        int $project_id,
        int $id,
        ProjectDeploymentConfigurationResource $projectDeploymentConfigurationResource,
        ProjectResource $projectResource
    ): Renderable
    {
        return view('pages.project-configurations.edit', [
            'configuration' => $projectDeploymentConfigurationResource->find($id),
            'projectName' => $projectResource->getProjectName($project_id)
        ]);
    }

    public function update(
        int $id,
        ProjectRequest $request,
        ProjectDeploymentConfigurationResource $projectDeploymentConfigurationResource
    ): RedirectResponse
    {
        $project = $projectDeploymentConfigurationResource->find($id);
        $project->update($request->all());
        return redirect()->route('projects.configurations');
    }

    public function run(
        int $project_id,
        int $id,
        ProjectRequest $request,
        ProjectDeploymentConfigurationResource $projectDeploymentConfigurationResource
    )//: RedirectResponse
    {
//        $project = $projectDeploymentConfigurationResource->find($id);
//        $project->update($request->all());
//        return redirect()->route('projects.configurations');
    }
}
