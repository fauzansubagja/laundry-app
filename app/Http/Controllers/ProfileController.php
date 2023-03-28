<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        return view('admin.profile.index', [
            'user' => User::findOrFail($id),
            'member' => Member::all(),
            'selesai' => Transaksi::where('status', ['Selesai', 'Diambil', 'Dikirim'])->count(),
            'transaksi_baru' => Transaksi::whereIn('status', ['Baru', 'Proses', 'Diambil', 'Dikirim'])->count(),
            'members' => Member::count(),
            'outlet' => Outlet::all(),
            'outlets' => Outlet::count(),
        ]);
    }

    public function update(Request $request, User $user, $id)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'username' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
            if ($user->image) {
                unlink('image/profile/' . $user->image); // menghapus file gambar lama
            }
        } else {
            unset($input['image']);
            if ($user->image) {
                unlink('image/profile/' . $user->image); // menghapus file gambar lama
            }
        }


        $user->update($input);
        return redirect('/profile/' . $id);
    }
}
