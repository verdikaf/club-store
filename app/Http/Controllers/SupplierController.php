<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //
    public function index()
    {
        $supplier = DB::table('supplier')->get();
        return view('supplier',['supplier' => $supplier]);
    }

    public function supplierAdd()
    {
        return view('supplier_add');
    }

    public function supplierAddSave(Request $request)
    {
        DB::table('supplier')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap
        ]);
    return redirect('/supplier');
    }

    public function supplierEdit($id)
    {
        $supplier = DB::table('supplier')->where('id',$id)->get();
        return view('supplier_edit',['supplier' => $supplier]);
    }
    public function supplierEditSave(Request $request)
    {
        DB::table('supplier')->where('id',$request->id)->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap
        ]);
        return redirect('/supplier');
    }

    public function delete($id)
    {
        DB::table('supplier')->where('id',$id)->delete();
        return redirect('/supplier');
    }
}
