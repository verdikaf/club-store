<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function __construct() {}
    
    //CLUB STORE USER LOGIN
    public function login(){
        $data['title'] = "Login Clubstore";
        return view('login_user',$data);
    }
    public function loginAction(Request $request){
        $method =$request->method();
        if($method == "POST"){
            $result =DB::selectOne("SELECT u.id,u.nama,u.email,u.status,r.nama AS roole FROM user AS u RIGHT JOIN role AS r
            ON u.role_id = r.id WHERE u.email=? AND u.password=? AND u.role_id=3",[
                $request->input('email'),
                $request->input('password')
                

            ]);
        if($result != null){
            $request->session()->put('s_id', $result->id);
            $request->session()->put('s_nama', $result->nama);
            $request->session()->put('s_email', $result->email);
            $request->session()->put('s_status', $result->status);
            $request->session()->put('s_roole', $result->roole);

            return redirect('/');
        }else{
            return redirect('/login')->with('error','Email atau Password salah,harap masukkan ulang!');
        }
    }else{
        return redirect('/login');
    }
    }
    //CLUB STORE EMPLOYEE LOGIN
    public function loginEmployee(){
        $data['title'] = "Login Clubstore | Employee";
        return view('login_employee',$data);
    }
    public function loginEmployeeAction(Request $request){
        $method =$request->method();
        if($method == "POST"){
            $result =DB::selectOne("SELECT u.id,u.nama,u.email,u.status,r.nama AS roole FROM user AS u RIGHT JOIN role AS r
            ON u.role_id = r.id WHERE u.email=? AND u.password=? AND u.role_id=2",[
                $request->input('email'),
                $request->input('password')
                

            ]);
        if($result != null){
            $request->session()->put('s_id', $result->id);
            $request->session()->put('s_nama', $result->nama);
            $request->session()->put('s_email', $result->email);
            $request->session()->put('s_status', $result->status);
            $request->session()->put('s_roole', $result->roole);

            return redirect('/');
        }else{
            return redirect('/login/employee')->with('error','Email atau Password employee yang dimasukkan salah,harap masukkan ulang!');
        }
    }else{
        return redirect('/login/employee');
    }
    }
    //USER REGISTRATION
    public function register(Request $request){
        $data['title'] = "Register ClubStore";
        return view('register_user',$data);
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required|min:4|email|unique:user',
            'password' => 'required',
        ]);
        DB::table('user')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role_id'=>3
        ]);
       
        return redirect('/login')->with('success','Registrasi sukses,silahkan login!');
    }
    //EMPLOYEE REGISTRATION
    public function registerEmployee(Request $request){
        $data['title'] = "Register ClubStore";
        return view('register_employee',$data);
    }

    public function registerEmployeePost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required|min:4|email|unique:user',
            'password' => 'required',
        ]);
        DB::table('user')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role_id'=>2
        ]);
       
        return redirect('/login/employee')->with('success','Registari employee baru sukses,silahkan login!');
    }
    //Logout
    public function Userlogout(){
        Session::flush();
        return redirect('login')->with('warning','Kamu berhasil logout');
    }
    public function Employeelogout(){
        Session::flush();
        return redirect('login/employee')->with('warning','Kamu berhasil logout');
    }
    

}
