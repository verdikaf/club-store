<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiLaporanController extends Controller
{
    public function __construct(){}

    public function getLaporanTransaksi(){
        $result = DB::select("SELECT * FROM grafik_penjualan LIMIT 2", []);
        return response($result);
    }

    public function getLaporanPendapatan(Request $request){
        
    }
}
