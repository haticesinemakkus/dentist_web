<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends BaseModel
{
    use SoftDeletes;
    protected $table = 'article_category';
    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
