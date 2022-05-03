<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable
{

    protected $table = 'clients';
    protected $fillable=['name','phone','password','email','d_o_b','last_donation_date','pin_code','blood_type_id','city_id'];
    public $timestamps = true;


    public function posts()
    {
        return $this->belongsToMany('App\Model\Post');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Model\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

    public function governorate()
    {
        return $this->belongsToMany('App\Model\Governorate');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Model\DonationRequest', 'client_id');
    }

    public function notification()
    {
        return $this->hasMany('App\Model\Notification', 'client_id');
    }

    public function bloodtype()
    {
        return $this->belongsTo('App\Model\BloodType', 'blood_type_id');
    }
    public function tokens()
    {
        return $this->hasMany('App\Model\Token');
    }


    protected $hidden=[
        'password','api_token'
    ];

}
