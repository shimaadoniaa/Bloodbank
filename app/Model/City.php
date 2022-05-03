<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name','governorate_id'];
    protected $table = 'cities';
    public $timestamps = true;

    public function governorate()
    {
        return $this->belongsTo('App\Model\Governorate', 'governorate_id');
    }

    public function client()
    {
        return $this->hasMany('App\Model\Client', 'city_id');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Model\DonationRequest', 'city_id');
    }

}
