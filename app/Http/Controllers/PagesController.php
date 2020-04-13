<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;

class PagesController extends Controller
{
    
    public function __construct(){}

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

    public function index() {
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama as kategori')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        return view('home', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori]);
    }
    public function keranjang() {
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama as kategori')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        return view('keranjang', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori]);
    }

    public function addprofil(){
        $kategori = DB::table('kategori')
        ->get();
        return view('profil', ['kategori' => $kategori]);
    }

    public function addprofilsave(Request $request){
        $method = $request->method();
        if($method=="POST"){
            DB::update("INSERT INTO t_users (id, nama, email, telepon, alamat, kodepos, t_role_id) VALUE (?, ?, ?, ?, ?, ?, ?)",[
                $request->input('id'),
                $request->input('nama'),
                $request->input('email'),
                $request->input('telepon'),
                $request->input('alamat'),
                $request->input('kodepost'),
            ]);
            return redirect('/');
        } else{
            return redirect('/profil');
        }
    }

    public function checkout(){
        $kategori = DB::table('kategori')
        ->get();
        return view('profil', ['kategori' => $kategori]);
    }

}
