<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAccount extends Model
{
    use HasFactory;
    protected $table = 'staff_accounts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
}
