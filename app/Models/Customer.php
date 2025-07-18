<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'cd_customer',
        'name',
        'address_office',
        'address_storage'
    ];

    public function parts()
    {
        return $this->hasMany(Part::class, 'cd_customer', 'cd_customer');
    }
}
