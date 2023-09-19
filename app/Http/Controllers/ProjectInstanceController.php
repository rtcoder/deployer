<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectInstanceResource;
use App\Http\Resources\ProjectResource;
use App\Models\Deployment;
use App\Models\ProjectInstance;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ProjectInstanceController extends Controller
{

    public function index(
        int                     $project_id,
        Request                 $request,
        ProjectInstanceResource $projectInstanceResource,
        ProjectResource         $projectResource
    ): Renderable
    {
        $page = $request->get('page') ?? 1;
        return view('pages.instances.index', [
            'instances' => $projectInstanceResource->list($project_id, $page),
            'projectName' => $projectResource->getProjectName($project_id),
            'projectId' => $project_id,
        ]);
    }

    public function show(
        int                     $project_id,
        int                     $id,
        ProjectResource         $projectResource,
        ProjectInstanceResource $projectInstanceResource,
    ): Renderable
    {
        /**
         * @var ProjectInstance $instance
         */
        $instance = $projectInstanceResource->find($id);
        return view('pages.instances.show', [
            'instance' => $instance,
            'deployment' => null,
            'projectName' => $projectResource->getProjectName($project_id),
            'deploymentStatusesNames' => Deployment::STATUSES_NAMES,
            'nginxConfigContent' => file_get_contents($instance->nginx_conf_file),
            'errorLogContent' => file_get_contents($instance->error_log_file),
            'accessLogContent' => file_get_contents($instance->access_log_file),
        ]);
    }

}
