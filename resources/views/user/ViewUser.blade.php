@extends('layouts.Navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen3.jpg);
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
        <div class="form-content text-center">
          <form role="form" action="{{action('EmployeeController@UpdateUser',[$user->idUser])}}" method="post" id="form">
            {{ csrf_field() }}

            <h3 class="text-center">Información de {{$user->employee->name}} {{$user->employee->lastname}}</h3>

            </br>
            </br>
            </br>

            <div class="form-group">
              <div class="col-xs-3">
                <label for="txt_identificacion">Identificación:</label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <label id="txt_identificacion" name="txt_identificacion">{{$user->idEmployee}}</label>
              </div>
            </div>
          </br>
        </br>


            <div class="form-group">
              <div class="col-xs-2">
                <label class="text-center" for="opt_rol">Rol: </label>
              </div>
              <div class="col-xs-9 col-xs-offset-1">
                <select class="form-control" id="opt_rol" name="opt_rol" disabled="" required>
                  @foreach ($rol as $rols)
                  <option	value="{{$rols->idRol}}"
                  @if($user->idRol === $rols->idRol)
                    selected=""
                  @endif
                    > {{ $rols->name }} </option>
                  @endforeach
                </select>
              </div>
            </div>

            </br>
            </br>

            <div class="form-group">
              <select class="form-control" id="opt_status" name="opt_status" disabled="" >
                @if($user->status === 0)
                  <option	value="0" selected=""> Inactivo </option>
                  <option	value="1"> Activo </option>
                @else
                  <option	value="0"> Inactivo </option>
                  <option	value="1" selected=""> Activo </option>
                @endif
              </select>
            </div>

            </br>

            <div class="col-xs-6">
              <a href="{{url('user/list')}}">
                <button class="btn btn-default" type="button" name="button">Cancelar</button>
              </a>
            </div>
            <div class="col-xs-6">
              <button class="btn btn-custom" type="button" name="button" id="updated" onclick="update();">Actualizar</button>
              <span id="covert">

              </span>
            </div>
          </div>
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
    opt_rol: {
      valueNotEquals: "0",
    },
    txt_identificacion: {
      digits: true,
      required: false,
    },
    txt_password: {
      required: false,
    }
  }
});
</script>
@endsection
