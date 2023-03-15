<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.pelanggan.pelanggan')->with([
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'member' => Member::all(),
        ]);
    }
}
