<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['client_id', 'post_id','status'];
    public $timestamps = 'true';


    public function client()
    {
        return $this->belongsTo('App\Model\Client','client_id');
    }
    public function post()
    {
        return $this->belongsTo('App\Model\Client','post_id');
    }
}
