<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function checked() {
        $orders = 'ok';

        return response()->json([
            'orders'=>$orders
        ]);
    }
}
