<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
     protected $fillable=['name'];
    protected $table = 'blood_types';
    public $timestamps = true;



    public function donationRequests()
    {
        return $this->hasMany('App\Model\DonationRequest', 'blood_type_id');
    }

    public function client()
    {
        return $this->hasMany('App\Model\Client', 'blood_type_id');
    }

}
