@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../images/bg-screen2.jpg);
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

          <h2 class="text-center">Registro de empleados</h2>
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
              <label class="sr-only" for="opt_jobtitle">Cargo: </label>
              <select class="form-control" id="opt_jobtitle" name="opt_jobtitle" type="text"  required>
                <option	value="0"> Cargo </option>
                @foreach ($jobtitle as $jobtitles)
                  <option	value="{{$jobtitles->idJobTitle}}"> {{ $jobtitles->name }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group {{ $errors->has('txt_name') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_name">Nombre: </label>
              <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" required>
              @if ($errors->has('txt_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_name') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('txt_lastname') ? ' has-error' : '' }}">
            <label class="sr-only" for="txt_lastname">Apellido: </label>
            <input class="form-control" id="txt_lastname" name="txt_lastname" type="text" placeholder="Apellido" required>
            @if ($errors->has('txt_lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('txt_lastname') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('txt_location') ? ' has-error' : '' }}">
            <label class="sr-only" for="txt_location">Dirección</label>
            <input class="form-control" id="txt_location" name="txt_location" type="text" placeholder="Dirección" required>
            @if ($errors->has('txt_location'))
                <span class="help-block">
                    <strong>{{ $errors->first('txt_location') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('txt_celphone') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_celphone">Celular: </label>
              <input class="form-control" id="txt_celphone" name="txt_celphone" type="text" placeholder="Celular">
              @if ($errors->has('txt_celphone'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_celphone') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('txt_phone') ? ' has-error' : '' }}">
            <label class="sr-only" for="txt_phone">Teléfono: </label>
            <input class="form-control" id="txt_phone" name="txt_phone" type="text" placeholder="Teléfono">
            @if ($errors->has('txt_phone'))
            <span class="help-block">
              <strong>{{ $errors->first('txt_phone') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('txt_email') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_email">Correo electrónico: </label>
              <input class="form-control" id="txt_email" name="txt_email" type="text" placeholder="Correo electrónico" required>
              @if ($errors->has('txt_email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_email') }}</strong>
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
