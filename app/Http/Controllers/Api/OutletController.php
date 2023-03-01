<?php

namespace App\Http\Controllers\Api;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'datas' => Outlet::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $data = [
            'nama' => $input['nama'],
            'alamat' => $input['alamat'],
            'tlp' => $input['tlp'],
        ];

        DB::beginTransaction();

        $create = Outlet::create($data);
        
        DB::commit();

        return response()->json([
            'message' => 'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        return response()->json([
            'data' => Outlet::find($outlet->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $input = $request->all();
        $data = [
            'nama' => $input['nama'],
            'alamat' => $input['alamat'],
            'tlp' => $input['tlp'],
        ];
        // dd($outlet);
        DB::beginTransaction();
        
        $create = $outlet->update($data);
        
        DB::commit();

        return response()->json([
            'message' => 'Success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return response()->json([
            'messages' => "success"
        ]);
    }
}
