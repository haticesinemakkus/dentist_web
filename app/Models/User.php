<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use SoftDeletes, HasFactory, HasApiTokens;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'surname', 'phone', 'email', 'sms_verified_code', 'password', 'photo',  'is_active', 'last_login', 'created_by', 'updated_by', 'deleted_by'];

    protected $dates = ['birthday', 'last_login'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $guard = 'user';

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

    public function scopeActive()
    {
        return $this->where('is_active', 1);
    }
}
