<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{   
    protected $guarded = [""];
    
    public function annonces()
    {   
        return $this->belongsTo ('App\Annonce', 'annonce_id', 'id');
    } 
}
