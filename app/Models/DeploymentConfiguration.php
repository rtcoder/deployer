<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string branch
 * @property int project_id
 * @property bool auto_deployment
 * @property array env_vars
 * @property string domain
 */
class DeploymentConfiguration extends Model
{
    protected $fillable = [
        'branch',
        'auto_deployment',
        'env_vars',
        'domain',
    ];

    protected $guarded = [
        'project_id',
    ];

    protected $casts = [
        'env_vars' => 'array'
    ];
}
