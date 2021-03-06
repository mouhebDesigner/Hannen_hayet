<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public static function user(){
           
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'grade',
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

    public function isAdmin(){
        return Auth::user()->grade == "directeur";
    }
    public function isChef(){
        return Auth::user()->grade == "chef";
    }
    public function isEmploye(){
        return Auth::user()->grade == "employe";
    }



  


    public function isResponsable(){
        return Auth::user()->grade == "responsable";
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}
