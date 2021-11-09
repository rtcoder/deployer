<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use Illuminate\Contracts\Support\Renderable;

class ProjectController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param ProjectResource $projectResource
     * @return Renderable
     */
    public function index(ProjectResource $projectResource): Renderable
    {
        return view('home', [
            'projects_count' => $projectResource->getProjectsCount()
        ]);
    }
}
