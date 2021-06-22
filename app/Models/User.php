<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
     public $timestamps =false;
    public function roles()
    {
        return $this->hasMany(Role::class,'id','role_id');
    }
    function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    function drinks()
    {
        return $this->hasMany('App\Models\Drink');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'address',
        'city',
        'number',
        'supplier',
        'date_of_join',
        'salary',
        'email',
        'password',
        'role_id',
        'status',
        'picture',   
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
