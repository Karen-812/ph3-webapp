<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InputDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'date' => 221023,
            'hours' => 1,
            'languages' => 0,
            'contents' => 2,
        ];
        DB::table('input_data')->insert($param);
    }
}
