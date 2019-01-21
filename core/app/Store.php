<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $guarded = [''];

    public function codes()
    {
        return $this->hasMany('App\Code');
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
