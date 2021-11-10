<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'title' => 'required',
        'body'=> 'required',
         'image'=>'required',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}


