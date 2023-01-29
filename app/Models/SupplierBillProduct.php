<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierBillProduct extends Model
{
    use HasFactory;
    protected $table = 'supplier_bill_products';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function supplierBill()
    {
        return $this->belongsTo(SupplierBill::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
