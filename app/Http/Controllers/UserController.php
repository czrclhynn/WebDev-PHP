<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //
    public function home()
    {
        return "<h1>HOME PAGE</h1>";
    }
    public function index(){
        return "REMOVE USER";
    }
        public function getId($id)
    {
        return "<h1>ID is $id</h1>";
    }
    public function userInputParam($id, $name){
    $inputParameter = $id;

    return $name  . " Input parameter is: ".$inputParameter;
    }
        public function edit($id, $name)
    {
        return "<a href='".route('userDisplay', [$id, $name])."'>Edit User</a>";
    }
    public function pricing()
    {
    $utils = new Utils(); 
    $plans = $utils->getPlans(); 

    return view('pricing', compact('plans'));
    }   
    
    public function addUser(Request $request){
        $request->validate([
            'firstname' => ['required', 'min:2'],
            'lastname' => ['required'],
            'email' => ['required', 'email', 'ends_with:@iskolarngbayan.pup.edu.ph'],
            'password' => ['required', 'min:8']
        ], [
            'firstname.required'=>'Kailangan punan ang unang pangalan.', 
            'lastname.required'=>'Kailangan punan ang apilyido.',
            'email.required'=>'Kailangang punan ang email'

        ]);
        Log::info($request->firstname);
        Log::info($request->middlename);
        Log::info($request->lastname);
        Log::info($request->email);
        Log::info($request->password);
        $result = DB::table('users')->get();
        return $result;
        return view('forms');
    }
    public function showForm()
    {
    return view('forms');
    }

}
