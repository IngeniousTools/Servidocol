@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen4.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<link rel="stylesheet" href="{{Asset('plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">

@endsection

@section('scripts')
  <script src="{{Asset('plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="Text/JavaScript"></script>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="form-position col-xs-8 col-md-8 col-md-offset-2">

      <div class="form-content">
        <form role="form" action="" method="post" id="form">
          {{ csrf_field() }}

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Exito.',
                  type: 'success',
                  html:
                    'Solicitud en procesamiento',
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
                    'El usuario no existe',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <h2 class="text-center">Registro de solicitudes</h2>
          <br>
          <br>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_identity">Identificación: </label>
            <input class="form-control" id="txt_identity" name="txt_identity" type="text" placeholder="Documento de identidad" required>
          </div>
          <br>
          @foreach($stocks as $stock)
          <div class="row">
            <div class="col-md-4 col-md-offset-2">
              {{$stock->item}}
            </div>
            <div class="col-md-4">
              <input type="number" name="nmb_{{$stock->idItem}}" id="nmb_{{$stock->idItem}}" value="0" min="0" max="{{$stock->quantity}}">
            </div>
          </div>

          @endforeach
          <br>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_deliveryDate">Fecha de entrega o notificación: </label>
            <input class="form-control" id="txt_deliveryDate" name="txt_deliveryDate" type="text" placeholder="Fecha de entrega o notificación" required>
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Registrar</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#txt_deliveryDate').datepicker({
  endDate: "today",
  format: "yyyy-mm-dd",
  todayBtn: "linked",
  language: "es",
  orientation: "bottom right",
  autoclose: true,
  todayHighlight: true,
});
</script>

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
    opt_element: {
      valueNotEquals: "0",
    },
    opt_brand: {
      valueNotEquals: "0",
    },
    txt_price: {
      digits: true,
      required: false,
    },
    txt_quantity: {
      digits: true,
      required: false,
    }
  }
});
</script>
@endsection
