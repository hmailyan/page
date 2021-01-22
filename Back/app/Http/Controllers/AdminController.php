<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function __construct()
    {
        return response()->json(auth()->user());
    }
    function getUsers() {
        $users = DB::table('users')->get();
        return $users;
    }
    function blockUser(Request $request) {
        DB::table('users')->where('id',$request->id)->update(['type' => 'blocked']);
    }
    function unBlockUser(Request $request) {
        DB::table('users')->where('id',$request->id)->update(['type' => 'user']);
    }
}
