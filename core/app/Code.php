<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'codes';

    protected $guarded = [''];

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}
