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

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
		$produk = DB::table('produk')
		->where('nama','like',"%".$cari."%")
        ->paginate();
        
        $kategori = DB::table('kategori')
            ->get();
 

		return view('produk_list',['produk' => $produk, 'kategori' => $kategori]);
 
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

    // Profil
    public function profil(Request $request){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        return view('profil', ['user' => $user, 'kategori' => $kategori]);
    }

    public function editprofil(Request $request){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        return view('editprofil', ['user' => $user, 'kategori' => $kategori]);
    }

    public function editprofilsave(Request $request){
        $method = $request->method();
        if($method=="POST"){
            DB::table('user')
            ->where('id', $request->input('id'))
            ->update(['nama' => $request->input('nama'),
                      'email' => $request->input('email'),
                      'password' => $request->input('password'),
                      'telepon' => $request->input('telepon'),
                      'alamat' => $request->input('alamat'),
                      'kodepos' => $request->input('kodepos'),
                      ]);
            return redirect('/');
        } else{
            return redirect('/editprofil');
        }
    }

    public function checkout(){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        return view('checkout.', ['user' => $user, 'kategori' => $kategori]);
    }

    public function produkList(){
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama as kategori')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        return view('produk_list', ['produk' => $produk, 'kategori' => $kategori]);
    }

    public function byKategori(Request $request){
        $produkall = $request->Produk()->get();
        return $produkall;
    }

}