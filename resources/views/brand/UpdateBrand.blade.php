@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../../images/bg-screen11.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
@endsection

@section('scripts')
<script type="text/javascript">
  function update() {
    $('input').each(function() {
      $(this).removeAttr('disabled');
    });
    $('select').each(function() {
      $(this).removeAttr('disabled');
    });
    var elem = document.getElementById('updated');
    elem.parentNode.removeChild(elem);
    var boton = document.createElement("button");
    boton.type = "submit";
    boton.id = "save";
    boton.name = "save";
    boton.className = "btn btn-custom";
    var text = document.createTextNode("Guardar");
    boton.appendChild(text);
    var element = document.getElementById('covert');
    element.appendChild(boton);
  }
</script>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="form-position col-xs-12 col-md-6 col-md-offset-3">

      <div class="form-content">
        @foreach($brands as $brand)
        <form role="form" action="{{action('BrandController@UpdateBrand',[$brand->idBrand])}}" method="post" id="form">
          {{ csrf_field() }}

          <h2 class="text-center">Actualización de marca de elemento</h2>
          <br>
          <br>
          <br>


          <div class="form-group">
            <div class="col-xs-3">
              <label for="txt_name">Nombre: </label>
            </div>
            <div class="col-xs-8 col-xs-offset-1">
              <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" value="{{$brand->name}}" disabled="" required maxlength="20">
            </div>
          </div>

          <br>
          <br>

            <div class="form-group">
              <select class="form-control" id="opt_status" name="opt_status" disabled="" >
                @if($brand->status == 0)
                  <option	value="0" selected=""> Inactivo </option>
                  <option	value="1"> Activo </option>
                @else
                  <option	value="0"> Inactivo </option>
                  <option	value="1" selected=""> Activo </option>
                @endif
              </select>
            </div>

            <div class="col-xs-6">
              <a href="{{url('element/brand/list')}}">
                <button class="btn btn-default" type="button" name="button">Cancelar</button>
              </a>
            </div>
            <div class="col-xs-6">
              <button class="btn btn-custom" type="button" name="button" id="updated" onclick="update();">Actualizar</button>
              <span id="covert">
          @endforeach

        </form>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
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
