<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Direccion;
use App\Datos__Familiar;
use App\vista_pacientes;
use App\vista_familiar;
use App\User;
use App\huella_temp;
use App\Bitacora_Paciente;
use App\Bitacora_Direccion;
use App\Bitacora_Familiar;
use DB;
use Carbon\Carbon;

class PacienteController extends Controller
{
    public function index()
    {
       //$pacientes = DB::select('SELECT * FROM pacientes where estado = ?',['Activo']);
        $pacientes = Paciente::all();
        $direccions = Direccion::all();
        $datos__familiars = Datos__Familiar::all();
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
      return view('pacientes.index',['pacientes'=>$pacientes,'direccions'=>$direccions,'datos___familiars'=>$datos__familiars,'timestamp'=>$timestamp]);
    }

    public function buscarhuella(Request $request)
    {
      
      $pacientes = DB::select('Select*from pacientes where id = ? ',[$request->id_paciente]);
      $datos__familiars = DB::select('Select*from datos___familiars where paciente_id = ? ',[$request->id_paciente]);
      $direccions = DB::select('Select*from direccions where paciente_id = ? ',[$request->id_paciente]);
      $timestamp = \Carbon\Carbon::now()->toDateTimeString();
    return view('pacientes.index',['pacientes'=>$pacientes,'direccions'=>$direccions,'datos___familiars'=>$datos__familiars,'timestamp'=>$timestamp]);
    }

    public function lector_buscar($token)
    {
      DB::delete('delete from huellas_temp where pc_serial =? ', [$token]);
      $pacientes = DB::insert('insert into huellas_temp (pc_serial, texto, opc) values (?, ?, ?)', [$token,'El sensor de huella dactilar esta activado', 'leer' ]);
      
    }

    public function lector($token)
    {
      DB::delete('delete from huellas_temp where pc_serial =? ', [$token]);
      $pacientes = DB::insert('insert into huellas_temp (pc_serial, texto, statusPlantilla, opc) values (?, ?, ?, ?)', [$token,'El sensor de huella dactilar esta activado', 'Muestras Restantes: 4', 'capturar' ]);
      return response()->json("{\"filas\":$pacientes}");
    }
    
    public function httpush($timestamp,$token)
    {
      
      $fecha_actual = 0;
      $fecha_bd = 0;

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fecha_actual = (isset($timestamp) && $timestamp != 'null') ? $timestamp : 0;
    } else {
        if (isset($timestamp) && $timestamp != 'null') {
            $fecha_actual = $timestamp;
        }
    }
    
    while ($fecha_bd <= $fecha_actual) {
      usleep(100000);
      clearstatcache();
       $wordCount = DB::table('huellas_temp')->where('pc_serial', '<=', $token)->count();
      if ($wordCount > 0) {
          $fecha_bd = Carbon::parse($wordCount[0]['update_time'])->timestamp;
          
  }
}
$results = DB::select('Select*from huellas_temp where pc_serial = ?  ORDER BY id DESC LIMIT 1',[$token]);
foreach($results as $paciente){
  $reponse = array();
  $reponse["id"] = $paciente->id;
  $reponse["timestamp"] = Carbon::parse($paciente->update_time)->timestamp;
  $reponse["texto"] = $paciente->texto;
  $reponse["statusPlantilla"] = $paciente->statusPlantilla;
  $reponse["nombre"] = $paciente->nombre;
  $reponse["paciente_id"] = $paciente->paciente_id;
  $reponse["imgHuella"] = $paciente->imgHuella;
  $reponse["tipo"] = $paciente->opc;
  echo json_encode($reponse);
  //echo $datosJson;
}

    }

    public function activo()
    {
        $pacientes = DB::select('SELECT * FROM pacientes where estado = ?',['Activo']);
        $direccions = Direccion::all();
        $datos__familiars = Datos__Familiar::all();
      return view('pacientes.index',['pacientes'=>$pacientes,'direccions'=>$direccions,'datos___familiars'=>$datos__familiars]);
    }

    public function inactivo()
    {
        $pacientes = DB::select('SELECT * FROM pacientes where estado = ?',['Inactivo']);
        $direccions = Direccion::all();
        $datos__familiars = Datos__Familiar::all();
      return view('pacientes.index',['pacientes'=>$pacientes,'direccions'=>$direccions,'datos___familiars'=>$datos__familiars]);
    }

    public function proceso()
    {
        $pacientes = DB::select('SELECT * FROM pacientes where estado = ?',['Proceso...']);
        $direccions = Direccion::all();
        $datos__familiars = Datos__Familiar::all();
      return view('pacientes.index',['pacientes'=>$pacientes,'direccions'=>$direccions,'datos___familiars'=>$datos__familiars]);
    }

    public function create($token)
    {
      $tokens=$token;
      $timestamp = \Carbon\Carbon::now()->toDateTimeString();
    
      return view('pacientes.register',compact('tokens','timestamp'));
    }

    public function store(Request $request,$token)
    {
       //Pacientes 
       $request->validate([
        'RFC' => 'required', 
        'nombre' => 'required',
        'sexo' => 'required',
        'tipo'=> 'required',
        'edad'=> 'required',
        'noissste'=> 'required',
        'tel' => 'required', 
        'cel' => 'required',
    ]);

    $pacientes = new Paciente();
    $pacientes->RFC = $request->RFC;
    $pacientes->nombre = $request->nombre;
    $pacientes->sexo= $request->sexo;
    $pacientes->tipo = $request->tipo;
    $pacientes->edad= $request->edad;
    $pacientes->noissste = $request->noissste;
    $pacientes->telefono = $request->tel;
    $pacientes->celular= $request->cel;
    $pacientes->estado= 'En proceso...';
    $pacientes->save(); // Se guarda el registro en la base de datos.

    $Idultimo = $pacientes->id;
     
    DB::update('update huellas_temp set paciente_id = ? where pc_serial = ?', [$Idultimo,$token]);

    $huella = DB::select('select*from huellas_temp where pc_serial = ?',[$token]);
    foreach($huella as $huellas){
    DB::insert('insert into huellas (pc_serial,paciente_id, nombre_dedo, huella, imgHuella) values (?, ?, ?, ?,?)', 
    [$token,$Idultimo,'Dedo 1', $huellas->huella,$huellas->imgHuella]);
    }
     //Direcciones

    $request->validate([
        'calle' => 'required', 
        'referencias' => 'required',
        'entidad' => 'required',
        'cp'=> 'required',
    ]);

    $direccions = new Direccion();
    $direccions->paciente_id = $Idultimo;
    $direccions->calle = $request->calle;
    $direccions->referencias = $request->referencias;
    $direccions->entidad = $request->entidad;
    $direccions->cp = $request->cp;
    $direccions->save(); // Se guarda el registro en la base de datos.

   
     $request->validate([
        'namefami' => 'required', 
        'sex' => 'required',
        'direcfami' => 'required', 
        'refefami' => 'required',
        'entifami' => 'required',
        'cpfami'=> 'required',
        'telfami' => 'required', 
        'celfami' => 'required',
    ]);

    $datos__familiares = new Datos__Familiar();
    $datos__familiares->nombre = $request->namefami;
    $datos__familiares->sexo = $request->sex;
    $datos__familiares->paciente_id = $Idultimo;
    $datos__familiares->calle = $request->direcfami;
    $datos__familiares->referencias = $request->refefami;
    $datos__familiares->entidad = $request->entifami;
    $datos__familiares->cp = $request->cpfami;
    $datos__familiares->telefono = $request->telfami;
    $datos__familiares->celular= $request->celfami;
    $datos__familiares->save(); // Se guarda el registro en la base de datos.


        $bita = new Bitacora_Paciente();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        DB::update('update bitacora_paciente set usuario = ?, tipo_usuario = ? where paciente_id = ?', [$bita->usuario,$bita->tipo_usuario, $Idultimo ]);


         $bita = new Bitacora_Direccion();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        DB::update('update bitacora_direccion set usuario = ?, tipo_usuario = ? where paciente_id = ?', [$bita->usuario,$bita->tipo_usuario, $Idultimo ]);

          $bita = new Bitacora_Familiar();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        DB::update('update bitacora_familiar set usuario = ?, tipo_usuario = ? where paciente_id = ?', [$bita->usuario,$bita->tipo_usuario, $Idultimo ]);

      
     return redirect('/pacientes');
    }

    public function show($id)
    {
        
        $vista_pacientes = vista_pacientes::findOrFail($id);
         return View('pacientes.show')->with('vista_pacientes',$vista_pacientes);

    }

    public function edit($id)
    {    
         $paciente = vista_pacientes::findOrFail($id);
         return View('pacientes.edit')->with('paciente',$paciente);

    }

    public function update(Request $request, $id)
    {
        
        $paciente = Paciente::findOrFail($id);
        
        $paciente->RFC = $request->RFC;
        $paciente->nombre = $request->nombre;
        $paciente->sexo = $request->sexo;
        $paciente->tipo = $request->tipo;
        $paciente->edad = $request->edad;
        $paciente->telefono = $request->tel;
        $paciente->celular = $request->cel;
        $paciente->noissste = $request->noissste;

       
        
     
        DB::update('update vista_pacientes set RFC = ? , nombre = ?, sexo = ?, tipo = ?, edad = ? , telefono = ?, noissste = ? , celular = ? where id = ?', [$paciente->RFC,$paciente->nombre,$paciente->sexo,$paciente->tipo,$paciente->edad,$paciente->telefono,$paciente->noissste,$paciente->celular,$id]);
         
        DB::update('update vista_pacientes set calle = ? , entidad = ? , referencias = ?, cp = ? where paciente_id = ?', [$request->calle,$request->entidad,$request->referencias,$request->cp,$id]);
         
        DB::update('update vista_familiar set nombre = ?, sexo = ?, telefono = ?, celular = ? , calle = ? , entidad = ? , referencias = ? , cp = ? where paciente_id = ?', [$request->namefami,$request->sex,$request->telfami,$request->celfami,$request->direcfami,$request->entifami,$request->refefami,$request->cpfami,$id]);

        $id_paci=DB::table('bitacora_paciente')->latest('id_bitacora')->first();

        $bita = new Bitacora_Paciente();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        $id_bitacora_paci= DB::select('select id_bitacora from bitacora_paciente where id_bitacora =? ', [$id_paci->id_bitacora]);

        DB::update('update bitacora_paciente set usuario = ?, tipo_usuario = ? , paciente_id = ? where id_bitacora = ?', [$bita->usuario,$bita->tipo_usuario, $id,$id_bitacora_paci[0]->id_bitacora]);

         $id_bita=DB::table('bitacora_direccion')->latest('id_bitacora')->first();

         $bita1 = new Bitacora_Direccion();
        $bita1->usuario = auth()->user()->email;
        $bita1->tipo_usuario=auth()->user()->tipo_usuario;
        $id_bitacora= DB::select('select id_bitacora from bitacora_direccion where id_bitacora =? ', [$id_bita->id_bitacora]);
        DB::update('update bitacora_direccion set usuario = ?, tipo_usuario = ? ,paciente_id = ? where id_bitacora = ?', [$bita1->usuario,$bita1->tipo_usuario, $id,$id_bitacora[0]->id_bitacora ]);

          $id_fami=DB::table('bitacora_familiar')->latest('id_bitacora')->first();

         $bita2 = new Bitacora_Familiar();
        $bita2->usuario = auth()->user()->email;
        $bita2->tipo_usuario=auth()->user()->tipo_usuario;
        $id_bitacora= DB::select('select id_bitacora from bitacora_familiar where id_bitacora =? ', [$id_fami->id_bitacora]);
        DB::update('update bitacora_familiar set usuario = ?, tipo_usuario = ? ,paciente_id = ? where id_bitacora = ?', [$bita2->usuario,$bita2->tipo_usuario, $id,$id_bitacora[0]->id_bitacora ]);
         
     return redirect('/pacientes');
    }

    public function delete(Request $request,$id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->id;
          $paciente2 =  $paciente->id;

         DB::delete('delete from direccions where paciente_id =? ', [$id]);
         DB::delete('delete from datos___familiars where paciente_id =? ', [$id]);
         $paciente->delete();
         
         $id_bita=DB::table('bitacora_direccion')->latest('id_bitacora')->first();

         $bita1 = new Bitacora_Direccion();
        $bita1->usuario = auth()->user()->email;
        $bita1->tipo_usuario=auth()->user()->tipo_usuario;
        $id_bitacora= DB::select('select id_bitacora from bitacora_direccion where id_bitacora =? ', [$id_bita->id_bitacora]);
        DB::update('update bitacora_direccion set usuario = ?, tipo_usuario = ? ,paciente_id = ? where id_bitacora = ?', [$bita1->usuario,$bita1->tipo_usuario, $id,$id_bitacora[0]->id_bitacora ]);
          

         $id_fami=DB::table('bitacora_familiar')->latest('id_bitacora')->first();

         $bita2 = new Bitacora_Familiar();
        $bita2->usuario = auth()->user()->email;
        $bita2->tipo_usuario=auth()->user()->tipo_usuario;
        $id_bitacora= DB::select('select id_bitacora from bitacora_familiar where id_bitacora =? ', [$id_fami->id_bitacora]);
        DB::update('update bitacora_familiar set usuario = ?, tipo_usuario = ? ,paciente_id = ? where id_bitacora = ?', [$bita2->usuario,$bita2->tipo_usuario, $id,$id_bitacora[0]->id_bitacora]);

      

          $id_paci=DB::table('bitacora_paciente')->latest('id_bitacora')->first();

        $bita = new Bitacora_Paciente();
        $bita->usuario = auth()->user()->email;
        $bita->tipo_usuario=auth()->user()->tipo_usuario;
        $id_bitacora_paci= DB::select('select id_bitacora from bitacora_paciente where id_bitacora =? ', [$id_paci->id_bitacora]);
        DB::update('update bitacora_paciente set usuario = ?, tipo_usuario = ? , paciente_id = ? where id_bitacora = ?', [$bita->usuario,$bita->tipo_usuario, $id,$id_bitacora_paci[0]->id_bitacora]);
    }

    public function alta(Request $request,$id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->estado = 'Activo';
        $paciente->update();

    }

     public function baja1(Request $request,$id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->estado = 'Inactivo';
        $paciente->motivobaja = 'Alta medica';
        $paciente->update();

    }

 public function baja2(Request $request,$id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->estado = 'Inactivo';
        $paciente->motivobaja = 'Porque ya no lo tolera';
        $paciente->update();

    }

 public function baja3(Request $request,$id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->estado = 'Inactivo';
        $paciente->motivobaja = 'Defuncion';
        $paciente->update();

    }

    public function addcontingencia(Request $request)
    {
        $contin = DB::SELECT('SELECT fecha_fin FROM pacientes');
        $contador = DB::SELECT('SELECT contador FROM pacientes');
        dd($contador);
         $contin = new Paciente();
         $contin->fecha_inicio = $request->inicio;
         $contin->fecha_fin = $request->fin;
          DB::update("UPDATE pacientes set contador=NOW(),fecha_inicio = ?, fecha_fin = ?,estado = 'Activo' where estado = 'Activo'", [$contin->fecha_inicio,$contin->fecha_fin]);
        

       return redirect('/pacientes');
    }

    public function modocontingencia()
    {
        
      return view('layouts.Contingencia');
    }

}