<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends BaseModel
{
    use SoftDeletes;
    protected $table = 'blog';
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
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
