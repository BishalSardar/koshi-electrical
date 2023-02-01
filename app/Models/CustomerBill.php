<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBill extends Model
{
    use HasFactory;
    protected $table = 'customer_bills';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract');
    }
}
