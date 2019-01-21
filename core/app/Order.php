<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
      'custom',
      'customer_id',
      'discount_type',
      'discount',
      'product_total',
      'payment_type',
      'total_amount',
      'pay_amount',
      'due_amount',
      'instalment_id',
      'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function instalment()
    {
        return $this->belongsTo(Instalment::class,'instalment_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }

}
