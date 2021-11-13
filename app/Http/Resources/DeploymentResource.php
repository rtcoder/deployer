<?php

namespace App\Http\Resources;

use App\Models\Deployment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DeploymentResource
{

    public function count(int $projectId): int
    {
        return Deployment::query()
            ->where('project_id', $projectId)
            ->count();
    }

    public function list(int $projectId, int $page = 1, int $limit = 10): Collection
    {
        if ($page <= 0) {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        return Deployment::query()
            ->where('project_id', $projectId)
            ->limit($limit)->offset($offset)->get();
    }

    public function find(int $id): Model|null
    {
        return Deployment::query()->find($id);
    }
}
