@extends('layouts.Navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen2.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
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
    <div class="form-position col-xs-12 col-md-8 col-md-offset-2">
      <div class="form-content">
        <div class="form-content text-center">
          <form role="form" action="{{action('EmployeeController@UpdateEmployee',[$employee->idEmployee])}}" method="post">
            {{ csrf_field() }}

            <h3 class="text-center">Información de {{$employee->name}} {{$employee->lastname}}</h3>
            <div class="form-group">
              <div class="col-xs-3">
                <label for="txt_identificacion">Identificación:</label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <label id="txt_identificacion" name="txt_identificacion">{{$employee->idEmployee}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-3">
                <label class="text-center" for="opt_jobtitle">Cargo: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <select class="form-control" id="opt_jobtitle" name="opt_jobtitle" disabled="" required>
                  @foreach ($jobtitle as $jobtitles)
                  <option	value="{{$jobtitles->idJobTitle}}"
                  @if($jobtitles->idJobTitle === $employee->idJobTitle)
                    selected=""
                  @endif
                    > {{ $jobtitles->name }} </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group {{ $errors->has('txt_name') ? ' has-error' : '' }}">
              <div class="col-xs-3">
                <label for="txt_name">Nombre: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" value="{{$employee->name}}" disabled="" required>
                @if ($errors->has('txt_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('txt_name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('txt_lastname') ? ' has-error' : '' }}">
              <div class="col-xs-3">
                <label for="txt_lastname">Apellido: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <input class="form-control" id="txt_lastname" name="txt_lastname" type="text" placeholder="Apellido" value="{{$employee->lastname}}" disabled="" required>
                @if ($errors->has('txt_lastname'))
                <span class="help-block">
                  <strong>{{ $errors->first('txt_lastname') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('txt_location') ? ' has-error' : '' }}">
              <div class="col-xs-3">
                <label for="txt_location">Dirección: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <input class="form-control" id="txt_location" name="txt_location" type="text" placeholder="Dirección" value="{{$employee->location}}" disabled="" required>
                @if ($errors->has('txt_location'))
                <span class="help-block">
                  <strong>{{ $errors->first('txt_location') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('txt_celphone') ? ' has-error' : '' }}">
              <div class="col-xs-3">
                <label for="txt_celphone">Celular: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <input class="form-control" id="txt_celphone" name="txt_celphone" type="text" placeholder="Celular" value="{{$employee->celPhone}}" disabled="">
                @if ($errors->has('txt_celphone'))
                <span class="help-block">
                  <strong>{{ $errors->first('txt_celphone') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('txt_phone') ? ' has-error' : '' }}">
              <div class="col-xs-3">
                <label for="txt_phone">Teléfono: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <input class="form-control" id="txt_phone" name="txt_phone" type="text" placeholder="Teléfono" value="{{$employee->phone}}" disabled="">
                @if ($errors->has('txt_phone'))
                <span class="help-block">
                  <strong>{{ $errors->first('txt_phone') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('txt_email') ? ' has-error' : '' }}">
              <div class="col-xs-3">
                <label for="txt_email">Correo electrónico: </label>
              </div>
              <div class="col-xs-8 col-xs-offset-1">
                <input class="form-control" id="txt_email" name="txt_email" type="text" placeholder="Correo electrónico" value="{{$employee->email}}" disabled="" required>
                @if ($errors->has('txt_email'))
                <span class="help-block">
                  <strong>{{ $errors->first('txt_email') }}</strong>
                </span>
                @endif
              </div>
            </div>



            <div class="form-group">

              <select class="form-control" id="opt_status" name="opt_status" disabled="" >
                @if($employee->status === 0)
                  <option	value="0" selected=""> Inactivo </option>
                  <option	value="1"> Activo </option>
                @else
                  <option	value="0"> Inactivo </option>
                  <option	value="1" selected=""> Activo </option>
                @endif
              </select>
            </div>

            <div class="col-xs-6">
              <a href="{{url('employee/list')}}">
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
@endsection
