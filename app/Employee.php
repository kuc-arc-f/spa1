<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'name',
        'dept_id',
    ];

    //belongsTo設定
    public function dept()
    {
        return $this->belongsTo('App\Dept');
    }
}
