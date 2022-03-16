<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function list(){
        $orders = Order::paginate(10);
        return view('admin.order.index',\compact('orders'));
    }
}
