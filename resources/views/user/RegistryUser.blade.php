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
        <form role="form" action="" method="post" id="form">
          {{ csrf_field() }}

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Exito.',
                  type: 'success',
                  html:
                    'Usuario registrado correctamente',
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
                    'Usuario ya fue registrado anteriormente o no existe.',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <h2 class="text-center">Registro de usuarios</h2>
          <div class="form-group">
              <label class="sr-only" for="txt_identificacion">Identificación.</label>
              <input class="form-control" id="txt_identificacion" name="txt_identificacion" type="text" placeholder="Identificación" required maxlength="10">
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

          <div class="form-group">
              <label class="sr-only" for="txt_password">Contraseña: </label>
              <input class="form-control" id="txt_password" name="txt_password" type="password" placeholder="Contraseña" required maxlength="16">
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Registrar</button>

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
      required: true,
    },
    txt_password: {
      minlength: 8,
      maxlength: 16,
      required: true,
    }
  }
});
</script>

@endsection
