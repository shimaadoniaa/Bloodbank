<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';
    protected $fillable=['name','email','phone','fax','subject','message'];
    public $timestamps = true;

}
