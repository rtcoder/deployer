<?php

namespace App\Http\Resources;

use App\Models\Project;

class ProjectResource
{

    public function getProjectsCount(): int
    {
        return Project::query()->count();
    }
}
