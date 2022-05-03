<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    protected $fillable=['title','content','donation_request_id'];
    public $timestamps = true;

    public function donationRequest()
    {
        return $this->belongsTo('App\Model\DonationRequest', 'donation_request_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Model\Client', 'client_id');
    }

}
