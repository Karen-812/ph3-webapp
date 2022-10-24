<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputData;
use Illuminate\Support\Facade;

class InputDataController extends Controller
{
    public function index(Request $request)
    {
        $current_year = date('Y');
        $current_month = date('m');
        $today = date('d');

        // トータル時間
        $total_sum = InputData::sum('hours');

        // 今月の合計時間
        $month_sum = InputData::whereYear('date', $current_year)->whereMonth('date', $current_month)->sum('hours');
        
        // 今日の合計時間
        $today_sum = InputData::whereYear('date', $current_year)->whereMonth('date', $current_month)->whereDay('date', $today)->sum('hours');
        return view('home', compact('total_sum', 'month_sum', 'today_sum'));
    }
}
