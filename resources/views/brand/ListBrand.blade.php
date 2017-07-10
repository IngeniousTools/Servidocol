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
    <h2 class="text-center">Lista de marcas por categoria.</h2>
    <div class="col-xs-12 col-md-10 col-md-offset-1">
      <table id="table_id" class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($brands as $brand)
            <tr>
              <td>{{$brand->name}}</td>
                @if($brand->status == 0)
                  <td class="bg-danger text-danger">Inactivo</td>
                @elseif($brand->status == 1)
                  <td class="bg-success text-success">Activo</td>
                @endif
              <td>
                <a href="{{url('element/brand/update')}}/{{$brand->idBrand}}">
                  <i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>&nbsp; Actualizar
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
