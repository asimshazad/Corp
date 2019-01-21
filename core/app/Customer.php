<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'phone',
        'phone2',
        'job',
        'cast',
        'account_no',
        'father_name',
        'address',
    ];
}
