<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\Review;
use App\User;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->title('Registered users')
            ->elementLabel("Users");

            if($request->has('groupBy')){
                switch($request->input('groupBy')) {
                    case 'Day':
                        $chart->groupByDay($request->input('month'),$request->input('year'), true);

                        break;
                    case 'Month':
                        $chart->groupByMonth($request->input('year'), true);

                        break;
                    case 'Year':
                        $chart->groupByYear(4, true);
                        break;
                }
            } else {
                $chart->lastByDay(14, true);
            }
        $users = User::whereBetween('created_at', [Carbon::now()->subMonth(1), Carbon::now()])->get();

            return view('charts.users', compact('chart'));


    }

    public function products() {

        $chartCategories = Charts::database(Product::with('category')->get(),'pie', 'chartjs')
            ->title('Product distribution by category')
            ->elementLabel("Products")
            ->groupBy('category_id', 'category.name');
            $mostPopular = Product::with('reviews')->select( 'products.name', DB::raw('avg(reviews.rating) as rating'))
                ->join('reviews', 'reviews.product_id', '=', 'products.id')
                ->groupBy('products.id')
                ->orderBy('rating')
                ->take(10)->get();

//        $chartProducts = Charts::database($mostPopular,'bar', 'chartjs')
//            ->title('Most popular products')
//            ->elementLabel('Rating')
//            ->preaggregated(true);

        $chartProducts = Charts::create('bar', 'chartjs')
            ->title('10 Best rated products')
            ->elementLabel('Average rating')
            ->labels($mostPopular->pluck('name'))
            ->values($mostPopular->pluck('rating'));







        return view('charts.products', compact('chartCategories', 'chartProducts'));
    }

    public function sales() {

        return view('charts.sales');
    }
}
