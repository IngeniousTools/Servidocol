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
              <th>Cedula</th>
              <th>Empleado</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $users)
              <tr>
                <td>{{$users->idEmployee}}</td>
                <td>{{$users->employee->name}} {{$users->employee->lastname}}</td>
                <td>{{$users->rol->name}}</td>
                <td>
                  @if($users->status === 1)
                    Activo
                  @elseif($users->status === 0)
                    Inactivo
                  @endif
                  </td>
                <td>
                  <a href="{{url('user/view')}}/{{$users->idUser}}">
                    <i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp; Ver detalles
                  </a>
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
