<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    static $rules = [
        'name' => 'required',
        'edad' => 'required',
        'dui' => 'required',
        'telefono' => 'required',
        'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen',
        'name',
        'edad',
        'dui',
        'telefono',
        'email',
        'rol',
        'password',

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


    public function adminlte_desc()
    {
        return "Administrador";
    }
    public function adminlte_profile_url()
    {
        return "profile/username";
    }
    //funcion agregada para que funcione bien la app
    public function adminlte_image()
    {
        return $this->imagen;
    }
}
