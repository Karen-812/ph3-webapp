<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputData;
use Illuminate\Support\Facade;

class InputDataController extends Controller
{
    public function index(Request $request)
    {
        $items = InputData::all();
        return view('index', compact('items'));
    }
}
