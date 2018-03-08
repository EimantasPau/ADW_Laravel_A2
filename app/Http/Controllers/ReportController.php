<?php

namespace App\Http\Controllers;

use App\User;
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
            'dateTo' => 'required'
        ]);
        if($reportModel = $request->input('reportModel')){
            switch($reportModel) {
                case 'user':
                    return $this->userReport($request);
                    break;

                case 'product':

                    break;

                case 'order':

                    break;
            }
        }
        return view('report.index');
    }
    public function userReport(Request $request) {
        // Retrieve any filters
        $fromDate = $request->input('dateFrom');
        $toDate = $request->input('dateTo');
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
            'Registered on' => $fromDate . ' To ' . $toDate,
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
            ->limit(20)
            ->setCss([
                '.head-content' => 'border-width: 1px',
            ])
            ->editColumn('Registered on', [
                'displayAs' => function($result) {
                    return $result->created_at->format('d M Y');
                }
            ])
            ->stream();

    }
}
