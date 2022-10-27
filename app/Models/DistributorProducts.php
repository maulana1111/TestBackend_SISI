<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Distributors;

class DistributorProducts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'distributor_id',
        'price'
    ];
    public function product()
    {
        return $this->hasOne(Products::class, 'id');
    }
    public function distributor()
    {
        return $this->hasOne(Distributors::class, 'id');
    }
}
