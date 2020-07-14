<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{    
    protected $table = "skills";
    protected $fillable = ['name', 'userId'];

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
