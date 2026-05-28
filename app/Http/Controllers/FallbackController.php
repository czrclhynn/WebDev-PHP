<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FallbackController extends Controller
{
    //
    public function index()
{
    return response('
        <div style="text-align: center; margin-top: 100px;">
            <img src="/images/error404.png" width="500">
            <h1>Error 404 - Page Not Found</h1>
            <a href="/home">Go back to Home Page</a>
        </div>
    ');
    
}
}
