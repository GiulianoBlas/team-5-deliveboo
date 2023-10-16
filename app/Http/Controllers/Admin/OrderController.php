<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// Controller
use App\Http\Controllers\Controller;


// Models
use App\Models\Order;

class OrderController extends Controller
{



    public function returnView() {


        return view('admin.orders.restaurant-orders');

    }

    public function destroy(string $id) {

        $order = Order::findOrFail($id);

        $order->delete();

        return redirect()->route('orders.restaurant-orders');

    }
}
