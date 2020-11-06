<?php
# @Date:   2020-11-06T12:25:44+00:00
# @Last modified time: 2020-11-06T12:40:51+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
