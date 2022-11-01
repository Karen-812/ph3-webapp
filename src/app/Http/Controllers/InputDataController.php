<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputData;
use Illuminate\Support\Facade;
// Carbon
// require_once __DIR__ . '/vendor/autoload.php';
use Carbon\Carbon;

class InputDataController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        // 現在の時刻からインスタンスを生成
        $current_year = Carbon::now()->format('Y');
        $current_month = Carbon::now()->format('m'); 
        $today = Carbon::now()->format('d');

        // トータル時間
        $total_sum = InputData::sum('hours');

        // 今月の合計時間
        $month_sum = InputData::whereYear('date', $current_year)->whereMonth('date', $current_month)->sum('hours');
        
        // 今日の合計時間
        $today_sum = InputData::whereYear('date', $current_year)->whereMonth('date', $current_month)->whereDay('date', $today)->sum('hours');


        /* グラフ     
        // 方針：PHPでしか使えない形 → エンコード → JS → グラフ用にさらに整形
        // PHPである程度整える →エンコードもあり
        */

        // 棒グラフ  日毎の勉強時間をGroupByで集計
        // $chart_day_prepare = $pdo->prepare(
        //     'SELECT `date` , SUM(`hours`) AS h FROM input_data WHERE `date` LIKE :search GROUP BY `date`'
        // );
        // $chart_day_prepare->execute(['search' => $search]);
        // $charts_day = $chart_day_prepare->fetchAll();

        /*　こっちできなかった、、なんで？
        $chart_day = InputData::whereYear('date', $current_year)->whereMonth('date', $current_month)
        ->sum('hours');
        ->select('sum(hours) as h')
        ->groupByRaw('date')
        ->get();
        */

        $chart_day = InputData::selectRaw("sum(hours) as total_hour, date")
        ->whereYear('date', $current_year)->whereMonth('date', $current_month)
        ->groupBy("date")->get();

        $bar_chart_data = json_encode($chart_day);


        // ドーナツグラフ1  言語毎の勉強時間
            /*
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["laguage", "portion"],
                    ["HTML", 30],
                    ["CSS", 20],
                    ["JavaScript", 10],
                    ["PHP", 5],
                    ["Laravel", 5],
                    ["SQL", 20],
                    ["SHELL", 20],
                    ["その他", 10],
                ]);
            */

        /* GROUP BYで集計
        $lang_prepare = $pdo->prepare(
            'SELECT `languages` , (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS lang_time
            FROM input_data WHERE `date` LIKE :search 
            GROUP BY `languages`'
        );
        $lang_prepare->execute(['search' => $search]);
        $hours_by_lang = $lang_prepare->fetchAll();
        */

        // 直す🌱🌱🌱
        // $chart_language = InputData::whereYear('date', $current_year)->whereMonth('date', $current_month)
        // ->selectRaw('languages, (100.0 * sum(hours) / SUM(hours) AS lang_time')
        // ->groupByRaw('languages')
        // ->get();

        // $c2 = json_encode($chart_language);


        /* IDと学習言語名紐付け
        $test_prepare = $pdo->prepare(
            'SELECT language_num.language, (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS lang_time
            FROM input_data 
            -- AS test_time
            INNER JOIN language_num
            ON
            input_data.languages = language_num.id
            WHERE `date` LIKE :search 
            GROUP BY `languages`;'
        );
        $test_prepare->execute(['search' => $search]);
        $hours_by_test = $test_prepare->fetchAll();
        */

        // $c4 = json_encode($hours_by_test);



        // ドーナツグラフ2  コンテンツ毎の勉強時間
            /*
            var data = google.visualization.arrayToDataTable([
                ["content", "portion"],
                ["N予備校", 40],
                ["ドットインストール", 20],
                ["課題", 40],
            ]);
            */

        // GROUP BY 使って集計
        // $cont_prepare = $pdo->prepare(
        //     'SELECT `contents` , (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS cont_time
        //     FROM input_data WHERE `date` LIKE :search 
        //     GROUP BY `contents`'
        // );
        // $cont_prepare->execute(['search' => $search]);
        // $hours_by_cont = $cont_prepare->fetchAll();

        // $c3 = json_encode($hours_by_cont);

        /* IDと学習言語名紐付け
        $test_prepare = $pdo->prepare(
            'SELECT content_num.content, (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS cont_time
            FROM input_data
            INNER JOIN content_num
            ON
            input_data.contents = content_num.id
            WHERE `date` LIKE :search 
            GROUP BY `contents`;'
        );
        $test_prepare->execute(['search' => $search]);
        $hours_by_test2 = $test_prepare->fetchAll();
        */

        // $c5 = json_encode($hours_by_test2);
        return view('home', compact('total_sum', 'month_sum', 'today_sum', 'bar_chart_data'));
    }
}
