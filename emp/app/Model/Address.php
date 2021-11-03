<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\EmpDetail;

class Address extends Model
{
    //
    protected $table = 'addresses';
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(EmpDetail::class,'address_id');
    }
}
