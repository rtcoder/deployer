<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string branch
 * @property int project_id
 * @property int status
 * @property array env_vars
 * @property string domain
 * @property string output
 * @property bool result
 */
class Deployment extends Model
{
    protected $fillable = [
        'branch',
        'project_id',
        'status',
        'env_vars',
        'domain',
        'result',
        'output',
    ];

    protected $casts = [
        'env_vars' => 'array'
    ];

}
