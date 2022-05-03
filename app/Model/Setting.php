<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    protected $fillable=['notification_settings_text','about_app','phone',
        'email','fb_link','insta_link','whatsup_link',
        'tw_link','google_link','youtube'];
    public $timestamps = true;

}
