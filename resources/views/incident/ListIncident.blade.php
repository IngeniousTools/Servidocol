@extends('layouts.Navbar')

@section('styles')

<link rel="stylesheet" href="{{Asset('css/datatables.css')}}">

@endsection

@section('content')
  <div class="container form-position">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <table id="table_id" class="table table-striped table-bordered dataTable">
          <thead>
            <tr>
              <th>número de caso</th>
              <th>Area</th>
              <th>Prioridad</th>
              <th>Asunto</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($incident as $incidents)

            <tr>
              @if(session('rol') === 8)
                @if($incidents->aprobation == 0)
                  <td>{{$incidents->idIncident}}</td>
                  <td>{{$incidents->areaIncident->name}}</td>
                  <td>{{$incidents->priority->name}}</td>
                  <td>{{ $incidentDetail[$incidents->idIncident] }}</td>
                  <td>{{$incidents->date}}</td>
                  <td>
                    @if($incidents->status === 1)
                    <label class="text-success bg-success">Activo</label>
                    @elseif($incidents->status === 0)
                    <label class="text-danger bg-danger">Cerrado</label>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('incident/filter')}}/{{$incidents->idIncident}}">
                      <i class="fa fa-filter fa-fw" aria-hidden="true"></i>&nbsp; Filtrar
                    </a>
                @endif
                @elseif(session('rol') === 1)
                      <td>{{$incidents->idIncident}}</td>
                      <td>{{$incidents->areaIncident->name}}</td>
                      <td>{{$incidents->priority->name}}</td>
                      <td>{{ $incidentDetail[$incidents->idIncident] }}</td>
                      <td>{{$incidents->date}}</td>
                      <td>
                        @if($incidents->status === 1)
                        <label class="text-success bg-success">Activo</label>
                        @elseif($incidents->status === 0)
                        <label class="text-danger bg-danger">Cerrado</label>
                        @endif
                      </td>
                      <td>
                        <a href="{{url('incident/view')}}/{{$incidents->idIncident}}">
                          <i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp; Ver Detalle
                        </a>

              @elseif(session('rol') === 2)
                @if($incidents->idAreaIncident == 2)
                  @if($incidents->aprobation == 1)
                    <td>{{$incidents->idIncident}}</td>
                    <td>{{$incidents->areaIncident->name}}</td>
                    <td>{{$incidents->priority->name}}</td>
                    <td>{{ $incidentDetail[$incidents->idIncident] }}</td>
                    <td>{{$incidents->date}}</td>
                    <td>
                      @if($incidents->status === 1)
                      <label class="text-success bg-success">Activo</label>
                      @elseif($incidents->status === 0)
                      <label class="text-danger bg-danger">Cerrado</label>
                      @endif
                    </td>
                    <td>
                      <a href="{{url('incident/view')}}/{{$incidents->idIncident}}">
                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp; Ver detalle
                      </a>
                  @endif
                @endif
              @elseif(session('rol') === 3)
                @if($incidents->idAreaIncident == 3)
                  @if($incidents->aprobation == 1)
                    <td>{{$incidents->idIncident}}</td>
                    <td>{{$incidents->areaIncident->name}}</td>
                    <td>{{$incidents->priority->name}}</td>
                    <td>{{ $incidentDetail[$incidents->idIncident] }}</td>
                    <td>{{$incidents->date}}</td>
                    <td>
                      @if($incidents->status === 1)
                      <label class="text-success bg-success">Activo</label>
                      @elseif($incidents->status === 0)
                      <label class="text-danger bg-danger">Cerrado</label>
                      @endif
                    </td>
                    <td>
                      <a href="{{url('incident/view')}}/{{$incidents->idIncident}}">
                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp; Ver detalle
                      </a>
                  @endif
                @endif
              @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="{{Asset('js/datatables.js')}}" type="Text/JavaScript"></script>
@endsection
