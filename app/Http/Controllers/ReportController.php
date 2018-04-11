<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jimmyjs\ReportGenerator\ReportMedia\ExcelReport;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;

class ReportController extends Controller
{
    public function index() {
        return view('report.index');
    }

    public function generate(Request $request){
        $request->validate([
            'dateFrom' => 'required',
            'dateTo' => 'required',
            'documentTitle' => 'required'
        ]);
        //check what type of report is selected
        if($reportModel = $request->input('reportModel')){
            switch($reportModel) {
                case 'user':
                    return $this->userReport($request);
                    break;

                case 'order':
                    return $this->orderReport($request);
                    break;
            }
        }
        return view('report.index');
    }
    public function userReport(Request $request) {
        // Retrieve any filters
        $fromDate = $request->input('dateFrom');
        $toDate = $request->input('dateTo');
        $documentTitle = $request->input('documentTitle');
        $orderBy = $request->input('userOrderBy');
        $sortBy = $request->input('order');
        $reportType = $request->input('reportType');

        //create the appropriate report builder depending on the selection
        if($reportType == 'pdf') {
            $generator = new PdfReport;
        }
        if($reportType== 'excel'){
            $generator = new ExcelReport;
        }

        // Report title
        $title = 'Registered users report';

        // For displaying filters description on header
        $meta = [
            'Registered on' => $fromDate . ' to ' . $toDate,
            'Order By' => $orderBy,
            'Order' => $sortBy
        ];

        // Do some querying..
        $queryBuilder = User::select('name', 'email', 'created_at')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy($orderBy, $sortBy);
        // Set Column to be displayed
        $columns = [
            'Name',
            'Email',
            'Registered on' => 'created_at'
        ];

        return $generator->of($title, $meta, $queryBuilder, $columns)
            ->setCss([
                '.head-content' => 'border-width: 1px',
            ])
            ->editColumn('Registered on', [
                'displayAs' => function($result) {
                    return $result->created_at->format('d M Y');
                }
            ])
            ->download($documentTitle);

    }

    public function orderReport(Request $request) {
        // Retrieve any filters
        $fromDate = $request->input('dateFrom');
        $toDate = $request->input('dateTo');
        $documentTitle = $request->input('documentTitle');
        $orderBy = $request->input('orderOrderBy');
        $sortBy = $request->input('order');
        $reportType = $request->input('reportType');

        //create the appropriate report builder depending on the selection
        if($reportType == 'pdf') {
            $generator = new PdfReport;
        }
        if($reportType== 'excel'){
            $generator = new ExcelReport;
        }

        // Report title
        $title = 'Orders report';

        // For displaying filters description on header
        $meta = [
            'Orders between' => $fromDate . ' - ' . $toDate,
            'Order By' => $orderBy,
            'Order' => $sortBy
        ];

        // Do some querying..
//        $queryBuilder =DB::select(DB::raw("SELECT id, total_price, created_at, name, email FROM orders"))
        $queryBuilder = Order::with('user')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy($orderBy, $sortBy);
        // Set Column to be displayed
        $columns = [
            'Order ID' => 'id',
            'Customer name' => function($result) {
                return $result->user->name;
            },
            'Customer email' => function($result) {
                return $result->user->email;
            },
            'Order total' => 'total_price',
            'Order created at' => 'created_at'
        ];

        return $generator->of($title, $meta, $queryBuilder, $columns)
            ->setCss([
                '.head-content' => 'border-width: 1px',
            ])
            ->editColumn('Registered on', [
                'displayAs' => function($result) {
                    return $result->created_at->format('d M Y');
                }
            ])
            ->download($documentTitle);

    }
}
