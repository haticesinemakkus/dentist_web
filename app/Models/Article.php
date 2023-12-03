<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends BaseModel
{
    use SoftDeletes;
    protected $table = 'article';
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'author',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
