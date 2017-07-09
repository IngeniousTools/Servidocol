@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen7.jpg);
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

          <h2 class="text-center">Registro de categorias</h2>

          <div class="form-group {{ $errors->has('txt_name') ? ' has-error' : '' }}">
            <label class="sr-only" for="txt_name">Nombre: </label>
            <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" required>
            @if ($errors->has('txt_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('txt_name') }}</strong>
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
