<?php

namespace App\Http\Resources;

use App\Models\Deployment;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectResource
{

    public function getProjectsCount(): int
    {
        return Project::query()->count();
    }

    public function getLastProjectsDeployments(int $limit = null): Collection
    {
        $deployments = Deployment::query()
            ->leftJoin('projects', 'deployments.project_id', '=', 'projects.id')
            ->leftJoin('project_instances', 'deployments.id', '=', 'project_instances.last_deployment_id')
            ->distinct('deployments.project_id')
            ->select([
                'projects.name as project_name',
                'deployments.branch',
                'project_instances.domain as url'
            ]);
        if ($limit) {
            $deployments->limit($limit);
        }

        return $deployments->get();

    }
}
