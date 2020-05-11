<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    //
    protected $fillable = ['modelName','type','flowTagNumber','serialNumber','quantity','status','remark'];

}
