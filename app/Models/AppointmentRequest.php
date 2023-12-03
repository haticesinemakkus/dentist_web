<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentRequest extends BaseModel
{
    use SoftDeletes;
    protected $table = 'appointment_request';
    protected $fillable = [
        'name',
        'phone',
        'services',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
