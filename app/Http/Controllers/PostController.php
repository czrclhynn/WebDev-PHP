<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('post')
        ->leftJoin('statuses', 'post.status', '=', 'statuses.id')
        ->select('post.*', 
            'statuses.display_name as status_display_name', 
            'statuses.name as status_name')
        ->get();
        $statuses = DB::table('statuses')->get();

        return view('post', compact('posts', 'statuses'));
    }

    public function createPost(Request $request)
    {
        Log::info($request->title);
        Log::info($request->description);
        
        DB::table('post')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => 1,
            'created_at' => now(),
            'status' => 1
        ]);

        return redirect('post');
    }

    public function editForm($id){
        $post = DB::table('post')->where('id', $id) ->first();
        $statuses = DB::table('statuses')->get();

        return view('post-edit', compact('post', 'statuses'));
    }






}



    
