<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Model\User_Empresa;
use App\Model\Empresa;

use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'username';
    }

    public function userEmpresa_Login(Request $request)
    {
        $request = request();
        $username = $request->get('id');
        $data = User_Empresa::from('user_empresas as uc')
            ->select('uc.id_empresa','c.nombre')
            ->leftJoin('users as u', 'uc.id_user', '=', 'u.id')
            ->leftJoin('empresas as c', 'uc.id_empresa', '=', 'c.id')
            ->where('u.username', '=', "$username")
            ->where('uc.state','=','AC')
            ->get();

        return response()->json($data);

    }

    public function authenticated(Request $request)
    {

        $company = $request->get('companies');
        $id_empresa_nombre = Empresa::from('empresas as e')->select('*')->where('id', '=', $company)->first();     
        
        Session::put('id_empresa', $company);
        Session::put('id_empresa_nombre', $id_empresa_nombre->nombre);
        return redirect('/summary');
    }
}
