<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function listProduk(Request $request){
        $data['cart']       = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [$request->session()->get('s_id')]);
        $data['produk']     = DB::select("SELECT p.id, p.nama, MAX(f.foto) AS foto, p.harga, p.stok, k.nama AS kategori
                                FROM produk AS p
                                INNER JOIN kategori AS k ON p.kategori_id=k.id
                                LEFT JOIN preview AS f ON p.id=f.produk_id
                                GROUP BY p.id", []);
        $data['nav_menu'] = $this->displayMenu($request);
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('produk_list_warehouse', $data);
    }

    public function apiSearch(Request $request){
        $result = DB::table('produk')
                  ->select('produk.id', 'produk.nama', 'produk.harga', 'produk.stok', 'kategori.nama AS kategori')
                  ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
                  ->leftjoin('preview', 'produk.id', '=', 'preview.produk_id')
                  ->where('produk.nama', 'like', "%" . $request->input('keyword') . "%")
                  ->get();
        return response($result);
    }

    public function cart(Request $request){
        $nota = DB::selectOne("SELECT * FROM nota WHERE status='pending' AND jenis_faktur='pembelian' AND user_id=?", [
            $request->session()->get('s_id')
        ]);
        if ($nota != null) {
            // echo "Nota Exist .. ";
            // echo "Produk ID: " . $request->get('produkId') . " .. ";
            // echo ($request->get('produkId') == null) . " .. ";
            if ($request->get('produkId') == null) {
                // echo "akses menu .. ";
                $cartExist['cart']      = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                $nota                   = (object)array_merge((array)$nota, (array)$cartExist);
            } else {
                // echo "akses id .. ";
                $chart = DB::selectOne("SELECT COUNT(*) AS jumlah_produk_dibeli FROM keranjang WHERE nota_id=? AND produk_id=?", [
                    $nota->id,
                    $request->get('produkId')
                ]);
                if ($chart->jumlah_produk_dibeli == 0) {
                    // echo "produk belum ada di keranjang .. ";
                    $produk = DB::selectOne("SELECT id, nama, harga FROM produk WHERE id=?", [
                        $request->get('produkId')
                    ]);
                    $insertkeranjang = DB::insert("INSERT INTO keranjang(nama_produk, harga_satuan, kuantitas, subtotal, nota_id, produk_id)
                    VALUES (?, ?, ?, ?, ?, ?)", [
                        $produk->nama, $produk->harga, 1, $produk->harga * 1,
                        $nota->id, $request->get('produkId')
                    ]);
                    // echo $insertkeranjang;
                    $cartExist['cart']  = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                    $nota               = (object)array_merge((array)$nota, (array)$cartExist);
                } else {
                    // echo "produk sudah ada di keranjang .. ";
                    $cartExist['cart']  = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$nota->id]);
                    $nota               = (object)array_merge((array)$nota, (array)$cartExist);
                }
            }
        } else {
            // echo "Nota Not Exist .. ";
            DB::insert("INSERT INTO nota (user_id, nama, total, diskon, tagihan, jenis_faktur, status)
            VALUES (?, ?, 0.00, 10.00, 0.00, 'pembelian', 'pending')", [
                $request->session()->get('s_id'),
                $request->session()->get('s_nama')
            ]);
            return redirect('/transaksi/cart?produkId=' . $request->get('produkId'));
        }
        $data['nav_menu'] = $this->displayMenu($request);
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        $data['cart']   = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE user_id=? AND status='pending'", [
            $request->session()->get('s_id')
        ]);
        $data['nota']   = $nota;
        $data['nota_tag'] = $this->hitung($request);
        $data['tanggal']= date('d-m-Y H:i:s');
        return view('nota', $data);
    }

    public function checkout($notaId){
        $tgl = date('Y-m-d H:i:s');
        DB::update("UPDATE nota SET tanggal=?, status='sukses' WHERE id=?", [$tgl, $notaId]);
        return redirect('/invoice/'. $notaId);
    }

    public function plusProduk(Request $request){
        $cart = DB::selectOne("SELECT kuantitas FROM keranjang WHERE produk_id=?", [$request->get('produkId')]);
        $qty = $cart->kuantitas + 1;
        $produk = DB::selectOne("SELECT id, nama, harga FROM produk WHERE id=?", [
            $request->get('produkId')
        ]);
        $kuantitas = DB::update("UPDATE keranjang SET kuantitas=?, subtotal=? WHERE produk_id=?", [
            $qty, $qty * $produk->harga,
            $request->get('produkId')
        ]);
        echo $qty;
        echo $kuantitas;
        return redirect('/transaksi/cart');
    }

    public function minusProduk(Request $request){
        $cart = DB::selectOne("SELECT kuantitas FROM keranjang WHERE produk_id=?", [$request->get('produkId')]);
        $qty = $cart->kuantitas - 1;
        $produk = DB::selectOne("SELECT id, nama, harga FROM produk WHERE id=?", [
            $request->get('produkId')
        ]);
        $kuantitas = DB::update("UPDATE keranjang SET kuantitas=?, subtotal=? WHERE produk_id=?", [
            $qty, $qty * $produk->harga,
            $request->get('produkId')
        ]);
        echo $qty;
        echo $kuantitas;
        return redirect('/transaksi/cart');
    }

    public function hitung(Request $request){
        $notax = DB::selectOne("SELECT * FROM nota WHERE status='pending' AND jenis_faktur='pembelian' AND user_id=?", [
            $request->session()->get('s_id')
        ]);
        $ker = DB::selectOne("SELECT SUM(subtotal) AS total FROM keranjang WHERE nota_id=?", [$notax->id]);
        $subtotal = $ker->total;
        $pajak = $subtotal * 0.1;
        $tagihan = $subtotal + $pajak;
        $total = DB::update("UPDATE nota SET total=?, tagihan=? WHERE id=?", [
            $subtotal, $tagihan,
            $notax->id
        ]);
        $notaTag = DB::selectOne("SELECT total, diskons, tagihan FROM nota WHERE status='pending' AND jenis_faktur='pembelian' 
        AND user_id=?", [
            $request->session()->get('s_id')
        ]);

        return $notaTag;
    }

    private function displayMenu(Request $request) {
        $menu = "<div class='list-group list-group-flush'>";
        $result      = DB::select("SELECT m.id, m.nama, m.url, r.nama AS role FROM menu AS m 
        LEFT JOIN role AS r ON m.role_id = r.id WHERE r.nama=?", [
                            $request->session()->get('s_roole')
                       ]);
        foreach ($result as $r) {
             $menu .= "<a href='".$r->url."' class='list-group-item list-group-item-action bg-extras1'>" . $r->nama . "</a>";
        }
        $menu .= "<a href='/logout/employee' class='list-group-item list-group-item-action bg-extras1'>Logout</a>";
        $menu .= "</div>";
        return $menu;
    }
}
