<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierBill extends Model
{
    use HasFactory;
    protected $table = 'supplier_bills';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }
}
