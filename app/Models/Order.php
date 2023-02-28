<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    
    
    public function fetchIndexOrders(){

        if(auth()->user()->role == "admin"){
            return Order::selectRaw('
            users.name AS customer,
            orders.product_code,
            stores.product,
            orders.uuid_code AS uuid,
            orders.total_price,
            orders.stock,
            orders.created_at
        ')
        ->where('status', 'waitConfirmation')
        ->join('users', 'orders.user_id', 'users.id')
        ->join('stores', 'orders.product_code', 'stores.product_code')
        ->latest()
        ->paginate(15);
        }else{
            return Order::selectRaw('
            users.name AS customer,
            orders.product_code,
            stores.product,
            orders.uuid_code AS uuid,
            orders.total_price,
            orders.stock,
            orders.status,
            orders.created_at
        ')
        ->where('user_id', auth()->user()->id)
        ->join('users', 'orders.user_id', 'users.id')
        ->join('stores', 'orders.product_code', 'stores.product_code')
        ->latest()
        ->paginate(15);
        }
    
    }

    use HasFactory;
}
