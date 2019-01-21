<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repayment extends Model
{
    use SoftDeletes;
    protected $table = 'repayments';

    protected $guarded = [''];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }

}
