<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'charge_id',
        'total',
    ];

    // Définir les relations
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }


public function product()
{
    return $this->belongsTo(Product::class);
}

}
