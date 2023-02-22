<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBillProduct extends Model
{
    use HasFactory;
    protected $table = 'customer_bill_products';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function customerBills()
    {
        return $this->belongsTo(CustomerBill::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
