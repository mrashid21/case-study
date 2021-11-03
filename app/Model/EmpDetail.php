<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Address;

class EmpDetail extends Model
{
    //
    use SoftDeletes;

    protected $table = 'emp_details';
    protected $guarded = [];

    function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
