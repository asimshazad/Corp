<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = [''];

    public function specifications()
    {
        return $this->hasMany('App\Specification');
    }

    public function codes()
    {
        return $this->hasMany(Code::class,'product_id');
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
