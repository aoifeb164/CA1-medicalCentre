<?php
# @Date:   2020-12-22T16:38:35+00:00
# @Last modified time: 2021-01-07T16:47:14+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
//delcaring the relationship between patients/doctors table and the visits tables
//visits have many doctors and patients

    public function patient()
    {
    return $this->belongsTo('App\Models\Patient', 'patient_id');
  }
  public function doctor()
  {
  return $this->belongsTo('App\Models\Doctor', 'doctor_id');
}
}
