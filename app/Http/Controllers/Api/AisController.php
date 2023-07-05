<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ais;

class AisController extends Controller
{
    public function index(Request $request)
    {
        $ais = Ais::where('mmsi', $request->mmsi)->get();
        $data = [];
        
        foreach ($ais as $item) {
            $dataDecode = json_decode($item->ais);
            if ($dataDecode->channel == 'A') {
                $data[] = $dataDecode;
            }
        }
        
        return $data;
    }
}
