@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../images/bg-screen5.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="form-position col-xs-12 col-md-8 col-md-offset-2">

      <div class="form-content">
        <form role="form" action="" method="post">
          {{ csrf_field() }}

          <h2 class="text-center">Busqueda de Incidencias</h2>

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>¡Error!</strong> La busqueda realizada no pertenece a tu area o no existe.
            </div>
          @endif

          <div class="form-group {{ $errors->has('txt_identificationIncident') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_identificationIncident">Número de identificación: </label>
              <input class="form-control" type="text" name="txt_identificationIncident" placeholder="Número de identificación">
              @if ($errors->has('txt_identificationIncident'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_identificationIncident') }}</strong>
                  </span>
              @endif
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Buscar</button>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
