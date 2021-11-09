<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use Illuminate\Contracts\Support\Renderable;
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
        return view('pages.projects', [
            'projects' => $projectResource->getProjects($page)
        ]);
    }
}
