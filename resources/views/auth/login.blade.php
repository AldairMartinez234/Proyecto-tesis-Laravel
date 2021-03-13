@extends('layouts.inicio')

@section('content')

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
                 @if ($errors->any())
                <div class="alert alert-danger">
                <h6>Por favor corrige los siguientes errores:</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                </div>
                @endif
                <form class="login100-form validate-form" method="POST">
                    {{csrf_field()}}
                    <span class="login100-form-title p-b-49">
                        Bienvenido <br>
                        <font size="2">Ingrese sus credenciales para poder ingresar al sistema</font>
                    </span>
                    <span class="login100-form">
                        <center><img src="img/ISSSTE_logo.png" style="width: 300px; height: 100px; " ></center>
                    </span>

                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Ingrese su nombre de usuario">
                        <span class="label-input100"><b style="font: 2">Correo</b></span>
                        <input class="input100" type="text" name="email" placeholder="Usuario">
                        {!! $errors->first('username','<span> class="help-block">:message</span>')!!}
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Ingrese se contraseña">
                        <span class="label-input100"><b>Contraseña</b></span>
                        <input class="input100" type="password" name="password" placeholder="Contraseña">
                        {!! $errors->first('pass','<span> class="help-block">:message</span>')!!}
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="background-color: rgb(78, 109, 249);">
                          Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
@endsection