<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends BaseModel
{
    use SoftDeletes;
    protected $table = 'appointment';
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'date',
        'message',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
