<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\URL;

class InvoiceController extends Controller
{
    public function indexAdmin(Request $request, $notaId){
        $data['title']  = "Invoice | ClubStore";
        $data['nota'] = DB::selectOne("SELECT * FROM nota WHERE id=?", [$notaId]);
        $data['cart'] = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$notaId]);
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        $data['nav_menu'] = $this->displayMenu($request);
        return view('invoiceAdmin', $data);
    }

    public function previewPdfAdmin($notaId){
        $data['title']      = "Invoice | ClubStore";
        $data['baseurl']    = URL::to("/");
        $data['nota']       = DB::selectOne("SELECT * FROM nota WHERE id=?", [$notaId]);
        $data['cart']       = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$notaId]);
        $pdf                = PDF::loadview('invoice_print', $data);
        return $pdf->stream();
    }

    public function printPdfAdmin($notaId){
        $data['title']      = "Invoice | ClubStore";
        $data['nota']       = DB::selectOne("SELECT * FROM nota WHERE id=?", [$notaId]);
        $data['cart']       = DB::select("SELECT * FROM keranjang WHERE nota_id=?", [$notaId]);
        $pdf                = PDF::loadview('invoice_print', $data);
        return $pdf->download('reporting-file.pdf');
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
