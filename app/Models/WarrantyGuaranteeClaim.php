<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyGuaranteeClaim extends Model
{
    use HasFactory;
    protected $table = 'warranty_guarantee_claims';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
