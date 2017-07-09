@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../images/bg-screen3.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="form-position col-xs-12 col-md-6 col-md-offset-3">

      <div class="form-content">
        <form role="form" action="" method="post">
          {{ csrf_field() }}

          <h2 class="text-center">Registro de usuarios</h2>
          <div class="form-group {{ $errors->has('txt_identificacion') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_identificacion">Identificación.</label>
              <input class="form-control" id="txt_identificacion" name="txt_identificacion" type="text" placeholder="Identificación" required>
              @if ($errors->has('txt_identificacion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_identificacion') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group">
              <label class="sr-only" for="opt_rol">Rol: </label>
              <select class="form-control" id="opt_rol" name="opt_rol" type="text"  required>
                <option	value="0"> Rol </option>
                @foreach ($rol as $rols)
                  <option	value="{{$rols->idRol}}"> {{ $rols->name }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group {{ $errors->has('txt_password') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_password">Contraseña: </label>
              <input class="form-control" id="txt_password" name="txt_password" type="password" placeholder="Contraseña" required>
              @if ($errors->has('txt_password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_password') }}</strong>
                  </span>
              @endif
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Registrar</button>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
