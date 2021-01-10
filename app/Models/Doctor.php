<?php
# @Date:   2020-11-17T20:27:17+00:00
# @Last modified time: 2021-01-10T12:19:47+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use HasFactory;

  //declaring the relationship between doctors and Users table
  //the doctor role belomngs to a user
  public function user()
  {
  return $this->belongsTo('App\Models\User');
}

//declaring the relationship between the doctor and visits table
//a doctor has many visits
public function visits()
{
return $this->hasMany('App\Models\Visit', 'doctor_id');
}
}
