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

    public function showDetail(Request $request){
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->join('preview', 'produk.id', '=', 'preview.produk_id') 
            ->select('produk.*', 'kategori.nama as kategori', 'preview.foto')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
        $data['cart'] = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        // $produk = Produk::find('id');
        return view('produk_detail', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori]);

    }

    public function index(Request $request) {
        $data['title'] = "Clubstore.com";
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->join('preview', 'produk.id', '=', 'preview.produk_id') 
            ->select('produk.*', 'kategori.nama as kategori', 'preview.foto')
            ->get();
        $kategori = DB::table('kategori')
            ->get();
            $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('home', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori, 'cart'=>$cart]);
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

        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
 
		return view('produk_list',['produk' => $produk, 'kategori' => $kategori, 'cart' => $cart]);
 
    }
    
    public function keranjang() {
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
                    if($request->get(produkId)==null){
                        $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                        $nota               = (object)array_merge((array)$nota, (array)$cartExist);
                    }else{
                        //cek apakah produk sudah ada dikeranjang
                        $cart = DB::selectOne("SELECT COUNT(*) AS jumlah_produk_yang_dibeli FROM keranjang WHERE nota_id=? AND produk_id=?",[
                            $nota->id,
                            $request->get('produkId')
                        ]);

                        if($cart->jumlah_produk_dibeli == 0){
                            $produk = DB::selectOne("SELECT * FROM produk WHERE id=?", [
                                $request->get('produkId') 
                            ]);

                            DB::insert("INSERT INTO keranjang (nama_produk, harga_satuan, kuantitas, sub_total, nota_id, produk_id) VALUES (?,?,?,?,?,?)",[
                                $produk->nama, $produk->harga, 1, $produk->harga * 1, 
                                $nota ->id, $request->get(produkId)
                            ]);
                            $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                            $nota               = (object)array_merge((array)$nota, (array)$cartExist);

                        }else{
                            $cartExist['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                            $nota               = (object)array_merge((array)$nota, (array)$cartExist);
                        }

                    }
                }else{
                    DB::insert("INSERT INTO nota(user_id,nama,total,tagihan,jenis_faktur,status_transaksi) VALUES (?,?,0.00,0.00,'penjualan','pending')", [
                        $request->session()->get('s_id'),
                        $request->session()->get('s_nama')
                    ]);
                    return redirect('keranjang?produkId='.$request->get('produkId'));
                }

                $cart = DB::selectOne("SELECT COUNT (*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status_transaksi='pending'", [$request->session()->get('s_id')]);
                $data['nota'] = $nota;
                $data['tanggal'] = date('d-m-Y H:i:s');
        return view('keranjang', ['produk' => $produk, 'data' => $data, 'kategori' => $kategori, 'cart' => $cart]);
    }

    // Profil
    public function profil(Request $request){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        $data['cart'] = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('profil', ['user' => $user,'data'=>$data, 'kategori' => $kategori]);
    }

    public function editprofil(Request $request){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        $data['cart'] = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        return view('editprofil', ['user' => $user,'data'=>$data, 'kategori' => $kategori]);
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
                      'telepon' => $request->input('telepon'),
                      'alamat_lengkap' => $request->input('alamat_lengkap'),
                      'kode_pos' => $request->input('kode_pos'),
                      ]);
            return redirect('/');
        } else{
            return redirect('/editprofil');
        }
    }

    public function checkout($notaId){
        $user = DB::table('user')->where('id', session()->get('s_id'))->first();
        // return print_r($user);
        $kategori = DB::table('kategori')
        ->get();
        $data['cart'] = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);

        $update=DB::update("UPDATE nota SET status_transaksi='success' WHERE id=?", [$notaId]);
        return view('checkout', ['user' => $user,'data'=>$data, 'kategori' => $kategori, 'update' =>$update]);
    }

    public function invoicepreview(){
        $data['baseurl'] = URL::to("/");
        $data['produk'] = DB::select("SELECT * FROM produk");
        $pdf    = PDF::loadview('invoicepreview', $data);
        return $pdf->stream();
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