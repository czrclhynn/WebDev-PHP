<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        dd(Session::get('post'));
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
        Session::put('post', $post);
        $post = Session::get('post');
        $statuses = DB::table('statuses')->get();
        
        return view('post-edit', compact('post', 'statuses'));
    }

    public function editSubmit(Request $request, $id)
    {
         DB::table('post')->where('id', $id) ->update([
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
        'updated_at' => now()
    ]);

    return redirect()->route('post');
    }


    public function deletePost($id)
    {
        DB::table('post')->where('id', $id)->delete();
        return redirect()->route('post');
    }

     public function searchPost(Request $request)
    {
        $posts = DB::table('post')
            ->leftJoin('statuses', 'post.status', '=', 'statuses.id')
            ->select('post.*', 'statuses.display_name as status_display_name')
            ->where('title', 'like', "%{$request->param}%")
            ->orWhere('description', 'like', "%{$request->param}%")
            ->get();

        $statuses = DB::table('statuses')->get();

        return view('post', compact('posts', 'statuses'));
    }

}



    
