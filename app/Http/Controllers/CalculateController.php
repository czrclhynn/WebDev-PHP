<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Utils;
use Illuminate\Support\Facades\Log;


class CalculateController extends Controller
{
    public function index($param1, $param2){
        Log::info('======================== Start Index Function ==========================');
        $sum = $this->addNumbers($param1, $param2);
        $difference = $this->difference($param1, $param2);

        $utils = new Utils();
        $product = $utils->product($param1, $param2);
        $quotient = $utils->quotient($param1, $param2);
        Log::info('Product ='.$product);
        Log::info('======================== End Index Function ==========================');
        return view('calculate', compact('product', 'sum', 'difference', 'quotient'));
    }

    public function addNumbers($param1, $param2){
        return $param1 + $param2;
    }

    private function difference($param1, $param2){
        return $param1 - $param2;
    }
    private function quotient($param1, $param2){
        return $param1 / $param2;
    }
}