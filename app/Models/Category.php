<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use SoftDeletes, HasFactory;

    protected $table = 'categories';

    protected $fillable = ['title','image','is_active', 'created_by', 'updated_by', 'deleted_by'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
