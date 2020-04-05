<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(){
        $kategori = DB::table('kategori')->get();
        return view('kategori',['kategori' => $kategori]);
    }

    public function kategoriAdd()
    {
        return view('kategori_add');
    }

    public function kategoriAddSave(Request $request)
    {
        DB::table('kategori')->insert([
            'id' => $request->id,
            'nama' => $request->nama
        ]);
    return redirect('/kategori');
    }

    public function kategoriEdit($id)
    {
        $kategori = DB::table('kategori')->where('id',$id)->get();
        return view('kategori_edit',['kategori' => $kategori]);
    }
    public function kategoriEditSave(Request $request)
    {
        DB::table('kategori')->where('id',$request->id)->update([
            'nama' => $request->nama_kategori,
        ]);
        return redirect('/kategori');
    }

    public function kategoriDelete($id)
    {
        DB::table('kategori')->where('id',$id)->delete();
        return redirect('/kategori');
    }
}
