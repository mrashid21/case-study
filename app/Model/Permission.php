<?php

namespace App\Model;

use Spatie\Permission\Models\Permission as BaseModel;

class Permission extends BaseModel
{
    //each category might have one parent
    public function parent()
    {
        return $this->belongsTo('App\Model\Permission', 'parent_id');
    }

    //each category might have multiple children
    public function children()
    {
        return $this->hasMany('App\Model\Permission', 'parent_id')->orderBy('id', 'asc');
    }
}
