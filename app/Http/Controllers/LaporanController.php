<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
   public function __construct(){}

   public function index(Request $request){
        
                $data['session']  = array(
                    'id'             => $request->session()->get('s_id'),
                    'nama'           => $request->session()->get('s_nama'),
                    'roole'          => $request->session()->get('s_roole')
                );
                $data['title'] = "Laporan";
                $data['nav_menu'] = $this->displayMenu($request);
                return view('laporan', $data);
    }

   public function displayMenu(Request $request){
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
