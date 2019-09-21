<?php

namespace App;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    // use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'phone', 'slug', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Début de code pour le système d'authentification JWT

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // End of JWT code 
    public function annonces()
    {
        // return $this->hasOne(User::class);
        return $this->hasMany (Annonce::class);
    }


    public function profil()
    {
        // return $this->hasOne(User::class);
        return $this->hasOne (Profil::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return asset("api/annonces/user/$this->slug");
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes ['password'] = bcrypt($value);
    }

    public function setPseudoAttribute($value)
    {
        $this->attributes['pseudo'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
