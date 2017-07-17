@extends('layouts.navbar')

@section('styles')
  <link rel="stylesheet" href="{{Asset('plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">
@endsection

@section('scripts')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen5.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<script src="{{Asset('plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="Text/JavaScript"></script>
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="form-position col-xs-12 col-md-8 col-md-offset-2">

      <div class="form-content">
        <form role="form" action="" method="post" onsubmit="notify()">
          {{ csrf_field() }}

          <h2 class="text-center">Generación de reportes.</h2>

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>¡Error!</strong> La busqueda realizada no pertenece a tu area o no existe.
            </div>
          @endif

          <div class="col-xs-6">
            <br>
            <div class="form-group {{ $errors->has('txt_initialDate') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_initialDate">Fecha inicial: </label>
              <input class="form-control" id="txt_initialDate" name="txt_initialDate" type="text" placeholder="Fecha inicial" required>
              @if ($errors->has('txt_initialDate'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_initialDate') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="col-xs-6">
            <br>
            <div class="form-group {{ $errors->has('txt_finishDate') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_finishDate">Fecha Final: </label>
              <input class="form-control" id="txt_finishDate" name="txt_finishDate" type="text" placeholder="Fecha Final" required>
              @if ($errors->has('txt_finishDate'))
              <span class="help-block">
                <strong>{{ $errors->first('txt_finishDate') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <button class="btn btn-block btn-custom" type="submit" id="btn_generate" name="btn_generate">Generar</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function notify() {
  swal({
    title: 'Información.',
    type: 'info',
    html:
    'Reporte generado.',
    showCloseButton: true,
    showConfirmButton: true,
    confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
  }).catch(swal.noop)
}

</script>

<script type="text/javascript">
$('#txt_finishDate').datepicker({
  endDate: "today",
  format: "yyyy-mm-dd",
  todayBtn: "linked",
  language: "es",
  orientation: "bottom right",
  autoclose: true,
  todayHighlight: true,
});

$('#txt_initialDate').datepicker({
    endDate: "today",
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    language: "es",
    orientation: "bottom right",
    autoclose: true,
    todayHighlight: true,
});
</script>

@endsection
