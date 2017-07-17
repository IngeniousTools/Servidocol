@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen13.jpg);
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
    <div class="form-position col-xs-12 col-md-6 col-md-offset-3">

      <div class="form-content">
        <form role="form" action="" method="post">
          {{ csrf_field() }}

          <h2 class="text-center">Registro de elementos en el inventario</h2>
          <br>
          <br>
          <br>
          <div class="form-group">
              <label class="sr-only" for="opt_element">Elemento: </label>
              <select class="form-control" id="opt_element" name="opt_element" type="text"  required>
                <option	value="0"> Elemento </option>
                @foreach ($elements as $element)
                  <option	value="{{$element->idItem}}"> {{ $element->name }} </option>
                @endforeach
              </select>
          </div>
          <br>
          <div class="form-group">
              <label class="sr-only" for="opt_brand">Marca: </label>
              <select class="form-control" id="opt_brand" name="opt_brand" type="text"  required>
                <option	value="0"> Marca </option>
                @foreach ($brands as $brand)
                  <option	value="{{$brand->idBrand}}"> {{ $brand->name }} </option>
                @endforeach
              </select>
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_price">Precio: </label>
            <input class="form-control" id="txt_price" name="txt_price" type="text" placeholder="Precio total de los elementos" required>
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_quantity">Cantidad: </label>
            <input class="form-control" id="txt_quantity" name="txt_quantity" type="text" placeholder="Cantidad" required>
          </div>
          <br>
          <div class="form-group">
            <label class="sr-only" for="txt_date">Fecha de compra: </label>
            <input class="form-control" id="txt_date" name="txt_date" type="text" placeholder="Fecha de compra" required>
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Registrar</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#txt_date').datepicker({
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
