@Extends('layouts.Navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../images/bg-screen1.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
  }
</style>
@endsection

@section('content')
<div class="container" style="">
  <div class="row">
      <div class="form-login-position col-xs-12 col-md-6 col-md-offset-3" >
        <div class="form-content">

          <form role="form" method="post" action="{{action('EmployeeController@login')}}">
            @if (session('status'))
              <div class="alert alert-danger text-center">
                  {{ session('status') }}
              </div>
            @endif

            {{ csrf_field() }}

            <h2 class="text-center">Iniciar Sesión</h2>
            <div class="form-group {{ $errors->has('txt_identificacion') ? ' has-error' : '' }}">
                  <label class="sr-only" for="txt_identificacion">Identificación.</label>
                  <input class="form-control" id="txt_identificacion" name="txt_identificacion" type="text" placeholder="Identificación" required>
                  @if ($errors->has('txt_identificacion'))
                      <span class="help-block">
                          <strong>{{ $errors->first('txt_identificacion') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group{{ $errors->has('txt_password') ? ' has-error' : '' }}">
                  <label class="sr-only" for="txt_password">Contraseña.</label>
                  <input class="form-control login-password" id="txt_password" name="txt_password" type="password" placeholder="Contraseña" required>
                  @if ($errors->has('txt_password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('txt_password') }}</strong>
                      </span>
                  @endif
              </div>

              <button class="btn btn-block btn-custom" type="submit" name="btn_login">Iniciar sesión.</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
