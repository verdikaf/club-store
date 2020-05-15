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
            $result =DB::selectOne("SELECT u.id,u.nama,u.telp,u.email,u.password,u.provinsi,u.kota,u.kecamatan,u.kode_pos,u.alamat_lengkap,r.nama AS roole FROM user AS u RIGHT JOIN role AS r
            ON u.role_id = r.id WHERE u.email=? AND u.password=? AND u.role_id=3",[
                $request->input('email'),
                $request->input('password')
                

            ]);
        if($result != null){
            $request->session()->put('s_id', $result->id);
            $request->session()->put('s_nama', $result->nama);
            $request->session()->put('s_telp', $result->telp);
            $request->session()->put('s_email', $result->email);
            $request->session()->put('s_password', $result->password);
            $request->session()->put('s_provinsi', $result->provinsi);
            $request->session()->put('s_kota', $result->kota);
            $request->session()->put('s_kecamatan', $result->kecamatan);
            $request->session()->put('s_kode_pos', $result->kode_pos);
            $request->session()->put('s_alamat_lengkap', $result->alamat_lengkap);
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
            $result =DB::selectOne("SELECT u.id,u.nama,u.telp,u.email,u.password,u.provinsi,u.kota,u.kecamatan,u.kode_pos,u.alamat_lengkap,r.nama AS roole FROM user AS u RIGHT JOIN role AS r
            ON u.role_id = r.id WHERE u.email=? AND u.password=?",[
                $request->input('email'),
                $request->input('password')
                

            ]);
        if($result != null){
            $request->session()->put('s_id', $result->id);
            $request->session()->put('s_nama', $result->nama);
            $request->session()->put('s_telp', $result->telp);
            $request->session()->put('s_email', $result->email);
            $request->session()->put('s_password', $result->password);
            $request->session()->put('s_provinsi', $result->provinsi);
            $request->session()->put('s_kota', $result->kota);
            $request->session()->put('s_kecamatan', $result->kecamatan);
            $request->session()->put('s_kode_pos', $result->kode_pos);
            $request->session()->put('s_alamat_lengkap', $result->alamat_lengkap);
            $request->session()->put('s_roole', $result->roole);
           

            return redirect('/dashboard');
        }else{
            return redirect('/login/employee')->with('error','Email atau Password salah,harap masukkan ulang!');
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
            'telp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required|min:4|email|unique:user',
            'password' => 'required'
        ]);
        DB::table('user')->insert([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'provinsi'=> $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap,
            'email' => $request->email,
            'password' => $request->password,
            'role_id'=>3
        ]);
       
        return redirect('/login')->with('success','Registrasi sukses,silahkan login!');
    }
    //Logout
    public function Userlogout(){
        Session::flush();
        return redirect('/')->with('warning','Kamu berhasil logout');
    }
    public function Employeelogout(){
        Session::flush();
        return redirect('login/employee')->with('warning','Kamu berhasil logout');
    }
    
    
    //WAREHOUSE EMPLOYEE

    public function indexEmployee(Request $request ) {

        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );

        $nav_menu = $this->displayMenu($request);

        $data = DB::table('user')
            ->join('role', 'user.role_id', '=', 'role.id')
            ->select(DB::raw('user.*, role.nama as role_id'))
            ->where('role.id', 2)
            ->groupBy('user.id')->get();
        
            
            return view('user_employee', ['data' => $data, 'session' => $session, 'nav_menu' => $nav_menu]);
 
    }

    public function employeeAdd() {
        $data['role'] = DB::select("SELECT * FROM role");
        $data['nav_menu'] = $this->displayMenu($request);
        $data['session'] = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );
        return view('user_employee_add', $data);
    }

    public function employeeAddSave(Request $request) {
        DB::table('user')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => $request->password,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap,
            'role_id' => $request->role_id
        ]);
    return redirect('/user/employee');

    }

    public function employeeEdit($id) {
        $user = DB::table('user')->where('id',$id)->get();
        $role = DB::table('role')->get();
        $session  = array(
            'id'             => $request->session()->get('s_id'),
            'nama'           => $request->session()->get('s_nama'),
            'roole'          => $request->session()->get('s_roole')
        );

        $nav_menu = $this->displayMenu($request);
        return view('user_employee_edit',['user' => $user, 'session' => $session, 'nav_menu' => $nav_menu, 'role' => $role]);

    }

    public function employeeEditSave(Request $request) {
        DB::table('user')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => $request->password,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap,
            'role_id' => $request->role_id
        ]);
        return redirect('/user/employee');
    }

    public function indexDataCustomer(Request $request) {

        $data = DB::table('user')
            ->join('role', 'user.role_id', '=', 'role.id')
            ->select(DB::raw('user.*, role.nama as role_id'))
            ->where('role.id', 3)
            ->groupBy('user.id')->get();
    

            $nav_menu = $this->displayMenu($request);
            $session = array(
                'id'             => $request->session()->get('s_id'),
                'nama'           => $request->session()->get('s_nama'),
                'roole'          => $request->session()->get('s_roole')
            );

            return view('data_customer', ['data' => $data, 'nav_menu' => $nav_menu, 'session' => $session]);
            
 
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
