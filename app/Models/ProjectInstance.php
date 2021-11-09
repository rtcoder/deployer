<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string branch
 * @property int project_id
 * @property int last_deployment_id
 * @property string domain
 * @property string nginx_conf_file
 * @property string access_log_file
 * @property string error_log_file
 * @property string project_dir
 * @property string db_name
 */
class ProjectInstance extends Model
{
    protected $fillable = [
        'branch',
        'project_id',
        'last_deployment_id',
        'domain',
        'nginx_conf_file',
        'access_log_file',
        'error_log_file',
        'project_dir',
        'db_name',
    ];

}
