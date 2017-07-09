@extends('layouts.navbar')

@section('styles')
  <link rel="stylesheet" href="{{Asset('css/datatables.css')}}">
@endsection

@section('scripts')
  <script src="{{Asset('js/datatables.js')}}" type="Text/JavaScript"></script>
@endsection

@section('content')
<div class="container form-position">
  <div class="row">
    <h2 class="text-center">Lista de elementos</h2>
    <div class="col-xs-12 col-md-10 col-md-offset-1">
      <table id="table_id" class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Deposito</th>
            <th>Categoria</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($elements as $element)
            <tr>
              <td>{{$element->name}}</td>
              <td>{{$element->deposit->name}}</td>
              <td>{{$element->category->name}}</td>
              @if($element->status == 0)
                  <td class="bg-danger text-danger">Inactivo</td>
                @elseif($element->status == 1)
                  <td class="bg-success text-success">Activo</td>
                @endif
              <td>
                <a href="{{url('element/view')}}/{{$element->idItem}}">
                  <i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp; Ver detalle
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
