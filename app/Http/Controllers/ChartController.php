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

    public function users(Request $request) {

        $chart = Charts::database(User::all(),'line', 'chartjs')
            ->title('Users')
            ->elementLabel("Total");


            if($request->has('groupBy')){
                switch($request->input('groupBy')) {
                    case 'Day':
                        $chart->groupByDay($request->input('month'),$request->input('year'), true);
                        break;
                    case 'Month':
                        $chart->groupByMonth($request->input('year'), true);
                        break;
                    case 'Year':
                        $chart->groupByYear(true);
                        break;
                }
            } else {
                $chart->lastByDay(7, true);
            }

//            ->groupByMonth('2018', true);
        return view('charts.users', compact('chart'));
    }
}
