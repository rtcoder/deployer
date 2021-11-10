<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param ProjectResource $projectResource
     * @return Renderable
     */
    public function index(ProjectResource $projectResource): Renderable
    {
        return view('home', [
            'projects_count' => $projectResource->count(),
            'last_deployments' => $projectResource->getLastProjectsDeployments(10)
        ]);
    }
}
