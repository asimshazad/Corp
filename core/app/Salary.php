<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'name',
        'staff_id',
        'paid',
        'date',
        'note',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }


}
