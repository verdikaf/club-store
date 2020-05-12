<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //
    public function index(Request $request)
    {
        $supplier = DB::table('supplier')->get();
        $nav_menu = $this->displayMenu($request);
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('supplier',['session' => $session, 'nav_menu' => $nav_menu, 'supplier' => $supplier]);
    }

    public function supplierAdd(Request $request)
    {
        $data['nav_menu'] = $this->displayMenu($request);
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('supplier_add', $data);
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

    public function supplierEdit(Request $request, $id)
    {
        $supplier = DB::table('supplier')->where('id',$id)->get();
        $nav_menu = $this->displayMenu($request);
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('supplier_edit',['session' => $session, 'nav_menu' => $nav_menu, 'supplier' => $supplier]);
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
