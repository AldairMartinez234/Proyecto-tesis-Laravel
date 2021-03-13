<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Logon_log;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
  use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        
    $user = new Logon_log();
    $user->usuario = auth()->user()->email;
    $user->tipo_usuario=auth()->user()->tipo_usuario;
    $user->save(); // Se guarda el registro en la base de datos.
    $Idultimo = $user->id;
    $connection_id=DB::select('select id from logon_log where id = ?',[$Idultimo]);
    DB::update('update users set login_ts=NOW(), estado=? where email = ?', ['Activo',auth()->user()->email]);
    DB::update('update logon_log set connection_id = CONNECTION_ID(),login_ts=NOW() where id = ?', [$connection_id[0]->id]);


       if(auth()->user()->tipo_usuario == 'Administrador')

       {

         return '/';

       }

       return '/';
    }

}