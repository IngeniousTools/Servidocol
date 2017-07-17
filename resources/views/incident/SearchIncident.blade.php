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

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Error.',
                  type: 'error',
                  html:
                    'La busqueda realizada no concuerda con tu area o no existe.',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <div class="form-group {{ $errors->has('txt_identificationIncident') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_identificationIncident">Número de identificación: </label>
              <input class="form-control" type="text" name="txt_identificationIncident" placeholder="Número de identificación">
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Buscar</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  digits: "Por favor, escribe sólo dígitos.",
  });
});

$( "#form" ).validate( {
  rules: {
    txt_identificationIncident: {
      digits: true,
      required: false,
    }
  }
});
</script>
@endsection
