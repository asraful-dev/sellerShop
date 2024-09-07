<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
}
