@extends('layouts.navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../images/bg-screen7.jpg);
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

          <h2 class="text-center">Registro de elementos</h2>
          <br>
          <br>
          <br>

          @if(session('delivery'))
            <script type="text/javascript">
                swal({
                  title: 'Exito.',
                  type: 'success',
                  html:
                    'Registro de elemento exitoso.',
                  showCloseButton: true,
                  showConfirmButton: true,
                  confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
                }).catch(swal.noop)

            </script>
          @endif

          <div class="form-group">
              <label class="sr-only" for="opt_deposit">Deposito: </label>
              <select class="form-control" id="opt_deposit" name="opt_deposit" type="text"  required>
                <option	value="0"> Deposito </option>
                @foreach ($deposits as $deposit)
                  <option	value="{{$deposit->idDeposit}}"> {{ $deposit->name }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label class="sr-only" for="opt_category">Categoria: </label>
              <select class="form-control" id="opt_category" name="opt_category" type="text"  required>
                <option	value="0"> Categoria </option>
                @foreach ($categories as $category)
                  <option	value="{{$category->idCategory}}"> {{ $category->name }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label class="sr-only" for="txt_name">Nombre: </label>
            <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" required maxlength="20">
          </div>

          <div class="form-group">
              <label class="sr-only" for="opt_abc">Clasificación: </label>
              <select class="form-control" id="opt_abc" name="opt_abc" type="text"  required>
                <option	value="0"> Clasificación </option>
                <option	value="A"> A </option>
                <option	value="B"> B </option>
                <option	value="C"> C </option>
              </select>
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
    opt_deposit: {
      valueNotEquals: "0",
    },
    opt_category: {
      valueNotEquals: "0",
    },
    opt_abc: {
      valueNotEquals: "0",
    },
    txt_name: {
      lettersonly: true,
      required: true,
    }
  }
});
</script>
@endsection
