<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin,owner');
        $this->middleware('role:admin', ['except' => ['index', 'read', 'create', 'store', 'edit', 'update', 'destroy', 'profile']]);
    }
    public function index()
    {
        return view('admin.pengguna.index', [
            // 'user' => User::all(),
            'user' => User::where('role', '<>', 'Admin')->get(),
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

    public function profile($id)
    {
        $user = auth()->user();

        return view('admin.profile.index', [
            'user' => $user,
            'member' => Member::all(),
            'selesai' => Transaksi::where('status', ['Selesai', 'Diambil', 'Dikirim'])->count(),
            'transaksi_baru' => Transaksi::whereIn('status', ['Baru', 'Proses', 'Diambil', 'Dikirim'])->count(),
            'members' => Member::count(),
            'outlet' => Outlet::all(),
            'outlets' => Outlet::count(),
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
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'outlet_id' => $request->outlet_id,
            'image' => 'default.png', // default value jika image tidak diupload
        ];

        if ($request->hasFile('image')) {
            $destinationPath = 'image/profile';
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;
        }

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
        $data->password = bcrypt($request->password);
        $data->role = $request->role;
        $data->outlet_id = $request->outlet_id;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/profile';

            // hapus gambar lama jika ada
            if ($data->image && file_exists($destinationPath . '/' . $data->image)) {
                unlink($destinationPath . '/' . $data->image);
            }

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->image = $profileImage;
        }

        $data->save();
    }


    public function destroy($id)
    {
        $data = User::findOrFail($id);
        // dd($data);
        $data->delete();
    }
}
