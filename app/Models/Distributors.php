<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributors extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
        'address',
    ];
    public function distributor()
    {
        return $this->belongsTo(DistributorProducts::class,'distributor_id', 'id');
    }
}
