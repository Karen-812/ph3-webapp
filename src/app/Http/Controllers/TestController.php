<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade;
use App\Models\InputData;


// Carbon
// require __DIR__ . "/../vendor/autoload.php";
use Carbon\Carbon;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m'); 
        $today = Carbon::now()->format('d');

        // 現在の時刻からインスタンスを生成
        // $carbon = Carbon::now();
        $today = Carbon::today('Asia/Tokyo')->toDateString();

        // // 日時形式の文字列からインスタンスを作成
        // $carbon = Carbon::parse('2018/01/02 03:04:05');
        // echo $carbon; // 2018-01-02 03:04:05

        // // UNIXTIMEからインスタンスを作成
        // $carbon = Carbon::createFromTimestamp(1234567890);
        // echo $carbon; // 2009-02-13 23:31:30

        return view('test', compact('current_year', 'current_month', 'today'));
}
}