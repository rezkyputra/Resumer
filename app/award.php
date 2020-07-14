<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class award extends Model
{
    protected $table = "awards";
    protected $fillable = ['name', 'company', 'startDate', 'endDate', 'userId'];

    public function users(){
        return $this->belongsTo('App\User', 'userId');
    }
}
