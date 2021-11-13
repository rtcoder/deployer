<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectDeploymentConfigurationResource;
use App\Http\Resources\ProjectResource;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{

    public function index(
        int                                    $project_id,
        Request                                $request,
        ProjectDeploymentConfigurationResource $projectDeploymentConfigurationResource,
        ProjectResource                        $projectResource
    ): Renderable
    {
        $page = $request->get('page') ?? 1;
        return view('pages.project-configurations.index', [
            'deployments' => $projectDeploymentConfigurationResource->list($project_id, $page),
            'projectName' => $projectResource->getProjectName($project_id),
            'projectId' => $project_id
        ]);
    }

}
