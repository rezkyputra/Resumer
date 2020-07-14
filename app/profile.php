<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = "profiles";
    protected $fillable = [
        'hobby', 'gender', 'country', 'summary', 'address', 'img', 'placeOfBirth', 'dateOfBirth', 'linkGit', 'linkFace', 'linkLinked', 'linkTwitter', 'userId'
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
