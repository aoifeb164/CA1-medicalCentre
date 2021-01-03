<?php
# @Date:   2020-12-22T16:38:35+00:00
# @Last modified time: 2021-01-03T17:47:08+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
//delcaring the relationship between patients/doctors table and the visits tables
//visits have many doctors and patients

//     public function patients()
//     {
//     return $this->hasMany('App\Models\Patient');
//   }
//   public function doctors()
//   {
//   return $this->hasMany('App\Models\Doctor');
// }
}
