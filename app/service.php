<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class service extends Model
{
    //
    protected $fillable = ['modelName','customerId','type','flowTagNumber','serialNumber','quantity','status','remark','dateIn','dateOut'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($post) {
    //         $post->{$post->getKeyName()} = (string) Str::uuid();
    //     });
    // }

    // public function getIncrementing()
    // {
    //     return false;
    // }

    // public function getKeyType()
    // {
    //     return 'string';
    // }

    // public function customers(){
        
    // }

}
