<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ship;
use Illuminate\Support\Facades\Validator;

class ShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function storeOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'owner' => 'required|string',
            'tipe' => 'required|string',
            'loa' => 'required|numeric',
            'b' => 'required|numeric',
            'h' => 'required|numeric',
            't' => 'required|numeric',
            'gt' => 'required|numeric',
            'dwt' => 'required|numeric',
            'v' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ship = Ship::findOrNew($request->id);
        $ship->owner = $request->owner;
        $ship->tipe = $request->tipe;
        $ship->loa = $request->loa;
        $ship->lpp = $request->lpp;
        $ship->b = $request->b;
        $ship->h = $request->h;
        $ship->t = $request->t;
        $ship->gt = $request->gt;
        $ship->dwt = $request->dwt;
        $ship->v = $request->v;
        $ship->save();

    }

}
