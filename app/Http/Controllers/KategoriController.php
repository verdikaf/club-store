<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request){
        $kategori = DB::table('kategori')->get();
        $nav_menu = $this->displayMenu($request);
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('kategori',['session' => $session, 'nav_menu' => $nav_menu, 'kategori' => $kategori]);
    }

    public function kategoriAdd(Request $request)
    {
        $data['nav_menu'] = $this->displayMenu($request);
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('kategori_add', $data);
    }

    public function kategoriAddSave(Request $request)
    {
        DB::table('kategori')->insert([
            'id' => $request->id,
            'nama' => $request->nama
        ]);
    return redirect('/kategori');
    }

    public function kategoriEdit(Request $request, $id)
    {
        $kategori = DB::table('kategori')->where('id',$id)->get();
        $nav_menu = $this->displayMenu($request);
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('kategori_edit',['session' => $session, 'nav_menu' => $nav_menu, 'kategori' => $kategori]);
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
