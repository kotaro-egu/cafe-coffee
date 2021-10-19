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
}


