<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
      'title' => 'required',
      'content' => 'required',
      'url' => 'required',
    );

    public function user()
   {
       return $this->belongsTo('App\User');
   }

}
