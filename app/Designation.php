<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
protected $guarded=[];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
