<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class SSS extends BaseModel
{
    use SoftDeletes;
    protected $table = 'sss';
    protected $fillable = [
        'question',
        'answer',
        'order',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
