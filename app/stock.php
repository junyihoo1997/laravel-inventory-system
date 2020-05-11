<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    //
    protected $fillable = ['modelName','type','quantity','status','remark'];
}
