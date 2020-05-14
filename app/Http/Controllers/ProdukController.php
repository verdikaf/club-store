<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

use App\Gambar;

class ProdukController extends Controller
{
    public function index(Request $request){

        $data['data'] = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
            ->select(DB::raw('produk.*, kategori.nama as kategori, 
                MAX(preview.foto) AS foto'))
            ->groupBy('produk.id')->get();
        $data['nav_menu'] = $this->displayMenu($request);
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );

            return view('produk', $data);
    }

    public function apiSearchProduk(Request $request)
    {
        $result = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->leftJoin('preview', 'produk.id', '=', 'preview.produk_id')
            ->select(DB::raw('produk.*, kategori.nama AS kategori, MAX(preview.foto) AS foto'))
            ->groupBy('produk.id')->where('produk.nama', 'LIKE', '%' . $request->input('keyword') . '%')
            ->get();
        return response($result);
    }

    public function produkAdd(Request $request)
    {
        $data['session']  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        $data['kategori'] = DB::select("SELECT * FROM kategori");
        $data['nav_menu'] = $this->displayMenu($request);
        return view('produk_add', $data);
    }

    public function produkAddSave(Request $request)
    {
        $method = $request->method();
            if($method == "POST") {

            DB::insert("INSERT INTO produk (nama, deskripsi, stok, harga, kategori_id) VALUES ( ?, ?, '0', ?, ?)", [
                $request->input('nama'),
                $request->input('deskripsi'),
                $request->input('harga'),
                $request->input('kategori_id')
            ]);
            $nama =  $request->input('nama');
            return redirect('/produk/gambar/form/'. $nama);
            } else {
        return redirect('/produk');
        }

    }

    public function produkEdit(Request $request, $id)
    {
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        $produk = DB::table('produk')->where('id',$id)->get();
        $kategori = DB::table('kategori')->get();
        $preview = DB::table('preview')->where('produk_id',$id)->get();
        $nav_menu = $this->displayMenu($request);
        return view('produk_edit',['nav_menu' => $nav_menu, 'session' => $session, 'produk' => $produk, 'kategori' => $kategori, 'preview' => $preview]);
    }

    public function produkEditSave(Request $request)
    {
        $method = $request->method();
            if($method == "POST"){
                $updatep = DB::update("UPDATE produk SET nama=?, deskripsi=?, harga=?, kategori_id=? WHERE id = ?", [
                    $request->input('nama'),
                    $request->input('deskripsi'),
                    $request->input('harga'),
                    $request->input('kategori_id'),
                    $request->input('id')
                    ]);
                echo ($request->input('id'));
                echo '--';
                echo ($updatep);
                // return redirect('/produk');
            }else{
                return redirect('/produk');
        }
    }

    public function produkDetail() {

    }
    
    public function gambarUploadForm(Request $request, $nama) {
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        $produk = DB::table('produk')->where('nama',$nama)->limit(1)->get();
        $nav_menu = $this->displayMenu($request);
        return view('upload_form',['session' => $session, 'nav_menu' => $nav_menu, 'produk' => $produk]);
       
    }

    public function gambarUploadAction(Request $request) {
        $image = $request->file('file');
        $imageName = time()."_".$image->getClientOriginalName();
        $image->move(public_path('/assets/produk'), $imageName);
        DB::insert("INSERT INTO preview (produk_id, foto) VALUES (?, ?)", [
            $request->input('id'),
            '/assets/produk/' . $imageName
        ]);
        return redirect()->back();

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

    public function gambarEditDelete(Request $request, $id) {
        $gambar = Gambar::where('id',$id)->first();
        File::delete('data_file/'.$gambar->foto);
    
        // hapus data
        Gambar::where('id',$id)->delete();
    
        return redirect()->back();
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
