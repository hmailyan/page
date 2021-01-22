<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        return response()->json(auth()->user());
    }
    function addBlogs(Request $request){
        Blog::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return response( $request,200);
    }
    public function getDB()
    {
        $blogs = DB::table('blogs')->get();
        return $blogs;
    }
    function deleteBlog(Request $request) {
        DB::delete('delete from blogs where id = ?',[$request->id]);
//        DB::table('blogs')->where('id' = $request)->delete();
        echo $request->id;

    }
    function  createPost(Request $request) {
        DB::table('blogs')->where('id',$request->id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
    }
    function myProfile() {

    }
}
