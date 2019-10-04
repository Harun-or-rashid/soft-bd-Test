<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded=[];

    public function branches() {
        return $this->hasMany(Branch::class);
    }
}
