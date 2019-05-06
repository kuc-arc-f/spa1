<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $fillable = [
        'name',
    ];

//    protected $primaryKey = "dept_id";
    //
    //hasMany設定
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
