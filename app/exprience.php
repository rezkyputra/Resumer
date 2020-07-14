<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exprience extends Model
{
    protected $table = "expriences";
    protected $fillable = ['jobTitle', 'type', 'company', 'startDate', 'endDate', 'userId'];

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
