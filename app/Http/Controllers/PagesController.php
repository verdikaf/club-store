<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        // return view('produk');
        // $produk = DB::table('produk')->get();
        // return view('produk', ['produk'=>$produk]);
    }
}
