<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $table = 'specifications';

    protected $guarded = [''];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
