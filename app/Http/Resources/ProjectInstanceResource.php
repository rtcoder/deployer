<?php

namespace App\Http\Resources;

use App\Models\ProjectInstance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProjectInstanceResource
{

    public function count(int $projectId): int
    {
        return ProjectInstance::query()
            ->where('project_id', $projectId)
            ->count();
    }

    public function list(int $projectId, int $page = 1, int $limit = 10, $fields = ['*']): Collection
    {
        if ($page <= 0) {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        return ProjectInstance::query()
            ->where('project_id', $projectId)
            ->select($fields)
            ->limit($limit)->offset($offset)->get();
    }

    public function find(int $id): Model|null
    {
        return ProjectInstance::query()->find($id);
    }
}
