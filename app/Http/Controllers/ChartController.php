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
        //Gather data to display
        $stats = [
            'totalSales' => Order::sum('total_price'),
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'orderCount' => Order::count()
        ];

        return view('charts.index', compact('stats'));
    }

    public function users(Request $request) {
        //create a line chart to display the number of users registered
        $chart = Charts::database(User::all(),'line', 'chartjs')
            ->title('Registered users')
            ->elementLabel("Users");

        //if the group by option is used, group the data in the chosen way
        if($request->has('groupBy')){
            $groupBy = $request->input('groupBy');
            $month = $request->input('month');
            $year = $request->input('year');
            switch($groupBy) {
                case 'Day':
                    $chart->groupByDay($month, $year, true);
                    break;

                case 'Month':
                    $chart->groupByMonth($year, true);
                    break;

                case 'Year':
                    $chart->groupByYear(4, true);
                    break;
            }
        } else {
            //if group by options is not chosen, default is set
            $chart->lastByDay(14, true);
        }

            return view('charts.users', compact('chart'));
    }

    public function products() {
        //create a chart to display numbers of products in each category
        $chartCategories = Charts::database(Product::with('category')->get(),'pie', 'chartjs')
            ->title('Product distribution by category')
            ->elementLabel("Products")
            ->groupBy('category_id', 'category.name');

        //create a chart for displaying best rated products
        $mostPopular = Product::with('reviews')->select( 'products.name', DB::raw('avg(reviews.rating) as rating'))
            ->join('reviews', 'reviews.product_id', '=', 'products.id')
            ->groupBy('products.id')
            ->orderBy('rating')
            ->take(10)->get();

        $chartProducts = Charts::create('bar', 'chartjs')
            ->title('10 Best rated products')
            ->elementLabel('Average rating')
            ->labels($mostPopular->pluck('name'))
            ->values($mostPopular->pluck('rating'));

        return view('charts.products', compact('chartCategories', 'chartProducts'));
    }

    public function sales(Request $request) {
        //create a chart for displaying sales over time
        $chartSales = Charts::database(Order::all(),'line', 'chartjs')
            ->title('Sales over time')
            ->elementLabel("Sales");
        if($request->has('groupBy')){
            $groupBy = $request->input('groupBy');
            $month = $request->input('month');
            $year = $request->input('year');
            switch($groupBy) {
                case 'Day':
                    $chartSales->groupByDay($month, $year, true);
                    break;

                case 'Month':
                    $chartSales->groupByMonth($year, true);
                    break;

                case 'Year':
                    $chartSales->groupByYear(4, true);
                    break;
            }
        } else {
            //if group by options is not chosen, default is set
            $chartSales->lastByDay(14, true);
        }

        $profits = Order::select('created_at', 'total_price')->get();
        $chartProfits = Charts::database($profits,'line', 'chartjs')
            ->title('Profit over time')
            ->elementLabel('£')
            ->aggregateColumn('total_price', 'sum');

        if($request->has('groupBy')){
            $groupBy = $request->input('groupBy');
            $month = $request->input('month');
            $year = $request->input('year');
            switch($groupBy) {
                case 'Day':
                    $chartProfits->groupByDay($month, $year, true);
                    break;

                case 'Month':
                    $chartProfits->groupByMonth($year, true);
                    break;

                case 'Year':
                    $chartProfits->groupByYear(4, true);
                    break;
            }
        } else {
            //if group by options is not chosen, default is set
            $chartProfits->lastByDay(14, true);
        }

        return view('charts.sales', compact('chartSales', 'chartProfits'));
    }
}
