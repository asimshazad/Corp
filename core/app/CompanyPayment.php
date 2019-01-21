<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPayment extends Model
{
    use SoftDeletes;

    protected $table = 'company_payments';

    protected $guarded = [''];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}
