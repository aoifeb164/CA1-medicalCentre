<?php
# @Date:   2020-11-17T19:52:49+00:00
# @Last modified time: 2020-12-22T18:09:54+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public function insurance_company()
    {
    return $this->belongsTo('App\Models\InsuranceCompany');
  }
}
