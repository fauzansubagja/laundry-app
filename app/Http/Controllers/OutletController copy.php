<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function view()
  {
      return view('admin.outlet.index');
  }

  public function get_outlet_data(Request $request)
  {
      $outlet = Outlet::latest()->paginate(5);

      return Request::ajax() ? 
                   response()->json($outlet,Response::HTTP_OK) 
                   : abort(404);
  }

  public function Store(Request $request)
  {
    Outlet::updateOrCreate(
      [
        'id' => $request->id
      ],
      [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tlp' => $request->tlp
      ]
    );

    return response()->json(
      [
        'success' => true,
        'message' => 'Data inserted successfully'
      ]
    );
  }

  public function update($id)
  {
    $comapny  = Outlet::find($id);

    return response()->json([
      'data' => $comapny
    ]);
  }
  
  public function destroy($id)
  {
    $Outlet = Outlet::find($id);

    $Outlet->delete();

    return response()->json([
      'message' => 'Data deleted successfully!'
    ]);
  }
}
