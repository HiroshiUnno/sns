<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
  protected $primaryKey = [
      'following_id',
      'followed_id'
  ];
  protected $fillable = [
      'following_id',
      'followed_id'
  ];
  public $timestamps = false;
  public $incrementing = false;
}
