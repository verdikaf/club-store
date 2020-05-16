<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Produk;
use PDF;

class PagesController extends Controller
{
    
    public function __construct(){}

    public function showDetail(Request $request, $id){
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
                ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
                ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
                ->select(DB::raw('produk.*, kategori.nama as kategori, 
                    preview.foto AS foto'))
                ->where('produk.id', '=', $id)->groupBy('produk.id')
                ->get();
        $kategori = DB::table('kategori')
            ->get();
        $prev = DB::table('preview')
                ->where('produk_id', '=', $id)
                ->get();
        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        // $produk = Produk::find('id');
        return view('produk_detail', ['produk' => $produk, 'cart' => $cart, 'kategori' => $kategori, 'prev' => $prev]);

    }

    public function apiSearchProduk(Request $request)
    {
        $result = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
            ->select(DB::raw('produk.*, kategori.nama AS kategori, MAX(preview.foto) AS foto'))
            ->groupBy('produk.id')->where('produk.nama', 'LIKE', '%' . $request->input('keyword') . '%')
            ->get();
        return response($result);
    }

    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$cari = $request->cari;
 
    //     $produk = DB::table('produk')
    //     ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
    //     ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
    //     ->select('produk.*', 'kategori.nama as kategori', 'preview.foto')
	// 	->where('produk.nama','like',"%".$cari."%")
    //     ->paginate();

    //     $kategori = DB::table('kategori')
    //         ->get();

    //     $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
 
    //     return view('produk_list',['produk' => $produk, 'kategori' => $kategori, 'cart' => $cart]);
    // }

    public function index(Request $request) {
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
        ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
        ->select(DB::raw('produk.*, kategori.nama as kategori, MAX(preview.foto) AS foto'))
        ->groupBy('produk.id')->get();
        $kategori = DB::table('kategori')
            ->get();
        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('home', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori, 'cart'=>$cart]);
    }
    
    public function keranjang(request $request) {
        // echo $produkId;

        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama as kategori')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        $nota = DB::selectOne("SELECT * FROM nota WHERE status='pending' AND jenis_faktur='penjualan' AND user_id=?", [$request->session()->get('s_id')
                ]);

                if($nota != null){
                    if($request->get('produkId')==null){
                        $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                        $nota               = (object)array_merge((array)$nota, (array)$cartExist);
                    }else{
                        //cek apakah produk sudah ada dikeranjang
                        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_produk_yang_dibeli FROM keranjang WHERE nota_id=? AND produk_id=?",[
                            $nota->id,
                            $request->get('produkId')
                        ]);

                        if($cart->jumlah_produk_yang_dibeli == 0){
                            $produk = DB::selectOne("SELECT * FROM produk WHERE id=?", [
                                $request->get('produkId') 
                            ]);

                            DB::insert("INSERT INTO keranjang (nama_produk, harga_satuan, kuantitas, sub_total, nota_id, produk_id) VALUES (?,?,?,?,?,?)",[
                                $produk->nama, $produk->harga, 1, $produk->harga * 1, 
                                $nota ->id, $request->get('produkId')
                            ]);
                            $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                            $nota               = (object)array_merge((array)$nota, (array)$cartExist);

                        }else{
                            $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                            $nota               = (object)array_merge((array)$nota, (array)$cartExist);
                        }

                    }
                }else{
                    DB::insert("INSERT INTO nota(user_id,nama,total,diskon,ppn,tagihan,jenis_faktur,status) VALUES (?,?,0.00,10.00,10.00,0.00,'penjualan','pending')", [
                        $request->session()->get('s_id'),
                        $request->session()->get('s_nama')
                    ]);
                    return redirect('/keranjang/cart?produkId='.$request->get('produkId'));
                }

                $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
                $data['nota'] = $nota;
                $nota_tag = $this->hitung($request);
                $data['tanggal'] = date('d-m-Y H:i:s');
        return view('keranjang', ['produk' => $produk, 'nota' => $nota,'nota_tag'=>$nota_tag,'kategori' => $kategori, 'cart' => $cart]);
    }

    public function plusProduk(Request $request){
        $cart = DB::selectOne("SELECT kuantitas FROM keranjang WHERE produk_id=?", [$request->get('produkId')]);
        $qty = $cart->kuantitas + 1;
        $produk = DB::selectOne("SELECT id, nama, harga FROM produk WHERE id=?", [
            $request->get('produkId')
        ]);
        $kuantitas = DB::update("UPDATE keranjang SET kuantitas=?, sub_total=? WHERE produk_id=?", [
            $qty, $qty * $produk->harga,
            $request->get('produkId')
        ]);
        echo $qty;
        echo $kuantitas;
        return redirect('/keranjang/cart');
    }

    public function minusProduk(Request $request){
        $cart = DB::selectOne("SELECT kuantitas FROM keranjang WHERE produk_id=?", [$request->get('produkId')]);
        $qty = $cart->kuantitas - 1;
        $produk = DB::selectOne("SELECT id, nama, harga FROM produk WHERE id=?", [
            $request->get('produkId')
        ]);
        $kuantitas = DB::update("UPDATE keranjang SET kuantitas=?, sub_total=? WHERE produk_id=?", [
            $qty, $qty * $produk->harga,
            $request->get('produkId')
        ]);
        echo $qty;
        echo $kuantitas;
        return redirect('/keranjang/cart');
    }

    public function hitung(Request $request){
        $notax = DB::selectOne("SELECT * FROM nota WHERE status='pending' AND jenis_faktur='penjualan' AND user_id=?", [
            $request->session()->get('s_id')
        ]);
        $ker = DB::selectOne("SELECT SUM(sub_total) AS total FROM keranjang WHERE nota_id=?", [$notax->id]);
        $subtotal = $ker->total;
        $ppn = $subtotal * 0.1;
        $diskon = $subtotal * 0.1;
        $tagihan = $subtotal + $ppn - $diskon;
        $total = DB::update("UPDATE nota SET total=?, tagihan=? WHERE id=?", [
            $subtotal, $tagihan,
            $notax->id
        ]);
        $notaTag = DB::selectOne("SELECT total,diskon,ppn,tagihan FROM nota WHERE status='pending' AND jenis_faktur='penjualan' 
        AND user_id=?", [
            $request->session()->get('s_id')
        ]);

        return $notaTag;
    }

    public function checkout($notaId){
        $tgl = date('Y-m-d H:i:s');
        DB::update("UPDATE nota SET tgl_nota=?, status='sukses' WHERE id=?", [$tgl, $notaId]);
        return redirect('/invoice/'. $notaId);
    }

    // public function invoicepreview(Request $request, $notaId){
    //     $user = DB::table('user')->where('id', session()->get('s_id'))->first();
    //     $nota = DB::selectOne("SELECT * FROM nota WHERE status='pending' AND jenis_faktur='penjualan' AND user_id=?", [$request->session()->get('s_id')
    //             ]);

    //             if($nota != null){
    //                 if($request->get('produkId')==null){
    //                     $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
    //                     $nota               = (object)array_merge((array)$nota, (array)$cartExist);
    //                 }else{
    //                     //cek apakah produk sudah ada dikeranjang
    //                     $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_produk_yang_dibeli FROM keranjang WHERE nota_id=? AND produk_id=?",[
    //                         $nota->id,
    //                         $request->get('produkId')
    //                     ]);

    //                     if($cart->jumlah_produk_yang_dibeli == 0){
    //                         $produk = DB::selectOne("SELECT * FROM produk WHERE id=?", [
    //                             $request->get('produkId') 
    //                         ]);

    //                         DB::insert("INSERT INTO keranjang (nama_produk, harga_satuan, kuantitas, sub_total, nota_id, produk_id) VALUES (?,?,?,?,?,?)",[
    //                             $produk->nama, $produk->harga, 1, $produk->harga * 1, 
    //                             $nota ->id, $request->get('produkId')
    //                         ]);
    //                         $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
    //                         $nota               = (object)array_merge((array)$nota, (array)$cartExist);

    //                     }else{
    //                         $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
    //                         $nota               = (object)array_merge((array)$nota, (array)$cartExist);
    //                     }

    //                 }
    //             }else{
    //                 DB::insert("INSERT INTO nota(user_id,nama,total,tagihan,jenis_faktur,status) VALUES (?,?,0.00,0.00,'penjualan','pending')", [
    //                     $request->session()->get('s_id'),
    //                     $request->session()->get('s_nama')
    //                 ]);
    //                 return redirect('/invoice/preview');
    //             }

    //             $data['nota'] = $nota;
    //             $nota_tag = $this->hitung($request);
    //             $data['baseurl']    = URL::to("/");
    //             $data['tanggal'] = date('d-m-Y H:i:s');
    //             $update = DB::update("UPDATE nota SET status='sukses' WHERE id=?", [$notaId]);
    //     $pdf    = PDF::loadview('invoicepreview',['user' => $user,'nota_tag'=>$nota_tag,'data' =>$data,'nota'=>$nota,'update'=>$update]);
    //     return $pdf->stream();
    // }

    // Profil
    public function profil(Request $request){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('profil', ['user' => $user,'cart'=>$cart, 'kategori' => $kategori]);
    }

    public function editprofil(Request $request){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('editprofil', ['user' => $user,'cart'=>$cart, 'kategori' => $kategori]);
    }

    public function editprofilsave(Request $request){
        $method = $request->method();
        if($method=="POST"){
            DB::table('user')
            ->where('id', $request->input('id'))
            ->update(['nama' => $request->input('nama'),
                      'email' => $request->input('email'),
                      'password' => $request->input('password'),
                      'provinsi' => $request->input('provinsi'),
                      'kota' => $request->input('kota'),
                      'kecamatan' => $request->input('kecamatan'),
                      'telp' => $request->input('telp'),
                      'alamat_lengkap' => $request->input('alamat_lengkap'),
                      'kode_pos' => $request->input('kode_pos'),
                      ]);
            return redirect('/');
        } else{
            return redirect('/editprofil');
        }
    }

    public function produkList(Request $request){
        $produk = DB::table('produk')
        ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
        ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
        ->select('produk.*', 'kategori.nama as kategori', 'preview.foto')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('produk_list', ['produk' => $produk,'cart' => $cart, 'kategori' => $kategori]);
    }

    public function byKategori(Request $request){
        $produkall = $request->Produk()->get();
        return $produkall;
    }

}