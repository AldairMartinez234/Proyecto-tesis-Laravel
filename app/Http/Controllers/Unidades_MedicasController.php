<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidades;
use App\Telefonos;
use App\Unidad;
use DB;

class Unidades_MedicasController extends Controller
{
   
    public function index()
    {
        $unidades = Unidades::all();
      return view('unidades.index',['unidades'=>$unidades]);
    }


    public function create(Request $request)
    {
        
    //$bita = new Bitacora();
   // $bita->usuario = auth()->unidad()->email;
   // $bita->tipo_usuario=auth()->unidad()->tipo_usuario;
    //$unidad->save();
    //DB::update('update bitacora set usuario = ?, tipo_usuario = ? where id_usuario = ?', [$bita->usuario,$bita->tipo_usuario, $unidad->id ]);
     // Se guarda el registro en la base de datos.
     
    }

    public function addunidades(Request $request)
    {
         $unidad = new Unidad();
         $unidad->unidad = $request->unidad;
         $unidad->nombre = $request->nombre;
         $unidad->save();
         $ultimo = $unidad->id;


         $unidades = new Telefonos();
         $unidades->unidades_id = $ultimo;
         $unidades->telefono = $request->telefono;
         $unidades->ext = $request->ext;
         $unidades->red = $request->red;
         $unidades->tel_particular = $request->tel_parti;
         $unidades->unidades_id = $ultimo;
         $unidades->telefono2 = $request->telefono2;
         $unidades->tel_particular1 = $request->tel_parti1;
         $unidades->red1 = $request->red1;
         $unidades->save();

          return redirect('/unidades');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request)
    {
        $unidad = Unidad::findOrFail($request->id);

         $unidad->unidad = $request->unidad;
         $unidad->nombre = $request->nombre;
         $unidad->update();
         $ultimo = $unidad->id;

         $unidades = Telefonos::where('unidades_id', $request->id)->first();
         $unidades->telefono = $request->telefono;
         $unidades->ext = $request->ext;
         $unidades->red = $request->red;
         $unidades->tel_particular = $request->tel_parti;
         $unidades->telefono2 = $request->telefono2;
         $unidades->tel_particular1 = $request->tel_parti1;
         $unidades->red1 = $request->red1;
         $unidades->update();

       return redirect('/unidades');
    }

    public function update(Request $request,$id)
    {
         
    }

    public function destroy($id)
    {
      $unidad = Unidad::findOrFail($id);
      DB::delete('delete from telefono where unidades_id =? ', [$id]);
      
      $unidad->delete();
    }
}
