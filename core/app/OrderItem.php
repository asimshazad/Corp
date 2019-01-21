<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    protected $table = 'order_items';

    protected $guarded = [''];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

}
