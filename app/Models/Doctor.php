<?php
# @Date:   2020-11-17T20:27:17+00:00
# @Last modified time: 2020-12-29T12:54:34+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use HasFactory;
  public function user()
  {
  return $this->belongsTo('App\Models\User');
}
}
