@extends('layouts.app')

@section('content')

<center>
    <div class="full-cover-background">
        <div class="page-header">
            <h1 class="all-tittles">BIENVENIDO AL SISTEMA DE CONTROL DE OXIGENO MEDICINAL <br><br><span
                    class="">Usuario: {{ Auth::user()->name }}</span> </h1>
        </div>
    </div>
</center>

<section class="full-cover-background text-center" style="padding: 40px 0;">
    <?php 
      use App\User; 
      use App\Paciente;
      use App\Unidades;
    
         $users_count = User::all()->count();
         $pacientes_count = Paciente::all()->count();
         $unidades_count = Unidades::all()->count();
         

         $tipocasog=Paciente::select('estado')
            ->get();
          //La siguiente linea la repites para cada caso
          $tipocaso_s= $tipocasog->where('estado', 'Activo')->count();

          $tipocasog1=Paciente::select('estado')
            ->get();
          //La siguiente linea la repites para cada caso
          $tipocaso_s1= $tipocasog->where('estado', 'Inactivo')->count();
         
         ?>
    @can('usuarios.index')
    <article class="tile">
        <div class="tile-icon full-reset"><a href="{{asset('usuarios')}}"><i class="zmdi zmdi-face"></a></i></div>
        <div class="tile-name all-tittles"><a href="{{asset('usuarios')}}">Usuarios</a></div>
        <div class="tile-num full-reset">
            {{ $users_count ?? '0' }}</div>
    </article>
    @endcan

    @can('pacientes.index')
    <article class="tile">
        <div class="tile-icon full-reset"><a href="{{asset('pacientes')}}"><i class="zmdi zmdi-accounts"></a></i></div>
        <div class="tile-name all-tittles"><a href="{{asset('pacientes')}}">Pacientes</a></div>
        <div class="tile-num full-reset">
            {{ $pacientes_count ?? '0' }}</div>
    </article>
    @endcan
    <article class="tile">
        <div class="tile-icon full-reset"><a href="{{route('inactivo')}}"><i class="zmdi zmdi-close-circle"></i></a>
        </div>
        <div class="tile-name all-tittles"><a href="{{route('inactivo')}}">Pacientes dados de baja</a></div>
        <div class="tile-num full-reset">{{ $tipocaso_s1 ?? 0 }}</div>
    </article>

    <article class="tile">
        <div class="tile-icon full-reset"><a href="{{route('activos')}}"><i class="zmdi zmdi-check-circle"></i></a>
        </div>
        <div class="tile-name all-tittles"><a href="{{route('activos')}}">Pacientes dados de alta</a></div>
        <div class="tile-num full-reset">{{ $tipocaso_s ?? 0 }}</div>
    </article>

    <article class="tile">
        <div class="tile-icon full-reset"><a href="{{asset('unidades')}}"><i class="zmdi zmdi-hospital"></a></i></div>
        <div class="tile-name all-tittles"><a href="{{asset('unidades')}}">Unidades Medicas</a></div>
        <div class="tile-num full-reset">{{ $unidades_count ?? '0' }}</div>
    </article>

</section>

@endsection