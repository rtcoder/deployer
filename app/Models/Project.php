<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string repo
 * @property int type
 */
class Project extends Model
{
    const TYPE_LARAVEL = 'laravel';
    const TYPE_REACT = 'react';
    const TYPE_ANGULAR = 'angular';
    const TYPE_NODEJS = 'node';

    protected $fillable = [
        'name',
        'repo',
        'type',
    ];
}
