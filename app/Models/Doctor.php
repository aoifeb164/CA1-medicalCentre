<?php
# @Date:   2020-11-17T20:27:17+00:00
# @Last modified time: 2021-01-07T16:41:59+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use HasFactory;

  //declaring the relationship between doctors and Users table
  public function user()
  {
  return $this->belongsTo('App\Models\User');
}
public function visits()
{
return $this->hasMany('App\Models\Visit', 'doctor_id');
}
}
