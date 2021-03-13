<?php 
      use App\User; 
      use App\Paciente;
      use App\Unidades;
      use DB;
    
        dd('Modo contin Activo');
        DB::update("UPDATE pacientes set contador=NOW(),estado = 'Activo' where estado = 'Activo'");
        $contin = DB::SELECT('SELECT fecha_fin,contador FROM pacientes');
        $contador = DB::SELECT('SELECT contador FROM pacientes');

        if ($contin == $contador) {
            dd('Modo Contingecia desactivado');
            
        }else{

            dd('Modo contin Activo');
        }
         
         ?>