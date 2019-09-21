<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{   
    use SoftDeletes;

    protected $guarded = [""];

    // protected $dates = ['deleted_at'];     

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasOne(Image::class);
    } 

    public function like()
    {
        return $this->hasMany(Like::class);
    } 

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        // return asset("api/annonce/details/$this->slug");
        return "/annonce/details/$this->slug";
        // return "/mes-annonces/$this->slug";
    }

    public function getLinkAttribute()
    {
        // return asset("api/mes-annonces/details/$this->slug");
        return "/mes-annonces/details/$this->slug";
    }

}
