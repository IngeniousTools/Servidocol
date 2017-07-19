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
<link rel="stylesheet" href="{{Asset('plugins/summernote/summernote.css')}}">
@endsection

@section('scripts')
<script src="{{Asset('plugins/summernote/summernote.min.js')}}" charset="utf-8"></script>
<script src="{{Asset('plugins/summernote/lang/summernote-es-ES.js')}}" charset="utf-8"></script>
<script>
  $(document).ready(function() {

      $('#txt_observation').summernote({
        height: 90,
        placeholder: 'Observaciones',
        maxHeight: 90,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear','fontname']],
        ['color', ['color']],
        ['para', ['ul']],
        ['fontsize', ['fontsize']],
        ['insert',['picture','video']]
      ],
      });
  });
</script>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="form-position col-xs-12 col-md-8 col-md-offset-2">

      <div class="form-content">
        <form role="form" action="" method="post" id="form">
          {{ csrf_field() }}

          <h2 class="text-center">Registro de Incidencias</h2>

          <div class="form-group">
              <label class="sr-only" for="opt_areaIncident">Area: </label>
              <select class="form-control" id="opt_areaIncident" name="opt_areaIncident" type="text"  required>
                <option	value="0"> Area de incidente</option>
                @foreach ($areaIncident as $areaIncidents)
                  <option	value="{{$areaIncidents->idAreaIncident}}"> {{ $areaIncidents->name }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label class="sr-only" for="txt_name">Nombre: </label>
            <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" required maxlength="45">
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
              <input class="form-control" id="txt_email" name="txt_email" type="text" placeholder="Correo electrónico" maxlength="40" required>
          </div>

          <div class="form-group">
              <label class="sr-only" for="txt_subject">Asunto: </label>
              <input class="form-control" id="txt_subject" name="txt_subject" type="text" placeholder="Asunto" required>
          </div>

          <div class="form-group">
              <label class="sr-only" for="txt_observation">Descripción: </label>
              <textarea name="txt_observation" id="txt_observation" required></textarea>
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save" >Registrar</button>

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
    opt_areaIncident: {
      valueNotEquals: "0",
    },
    txt_name: {
      lettersonly: true,
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
    },
    txt_subject: {
      required: true,
    },
    txt_observation: {
      required: true,
    },
  }
});
</script>

@if(session('delivery'))
  <script type="text/javascript">
      swal({
        title: 'Registro Exitoso',
        type: 'success',
        html:
          'Tu incidente fue registrado ' +
          'exitosamente y entrará en ' +
          'estudio lo más rapido posible.',
        showCloseButton: true,
        confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
      }).catch(swal.noop)

  </script>
@endif

@if(session('error'))
  <script type="text/javascript">
      swal({
        title: 'Error',
        type: 'error',
        html:
          'El campo de observaciones es el más importante por favor llenalo tambien.',
        showCloseButton: true,
        confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
      }).catch(swal.noop)

  </script>
@endif
@endsection
