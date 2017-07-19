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

          <form role="form" method="post" action="{{action('EmployeeController@login')}}" id="form">
            @if (session('status'))
            <script type="text/javascript">
                swal({
                  title: 'Error con la sesión',
                  type: 'error',
                  html:
                    'Algo ha salido mal',
                  showCloseButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
            @endif

            {{ csrf_field() }}

            <h2 class="text-center">Iniciar Sesión</h2>
            <div class="form-group">
                  <label class="sr-only" for="txt_identificacion">Identificación.</label>
                  <input class="form-control" id="txt_identificacion" name="txt_identificacion" type="text" placeholder="Identificación" required maxlength="10">
              </div>

              <div class="form-group">
                  <label class="sr-only" for="txt_password">Contraseña.</label>
                  <input class="form-control login-password" id="txt_password" name="txt_password" type="password" placeholder="Contraseña" required maxlength="16">
              </div>

              <button class="btn btn-block btn-custom" type="submit" name="btn_login">Iniciar sesión.</button>
          </form>
        </div>
      </div>
  </div>
</div>

<script>

$(document).ready(function() {
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  email: "Por favor, escribe una dirección de correo válida",
  digits: "Por favor, escribe sólo dígitos.",
  minlength: "Este campo debe tener entre 8 y 16 caracteres.",
  maxlength: "Este campo debe tener entre 8 y 16 caracteres.",
  });
});

jQuery.validator.addMethod("lettersonly", function(value, element){
return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "Letras solamente por favor.");

$.validator.addMethod("valueNotEquals", function(value, element, arg){
 return arg !== value;
}, "Selecciona otra opción.");

$( "#form" ).validate( {
  rules: {
    opt_rol: {
      valueNotEquals: "0",
    },
    txt_identificacion: {
      digits: true,
      required: false,
    },
    txt_password: {
      minlength: 8,
      maxlength: 16,
      required: false,
    }
  }
});
</script>

@endsection
