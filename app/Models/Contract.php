<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
