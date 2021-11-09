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
    const TYPE_LARAVEL = 0;
    const TYPE_REACT = 1;

    protected $fillable = [
        'name',
        'repo',
        'type',
    ];
}
