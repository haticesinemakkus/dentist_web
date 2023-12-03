<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends BaseModel
{
    use SoftDeletes;
    protected $table = 'team';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'title',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
