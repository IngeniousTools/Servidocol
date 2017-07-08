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
        <form role="form" action="" method="post">
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

          <div class="form-group {{ $errors->has('txt_name') ? ' has-error' : '' }}">
            <label class="sr-only" for="txt_lastname">Nombre: </label>
            <input class="form-control" id="txt_name" name="txt_name" type="text" placeholder="Nombre" required>
            @if ($errors->has('txt_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('txt_name') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('txt_celphone') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_celphone">Celular: </label>
              <input class="form-control" id="txt_celphone" name="txt_celphone" type="text" placeholder="Celular">
              @if ($errors->has('txt_celphone'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_celphone') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('txt_phone') ? ' has-error' : '' }}">
            <label class="sr-only" for="txt_phone">Teléfono: </label>
            <input class="form-control" id="txt_phone" name="txt_phone" type="text" placeholder="Teléfono">
            @if ($errors->has('txt_phone'))
            <span class="help-block">
              <strong>{{ $errors->first('txt_phone') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('txt_email') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_email">Correo electrónico: </label>
              <input class="form-control" id="txt_email" name="txt_email" type="text" placeholder="Correo electrónico" required>
              @if ($errors->has('txt_email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_email') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('txt_subject') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_subject">Asunto: </label>
              <input class="form-control" id="txt_subject" name="txt_subject" type="text" placeholder="Asunto" required>
              @if ($errors->has('txt_subject'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_subject') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('txt_observation') ? ' has-error' : '' }}">
              <label class="sr-only" for="txt_observation">Asunto: </label>
              <textarea name="txt_observation" id="txt_observation" required></textarea>
              @if ($errors->has('txt_observation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('txt_observation') }}</strong>
                  </span>
              @endif
          </div>

          <button class="btn btn-block btn-custom" type="submit" name="btn_save">Registrar</button>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
