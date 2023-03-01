<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return view('admin.pelanggan.index', compact('member'));
    }
}
