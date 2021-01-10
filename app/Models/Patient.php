<?php
# @Date:   2020-11-17T19:52:49+00:00
# @Last modified time: 2021-01-10T12:19:36+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    //delcaring the relationship between patients and users tables
    //the patient role belongs to a suer
    public function user()
    {
    return $this->belongsTo('App\Models\User');
  }
  //declaring the relationship between patients and insurance companies
  //patients can only be covered by one insurance company
    public function insurance_company()
    {
    return $this->belongsTo('App\Models\InsuranceCompany');
  }
  //declaring the relationship between the patient and visits table
  //a patient has many visits
  public function visits()
  {
  return $this->hasMany('App\Models\Visit', 'patient_id');
}
}
