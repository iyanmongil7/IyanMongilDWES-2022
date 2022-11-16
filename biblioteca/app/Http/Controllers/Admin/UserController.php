<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index', compact("users"));
    }
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return back()->withErrors(['', 'msg']);
    }
}
