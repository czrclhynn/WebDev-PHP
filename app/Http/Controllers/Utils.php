<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Utils extends Controller
{
    // EXISTING FUNCTIONS
    public function product($param1, $param2)
    {
        return $param1 * $param2;
    }

    public function quotient($param1, $param2)
    {
        if ($param2 == 0) {
            return "Cannot divide by zero";
        }
        return $param1 / $param2;
    }

    // ✅ ADD THIS FOR PRICING PAGE
    public function getPlans()
    {
        return [
            [
                'name' => 'Public',
                'free' => true,
                'pro' => true,
                'enterprise' => true,
            ],
            [
                'name' => 'Private',
                'free' => false,
                'pro' => true,
                'enterprise' => true,
            ],
            [
                'name' => 'Permissions',
                'free' => false,
                'pro' => true,
                'enterprise' => true,
            ],
        ];
    }
}