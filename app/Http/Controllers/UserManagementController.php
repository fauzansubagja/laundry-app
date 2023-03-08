<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.index', [
            'user' => User::all(),
            'outlet' => Outlet::all(),
        ]);
    }

    public function read()
    {
        $data = User::all();
        return view('admin.pengguna.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.pengguna.create', [
            'user' => User::all(),
            'outlet' => Outlet::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['role'] = $request->role;
        $data['outlet_id'] = $request->outlet_id;
        User::create($data);
    }

    public function edit($id)
    {
        return view('admin.pengguna.edit', [
            'outlet' => Outlet::all(),
            'user' => User::findOrFail($id),
        ]);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->outlet_id = $request->outlet_id;
        $data->save();
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        // dd($data);
        $data->delete();
    }
}
