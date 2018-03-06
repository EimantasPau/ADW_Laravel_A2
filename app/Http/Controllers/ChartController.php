<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {
        $stats = [
            'totalSales' => Order::sum('total_price'),
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'orderCount' => Order::count()
        ];

        return view('charts.index', compact('stats'));
    }
}
