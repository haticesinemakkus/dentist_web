<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes, HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'surname','title', 'phone', 'email', 'password','is_active', 'last_login', 'created_by', 'updated_by', 'deleted_by','role_id'];

    protected $dates = ['last_login'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $guard = 'admin';

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
            }
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->updated_by = $user->id;
            }
        });
        static::deleting(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->deleted_by = $user->id;
                $model->save();
            }
        });
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }
}
