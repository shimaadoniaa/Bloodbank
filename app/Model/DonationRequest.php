<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    protected $fillable=['patient_name','age','blood_type_id','bags_num','hospital_address','governorate_id','hospital_phone','details','city_id','latitude','longitude','hospital_name','client_id'];
    public $timestamps = true;

    public function bloodType()
    {
        return $this->belongsTo('App\Model\BloodType', 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Model\Notification', 'donation_request_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Model\Client', 'client_id');
    }

}
