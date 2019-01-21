<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionLog extends Model
{
    use SoftDeletes;

    protected $table = 'transaction_logs';

    protected $guarded = [''];


}
