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
              <th>Cargo</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employee as $employees)
              <tr>
                <td>{{$employees->idEmployee}}</td>
                <td>{{$employees->name}} {{$employees->lastname}}</td>
                <td>{{$employees->jobtitle->name}}</td>
                <td>
                  @if($employees->status === 1)
                    <label class="bg-success text-success">Activo</label>
                  @elseif($employees->status === 0)
                    <label class="bg-danger text-danger">Inactivo</label>
                  @endif
                  </td>
                <td>
                  <a href="{{url('employee/view')}}/{{$employees->idEmployee}}">
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
