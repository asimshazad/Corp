<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected  $guarded = [''];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}
