<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularBillProducts extends Model
{
    use HasFactory;
    protected $table = 'regular_bill_products';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function regularBill()
    {
        return $this->belongsTo(RegularBill::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
