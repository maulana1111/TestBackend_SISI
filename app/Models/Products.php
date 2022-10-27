<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
    ];
    public function product()
    {
        return $this->belongsTo(DistributorProducts::class, 'product_id', 'id');
    }
}
