@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen12.jpg);
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
        <form role="form" action="" method="post" id="form">
          {{ csrf_field() }}

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Exito.',
                  type: 'success',
                  html:
                    'Cambio de contraseña exitoso.',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif
          @if(session('error'))
            <script type="text/javascript">
                swal({
                  title: 'Error.',
                  type: 'error',
                  html:
                    'Usuario no existe.',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <h2 class="text-center">Restaurar contraseña.</h2>

          <div class="form-group">
            <label class="sr-only" for="txt_identification">Identificación: </label>
            <input class="form-control" id="txt_identification" name="txt_identification" type="text" placeholder="Identificación." required maxlength="10">
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_passwordNew">Contraseña nueva: </label>
            <input class="form-control" id="txt_passwordNew" name="txt_passwordNew" type="password" placeholder="Contraseña nueva" required maxlength="16">
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_passwordRectify">Rectificar la nueva contraseña: </label>
            <input class="form-control" id="txt_passwordRectify" name="txt_passwordRectify" type="password" placeholder="Rectificar la contraseña" required maxlength="16">
          </div>
          <br>
          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Cambiar</button>

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
  equalTo: "Las contraseñas no coinciden.",
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
    txt_passwordOld: {
      digits: true,
      required: true,
    },
    txt_passwordNew: {
      minlength: 8,
      maxlength: 16,
      required: true,
    },
    txt_passwordRectify: {
      equalTo: "#txt_passwordNew"
    },
  }
});
</script>
@endsection
