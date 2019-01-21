<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstalmentTime extends Model
{
    use SoftDeletes;

    protected $table = 'instalment_times';

    protected $guarded = [''];

    public function instalment()
    {
        return $this->belongsTo(OrderInstalment::class,'order_instalment_id');
    }



}
