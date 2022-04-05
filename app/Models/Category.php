<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 * @property string|null $description
 */
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];
}
