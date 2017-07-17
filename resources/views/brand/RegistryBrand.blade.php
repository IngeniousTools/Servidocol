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
        <form role="form" action="" method="post">
          {{ csrf_field() }}

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Exito.',
                  type: 'success',
                  html:
                    'Marca registrada exitosamente.',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <h2 class="text-center">Registro de marcas para los elementos</h2>

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

<script>

$(document).ready(function() {
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  digits: "Por favor, escribe sólo dígitos.",
  });
});

jQuery.validator.addMethod("lettersonly", function(value, element){
return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "Letras solamente por favor.");


$( "#form" ).validate( {
  rules: {
    txt_name: {
      lettersonly: true,
      required: true,
    }
  }
});
</script>
@endsection
