<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends BaseModel
{
    use SoftDeletes;
    protected $table = 'blog_category';
    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
