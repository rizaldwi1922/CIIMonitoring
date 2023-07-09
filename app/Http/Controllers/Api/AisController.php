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
                $data[] = [
                    "ais" => $dataDecode,
                    "date" => $this->ConvertTimeToWIB($item->createdAt)
                ];
            }
        }
        
        return $data;
    }

    private static function ConvertTimeToWIB($waktu){
        // Buat objek DateTime dengan zona waktu asal
        $waktu_asal = new \DateTime($waktu, new \DateTimeZone('UTC'));

        // Tetapkan zona waktu tujuan sebagai WIB (Asia/Jakarta)
        $zona_wib = new \DateTimeZone('Asia/Jakarta');

        // Ubah zona waktu ke WIB
        $waktu_wib = $waktu_asal->setTimezone($zona_wib);

        // Format waktu WIB yang dikonversi
        $waktu_wib_format = $waktu_wib->format('Y-m-d H:i:s');
        return $waktu_wib_format;
    }
}
