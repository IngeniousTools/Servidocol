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
    <h2 class="text-center">Lista de elementos en el inventario.</h2>
    <div class="col-xs-12 col-md-10 col-md-offset-1">
      <table id="table_id" class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>Elemento</th>
            <th>Marca</th>
            <th>Cantidad</th>
            <th>Valor total</th>
            <th>Valor unitario</th>
            <th>Categoria</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($bills as $bill)
            <tr>
              <td>{{$bill->item}}</td>
              <td>{{$bill->brand}}</td>
              <td class="text-right">{{$bill->quantity}}</td>
              <td class="text-right">{{'$' . number_format($bill->price)}}</td>
              <td class="text-right">{{'$' . number_format($bill->price/$bill->quantity)}}</td>
              <td>{{$bill->clasification}}</td>
              <td>
                <a href="#">
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
