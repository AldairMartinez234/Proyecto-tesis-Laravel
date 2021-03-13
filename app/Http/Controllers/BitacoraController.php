<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logon_log;
use App\Bitacora_Paciente;
use DB;

class BitacoraController extends Controller
{
    public function index()
    {
    	 $Logon_log = Logon_log::all();
         return view('bitacoras.index',['Logon_logs' => $Logon_log]);
    }
}
