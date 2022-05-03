<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    protected $fillable=['title','image','content','details','publish_date','category_id'];
    public $timestamps = true;

    public function client()
    {
        return $this->belongsToMany('App\Model\Client');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'Category_id');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        return $query->where(function($query) use($keyword){
            $query->where('title','LIKE','%'.$keyword.'%');
            $query->orWhere('content','LIKE','%'.$keyword.'%');
            $query->orWhere('keywords','LIKE','%'.$keyword.'%');
        });
    }

}
