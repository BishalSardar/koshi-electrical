<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty_Guarantee extends Model
{
    use HasFactory;
    protected $table = 'warranty__guarantees';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
