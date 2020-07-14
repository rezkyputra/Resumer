<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    protected $table = "education";
    protected $fillable = ['name', 'majors', 'startDate', 'endDate', 'userId'];

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
