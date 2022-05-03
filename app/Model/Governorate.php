<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    protected  $fillable=['name'];
    public $timestamps = true;

    public function cities()
    {
        return $this->hasMany('App\Model\City', 'governorate_id');
    }

    public function client()
    {
        return $this->belongsToMany('App\Model\Client');
    }

}
