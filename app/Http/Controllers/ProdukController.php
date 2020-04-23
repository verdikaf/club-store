<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(){

        $data = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
            ->select(DB::raw('produk.*, kategori.nama as kategori, 
                MAX(preview.foto) AS foto'))
            ->groupBy('produk.id')->get();

            return view('produk', ['data' => $data]);
    }

    public function produkAdd()
    {

        $data['kategori'] = DB::select("SELECT * FROM kategori");
        return view('produk_add', $data);
    }

    public function produkAddSave(Request $request)
    {
        $method = $request->method();
            if($method == "POST") {

            DB::insert("INSERT INTO produk (nama, deskripsi, stok, harga, kategori_id) VALUES ( ?, ?, ?, ?, ?)", [
                $request->input('nama'),
                $request->input('deskripsi'),
                $request->input('stok'),
                $request->input('harga'),
                $request->input('kategori_id')
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
        $kategori = DB::table('kategori')->get();
        $preview = DB::table('preview')->where('produk_id',$id)->get();
        return view('produk_edit',['produk' => $produk, 'kategori' => $kategori, 'preview' => $preview]);
    }

    public function produkEditSave(Request $request)
    {

        $method = $request->method();
            if($method == "POST"){
                $updatep = DB::update("UPDATE produk SET nama=?, deskripsi=?, stok=?, harga=?, kategori_id=? WHERE id = ?", [
                    $request->input('nama'),
                    $request->input('deskripsi'),
                    $request->input('stok'),
                    $request->input('harga'),
                    $request->input('kategori_id'),
                    $request->input('id')
                    ]);
                echo ($request->input('nama'));
                echo ($updatep);
                // return redirect('/produk');
            }else{
                return redirect('/produk');
        }

        $method = $request->method();
            if($method == "POST"){
                $updatef = DB::update("UPDATE preview SET foto=? WHERE id = produk_id", [
                    $request->input('foto'),
                    $request->input('id')
                    ]);
                // return redirect('/produk');
                echo($updatef);
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
        DB::insert("INSERT INTO preview (produk_id, foto) VALUES (?, ?)", [
            $request->input('id'),
            '/assets/produk/' . $imageName
        ]);
        return response()->json(['success' => $imageName]);

    }

    public function gambarDelete(Request $request) {
        $filename =  $request->get('filename');
        $id = $request->get('id');
        DB::delete("DELETE FROM preview WHERE id = ?", [$id]);
        $path = public_path() . '/assets/produk/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function gambarEditDelete(Request $request) {
        $filename =  $request->get('path');
        $produk_id = $request->get('produk_id');
        $id = $request->get('id');
        // DB::delete("DELETE FROM preview WHERE id = ?", [$id]);
        $path = public_path() .  '/assets/produk/'. substr($filename,16);
        // if (file_exists($path)) {
        //     unlink($path);
        // }
        echo($id);
        echo("DELETE FROM preview WHERE id = $id");
        echo($path);
        // return redirect('/produk/edit/'. $id_produk);
    }
}
