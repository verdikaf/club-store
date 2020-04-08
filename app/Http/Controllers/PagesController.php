<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;

class PagesController extends Controller
{
    public function showDetail(){
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama as kategori')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        // $produk = Produk::find('id');
        return view('produk_detail', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori]);

    }
}
