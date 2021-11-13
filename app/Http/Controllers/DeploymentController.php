<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectDeploymentConfigurationResource;
use App\Http\Resources\ProjectResource;
use App\Models\Deployment;
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
        return view('pages.deployments.index', [
            'deployments' => $projectDeploymentConfigurationResource->list($project_id, $page),
            'projectName' => $projectResource->getProjectName($project_id),
            'projectId' => $project_id,
            'deploymentStatusesNames' => Deployment::STATUSES_NAMES
        ]);
    }

    public function show(
        int                                    $project_id,
        int                                    $id,
        ProjectDeploymentConfigurationResource $projectDeploymentConfigurationResource,
        ProjectResource                        $projectResource
    ): Renderable
    {
        return view('pages.deployments.show', [
            'deployment' => $projectDeploymentConfigurationResource->find($id),
            'projectName' => $projectResource->getProjectName($project_id),
            'deploymentStatusesNames' => Deployment::STATUSES_NAMES
        ]);
    }

}
