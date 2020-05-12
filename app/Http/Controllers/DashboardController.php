<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request){
        $data['session']  = array(
                                'id'             => $request->session()->get('s_id'),
                                'nama'           => $request->session()->get('s_nama'),
                                'telp'           => $request->session()->get('s_telp'),
                                'email'          => $request->session()->get('s_email'),
                                'password'       => $request->session()->get('s_password'),
                                'provinsi'       => $request->session()->get('s_provinsi'),
                                'kota'           => $request->session()->get('s_kota'),
                                'kecamatan'      => $request->session()->get('s_kecamatan'),
                                'kode_pos'       => $request->session()->get('s_kode_pos'),
                                'alamat_lengkap' => $request->session()->get('s_alamat_lengkap'),
                                'roole'          => $request->session()->get('s_roole')
                            );
        $data['title']    = "Dashboard - laracms";
        $data['nav_menu'] = $this->displayMenu($request);
        
        return view('dashboard', $data);
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
