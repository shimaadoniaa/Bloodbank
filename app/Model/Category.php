<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];
    protected $table = 'categories';
    public $timestamps = true;

    public function Posts()
    {
        return $this->hasMany('App\Model\Post', 'Category_id');
    }

}
