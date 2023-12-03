<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends BaseModel
{
    use SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'content',
        'order',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
