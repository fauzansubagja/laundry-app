<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::all();
        return view('admin.outlet.index', compact('outlet'));
    }
}
