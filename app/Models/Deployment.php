<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string branch
 * @property int project_id
 * @property int status
 * @property array env_vars
 * @property string output
 * @property bool result
 */
class Deployment extends Model
{
    const STATUS_SUCCESS = 0;
    const STATUS_PENDING = 1;
    const STATUS_FAILED = 2;

    const STATUSES = [
        self::STATUS_SUCCESS,
        self::STATUS_PENDING,
        self::STATUS_FAILED
    ];

    const STATUSES_NAMES = [
        self::STATUS_SUCCESS => 'Success',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_FAILED => 'Failed'
    ];

    protected $fillable = [
        'branch',
        'project_id',
        'status',
        'env_vars',
        'result',
        'output',
    ];

    protected $casts = [
        'env_vars' => 'array'
    ];

}
