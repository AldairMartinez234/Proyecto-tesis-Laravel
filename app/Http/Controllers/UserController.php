<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Bitacora;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');    
    }
  
    public function index()
    {  
        $users = User::all();

        return view('usuarios.index',['users'=>$users]);
    }

     public function tabla()
    {  
        $users = User::all();

        return view('usuarios.table',['users'=>$users]);
    }


    public function create()
    {
        $unidad = new Unidades();
        $unidad->unidades_perifericas = $request->unidad;
        $unidad->nombre_responsable = $request->nombre;
        $unidad->telefono = $request->telefono;
        $unidad->ext = $request->ext;
        $unidad->red = $request->red;
        $unidad->unidades_id = $request->id;
        $unidad->tel_particular = $request->tel_parti;
        $unidad->save();

        return response()->json($unidad);
    } 

    public function addItem(Request $request)
    {
       
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->sexo = $request->sexo;
        $user->rol = $request->rol;
        $user->email = $request->email;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->estado = 'Inactivo';
        $user->password = bcrypt($request->pass);
        $user->api_token = Str::random(60);

        $bita = new Bitacora();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        $user->save();
        DB::update('update bitacora set usuario = ?, tipo_usuario = ? where id_usuario = ?', [$bita->usuario,$bita->tipo_usuario, $user->id ]);

        return response()->json($user); 
    }

    public function show($id)
    {
        return view('usuarios.show',['user' => User::findOrFail($id)]);
    }

    public function edit($id)
    { 
        $roles = Role::get();
        $user = User::findOrFail($id);
    
    return view('usuarios.edit', compact('user'));
    }

    public function editItem(Request $request)
    {
        $usuario = User::findOrFail($request->id);

        $usuario->name = $request->get('name');
        $usuario->sexo = $request->get('sexo');
        $usuario->rol = $request->get('rol');
        $usuario->tipo_usuario = $request->get('tipo_usuario');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('pass'));
        $usuario->update();
        $usuario->roles()->sync($request->get('roles'));
        
        $bita = new Bitacora();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        DB::update('update bitacora set usuario = ?, tipo_usuario = ? where id_usuario = ?', [$bita->usuario,$bita->tipo_usuario, $usuario->id ]);

        return response()->json($usuario);
    }

    public function deleteItem(Request $request,$id)
    {
        
       
        $usuario = User::findOrFail($id);
        $usuario->delete();
        $bita = new Bitacora();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        DB::update('update bitacora set usuario = ?, tipo_usuario = ? where id_usuario = ?', [$bita->usuario,$bita->tipo_usuario, $usuario->id ]);
       
    }

     public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
           //After successfull authentication, notice how I return json parameters
            return response()->json([
              'success' => true,
              'token' => $success,
              'user' => $user
          ]);
        } else {
       //if authentication is unsuccessfull, notice how I return json parameters
          return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
        }
    }

    public function logout(Request $res)
    {
      if (Auth::user()) {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
     }
}
