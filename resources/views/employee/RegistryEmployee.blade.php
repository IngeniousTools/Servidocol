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
        <form role="form" action="" method="post" id="form">
          {{ csrf_field() }}

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Exito.',
                  type: 'success',
                  html:
                    'Empleado registrado correctamente',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <h2 class="text-center">Registro de empleados</h2>
          <div class="form-group">
              <label class="sr-only" for="txt_identification">Identificación.</label>
              <input class="form-control" id="txt_identification" name="txt_identification" type="text" placeholder="Identificación" required maxlength="10">
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

          <div class="form-group">
              <label class="sr-only" for="txt_name">Nombre: </label>
              <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" required maxlength="40">
          </div>

          <div class="form-group">
            <label class="sr-only" for="txt_lastname">Apellido: </label>
            <input class="form-control" id="txt_lastname" name="txt_lastname" type="text" placeholder="Apellido" required maxlength="40">
          </div>

          <div class="form-group">
            <label class="sr-only" for="txt_location">Dirección</label>
            <input class="form-control" id="txt_location" name="txt_location" type="text" placeholder="Dirección" required maxlength="35">
          </div>

          <div class="form-group">
              <label class="sr-only" for="txt_celphone">Celular: </label>
              <input class="form-control" id="txt_celphone" name="txt_celphone" type="text" placeholder="Celular" maxlength="10">
          </div>

          <div class="form-group">
            <label class="sr-only" for="txt_phone">Teléfono: </label>
            <input class="form-control" id="txt_phone" name="txt_phone" type="text" placeholder="Teléfono" maxlength="10">
          </div>

          <div class="form-group">
              <label class="sr-only" for="txt_email">Correo electrónico: </label>
              <input class="form-control" id="txt_email" name="txt_email" type="text" placeholder="Correo electrónico" required maxlength="50">
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
    txt_identification: {
      digits: true,
      required: false,
    },
    opt_jobtitle: {
      valueNotEquals: "0",
    },
    txt_name: {
      lettersonly: true,
      required: true,
    },
    txt_lastname: {
      lettersonly: true,
      required: true,
    },
    txt_location: {
      required: true,
    },
    txt_celphone: {
      digits: true,
      required: false,
    },
    txt_phone: {
      digits: true,
      required: false,
    },
    txt_email: {
      email: true,
      required: true,
    }
  }
});
</script>
@endsection
