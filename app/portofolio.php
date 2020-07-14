<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portofolio extends Model
{    
    protected $table = "portofolios";
    protected $fillable = ['name', 'img', 'linkDemo', 'linkRepo', 'desc', 'userId'];

    public function User(){
        return $this->belongsTo('App\User', 'userId');
    }
}
