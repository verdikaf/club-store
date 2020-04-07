<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(){
        $data['produk'] = DB::select("SELECT * FROM produk");
        $data['kategori'] = DB::select("SELECT * FROM kategori");
        $data['supplier'] = DB::select("SELECT * FROM supplier");
        return view('produk', $data);
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
                $directory = 'assets/produk';
                $file      = $request->file('foto');
                $file->move($directory, $file->getClientOriginalName());

            DB::insert("INSERT INTO produk (nama, stok, harga, foto, kategori_id, supplier_id) VALUES (?, ?, ?, ?, ?, ?)", [
                $request->input('nama'),
                $request->input('stok'),
                $request->input('harga'),
                $directory."/".$file->getClientOriginalName(),
                $request->input('kategori_id'),
                $request->input('supplier_id')
            ]);
            return redirect('/produk');
            } else {
        return redirect('/produk');
        }

    }

    public function produkEdit($id)
    {

        // $data['produk'] = DB::table("SELECT * FROM produk WHERE id=?", [$id]);
        // $data['kategori'] = DB::select("SELECT * FROM kategori");
        // $data['supplier'] = DB::select("SELECT * FROM supplier");
        $produk = DB::table('produk')->where('id',$id)->get();
        $supplier = DB::table('supplier')->get();
        $kategori = DB::table('kategori')->get();
        return view('produk_edit',['produk' => $produk, 'kategori' => $kategori, 'supplier' => $supplier]);
        // return view('produk_edit',$data);
    }

    public function produkEditSave(Request $request)
    {
        $method = $request->method();
            if($method == "POST"){
                if ($request->file('file') == null){
                DB::update("UPDATE produk SET nama=?  WHERE id = ?", [
                    $request->input('nama'),
                    $request->input('stok'),
                    $request->input('harga'),
                    $directory."/".$file->getClientOriginalName(),
                    $request->input('kategori_id'),
                    $request->input('supplier_id')
                    ]);
                }else{
                    $directory = 'assets/produk';
                    $file      = $request->file('foto');
                    $file->move($directory, $file->getClientOriginalName());

                    DB::update("UPDATE produk SET nama=?, stok=?, harga=?, foto=?, kategori_id=?, supplier_id=? WHERE id = ?", [
                        $request->input('nama'),
                        $request->input('stok'),
                        $request->input('harga'),
                        $directory."/".$file->getClientOriginalName(),
                        $request->input('kategori_id'),
                        $request->input('supplier_id')
                        ]);
                }
                return redirect('/produk');

            }else{
                return redirect('/produk');
        }
    }


    public function produkDetail() {

    }

    public function produkDelete($id)
    {
        DB::table('produk')->where('id',$id)->delete();
        return redirect('/produk');
    }
}

