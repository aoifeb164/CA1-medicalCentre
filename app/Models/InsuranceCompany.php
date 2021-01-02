<?php
# @Date:   2020-11-22T18:43:42+00:00
# @Last modified time: 2021-01-02T13:42:06+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use HasFactory;

    //declaring the relationship between patients and insurance companies
    //1 insurance company covers many patients
    public function patients()
    {
    return $this->hasMany('App\Models\Patient');
  }
}
