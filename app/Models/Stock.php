<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
