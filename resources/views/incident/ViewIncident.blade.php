@extends('layouts.Navbar')

@section('styles')
<style media="screen">
  body{
    background-image:url(../../images/bg-screen2.jpg);
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .comment-space{
    display: block;
    border-color: #CFE8E2;
    background-color: #CFE8E2;
    border-radius: 4px;

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
      height: 200,
      placeholder: 'Observaciones',
      maxHeight: 200,
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
        <div class="form-content text-center">
          <form role="form" action="{{action('IncidentController@CommentIncident',[$incident->idIncident])}}" method="post">
            {{ csrf_field() }}

            <h3 class="text-center">Información de incidentes</h3>
            <br>
            <br>
            <br>

            <div class="form-group">
              <div class="col-xs-5">
                <label for="txt_incident_number">Número de incidente:</label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_incident_number" name="txt_incident_number">{{$incident->idIncident}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_subject">Asunto: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_subject" name="txt_subject">{{$detail["subject"]}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_creation_date">Fecha de creación: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_creation_date" name="txt_creation_date">{{$incident->date}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_username">Nombre del usuario: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_username" name="txt_username">{{$incident->userName}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_celphone">Celular: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_celphone" name="txt_celphone">{{$incident->celPhone}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_phone">Telefóno: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_phone" name="txt_phone">{{$incident->phone}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_email">Correo: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_email" name="txt_email">{{$incident->email}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_area">Area: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_area" name="txt_area">{{$incident->areaincident->name}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-5">
                <label class="text-center" for="txt_priority">Prioridad: </label>
              </div>
              <div class="col-xs-6 col-xs-offset-1">
                <label id="txt_priority" name="txt_priority">{{$incident->priority->name}}</label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12">
                <label for="txt_description">Descripción:</label>
              </div>
              <div class="col-xs-12 text-left bg-info">
                <?php echo $detail["description"]; ?>
              </div>
            </div>

            <div class="form-group">
              <label > </label>
            </div>

            	@if (count($detail) > 3)
                @for ($i=0; $i<=(count($detail)-4); $i++)
                  <div class="row comment-space">
                    <div class="form-group">
                      <div class="col-xs-6 text-left">
                        <label>Comentario # <?php echo $i+1; ?> </label>
                        <label>Fecha: <?php echo $detail[$i]["date"];?></label>
                      </div>
                      <div class="col-xs-6 text-left" >
                        <label>Publicado por: <?php echo $detail[$i]["user"]; ?></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 text-left">
                        <label><?php echo $detail[$i]["comment"]; ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label > </label>
                  </div>
                @endfor
              @endif



            <div class="col-xs-6">
              <a href="{{url('incident/list')}}">
                <button class="btn btn-default" type="button" name="button">Cancelar</button>
              </a>
            </div>
            @if ($incident->status == 1)
              <div class="col-xs-6">
                <button class="btn btn-custom" type="button" name="btn_comment" data-toggle="modal" data-target="#myModal">Comentar</button>
              </div>

              <div class="form-group">
                <label></label>
              </div>

              <div class="col-xs-6">
                <a href="{{action('IncidentController@PropertyIncident',[$incident->idIncident])}}">
                  <button class="btn btn-custom" type="button" name="button">Tomar propiedad</button>
                </a>
              </div>

              <div class="col-xs-6">
                <a href="{{action('IncidentController@ChangeStatusIncident',[$incident->idIncident])}}">
                  <button class="btn btn-danger" type="button" name="button">Cerrar caso</button>
                </a>
              </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar comentarios a el caso "{{$detail["subject"]}}"</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group {{ $errors->has('txt_observation') ? ' has-error' : '' }}">
                        <label class="sr-only" for="txt_observation">Asunto: </label>
                        <textarea name="txt_observation" id="txt_observation" required></textarea>
                        @if ($errors->has('txt_observation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txt_observation') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>



          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
