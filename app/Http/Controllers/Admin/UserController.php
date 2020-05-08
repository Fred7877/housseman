<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('user.index')->with('success','Item created successfully!');
    }

    public function list()
    {
        if(request()->ajax()) {
            return DataTables::eloquent(User::query())->toJson();
        }

        return view('admin.user.index');
    }
}
