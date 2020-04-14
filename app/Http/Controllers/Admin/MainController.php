<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MainController extends Controller
{
    public function index()
    {
        $id = Role::orderBy('id', 'ASC')->get();
        $roles = Role::find($id);
        return view('backend.admin.main', compact('roles'));
    }
}
