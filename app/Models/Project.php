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
    const TYPE_NODEJS = 'nodejs';

    const TYPES = [
        self::TYPE_LARAVEL,
        self::TYPE_ANGULAR,
        self::TYPE_REACT,
        self::TYPE_NODEJS
    ];

    const TYPES_NAMES = [
        self::TYPE_LARAVEL => 'Laravel',
        self::TYPE_ANGULAR => 'Angular',
        self::TYPE_REACT => 'React',
        self::TYPE_NODEJS => 'NodeJS'
    ];

    protected $fillable = [
        'name',
        'repo',
        'type',
    ];
}
