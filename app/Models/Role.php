<?php
# @Date:   2020-11-06T12:25:44+00:00
# @Last modified time: 2021-01-02T13:57:44+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //declaring the relationship between roles and Users table
    //1 role belongs to many users
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
