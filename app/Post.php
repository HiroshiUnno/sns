<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /*
    protected $fillable = [
      protected perPage = 1;
    ]
    */
    protected $guarded = array('id');
    protected $dates = [
      'created_at',
      'updated_at'
    ];
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
