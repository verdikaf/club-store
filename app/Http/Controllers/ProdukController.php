<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(){

        $data = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->join('supplier', 'produk.supplier_id', '=', 'supplier.id')
            ->leftJoin('foto_produk', 'produk.id', '=', 'foto_produk.id_produk')
            ->select(DB::raw('produk.*, kategori.nama as kategori, supplier.nama as supplier, 
                MAX(foto_produk.foto) AS foto'))
            ->groupBy('produk.id')->get();

            return view('produk', ['data' => $data]);
    }

    public function produkAdd()
    {

        $data['kategori'] = DB::select("SELECT * FROM kategori");
        $data['supplier'] = DB::select("SELECT * FROM supplier");
        return view('produk_add', $data);
    }

    public function produkAddSave(Request $request)
    {
        $method = $request->method();
            if($method == "POST") {

            DB::insert("INSERT INTO produk (nama, stok, harga, kategori_id, supplier_id) VALUES ( ?, ?, ?, ?, ?)", [
                $request->input('nama'),
                $request->input('stok'),
                $request->input('harga'),
                $request->input('kategori_id'),
                $request->input('supplier_id')
            ]);
            $nama =  $request->input('nama');
            return redirect('/produk/gambar/form/'. $nama);
            } else {
        return redirect('/produk');
        }

    }

    public function produkEdit($id)
    {
        $produk = DB::table('produk')->where('id',$id)->get();
        $supplier = DB::table('supplier')->get();
        $kategori = DB::table('kategori')->get();
        $foto_produk = DB::table('foto_produk')->where('id_produk',$id)->get();
        return view('produk_edit',['produk' => $produk, 'kategori' => $kategori, 'supplier' => $supplier,
                                    'foto_produk' => $foto_produk]);
    }

    public function produkEditSave(Request $request)
    {
        $method = $request->method();
            if($method == "POST"){
                    DB::update("UPDATE produk SET nama=?, stok=?, harga=?, kategori_id=?, supplier_id=? WHERE id = ?", [
                        $request->input('nama'),
                        $request->input('stok'),
                        $request->input('harga'),
                        $request->input('kategori_id'),
                        $request->input('supplier_id'),
                        $request->input('id')
                        ]);
                return redirect('/produk');
            }else{
                return redirect('/produk');
        }

        $method = $request->method();
            if($method == "POST"){
                    DB::update("UPDATE foto_produk SET foto=? WHERE id = id_produk", [
                        $request->input('foto'),
                        $request->input('id')
                        ]);
                return redirect('/produk');
            }else{
                return redirect('/produk');
        }
    }


    public function produkDetail() {

    }

    // public function produkDelete($id)
    // {
    //     DB::table('produk')->where('id',$id)->delete();
    //     return redirect('/produk');
    // }

    
    public function gambarUploadForm($nama) {
        $produk = DB::table('produk')->where('nama',$nama)->limit(1)->get();
        return view('upload_form',['produk' => $produk]);
       
    }

    public function gambarUploadAction(Request $request) {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('/assets/produk'), $imageName);
        DB::insert("INSERT INTO foto_produk (id_produk, foto) VALUES (?, ?)", [
            $request->input('id'),
            '/assets/produk/' . $imageName
        ]);
        return response()->json(['success' => $imageName]);

    }

    public function gambarDelete(Request $request) {
        $filename =  $request->get('filename');
        DB::delete("DELETE FROM foto_produk WHERE foto = ?", ['/assets/produk/' . $filename]);
        $path = public_path() . '/assets/produk/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function gambarEditDelete(Request $request) {
        $filename =  $request->get('path');
        $id_produk = $request->get('id_produk');
        DB::delete("DELETE FROM foto_produk WHERE foto = ?", [$filename]);
        $path = public_path() .  '/assets/produk/'. substr($filename,16);
        if (file_exists($path)) {
            unlink($path);
        }
        return redirect('/produk/edit/'. $id_produk);
    }
}

