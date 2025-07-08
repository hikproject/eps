<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'cd_customer',
        'part_number'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cd_customer', 'cd_customer');
    }
}
