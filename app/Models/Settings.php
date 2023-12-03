<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends BaseModel
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = [
        'about_us',
        'working_hours',
        'phone1',
        'email',
        'address1',
        'whatsapp_phone',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
