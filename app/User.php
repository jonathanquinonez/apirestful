<?php

namespace App;

use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    const USUARIO_VERIFICADO = '1';
    const USUARIO_NO_VERIFICADO = '0';


    const USUARIO_ADMINISTRADOR = 'true';
    const USUARIO_REGULAR = 'false';



    protected $table = 'users'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];


    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }

     public function getNameAttribute($valor)
     {
        return ucfirst($valor);
     }

      public function setEmailAttribute($valor)
      {
        $this->attributes['email'] = strtolower($valor); 
      }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'verification_token',
    ];

    public function esVerificado()
    {
        return $this->verified == User::USUARIO_VERIFICADO;
    }
    Public function esAdministrador()
    {
        return $this->admin == User::USUARIO_ADMINISTRADOR;
    }

    public static function generarVerificationToken()
    {
        return str_random(40);
    }

}
