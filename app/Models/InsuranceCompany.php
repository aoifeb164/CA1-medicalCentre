<?php
# @Date:   2020-11-22T18:43:42+00:00
# @Last modified time: 2020-11-22T19:32:01+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use HasFactory;
    public function patients()
    {
    return $this->hasMany('App\Models\Patient');
  }
}
