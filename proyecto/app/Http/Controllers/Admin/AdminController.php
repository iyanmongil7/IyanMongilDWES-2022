<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function list_users(){
        $users=User::all();
        return view('admin.list_users', compact('users'));
    }
    public function list_projects(){
        $projects = Project::with('user') -> paginate(10);
        return view ('admin.list_projects', compact('projects'));
    }
}
