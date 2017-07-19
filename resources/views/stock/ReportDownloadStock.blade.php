<table id="table_id" class="table table-striped table-bordered dataTable">
  <thead>
    <tr>
      <th>Elemento</th>
      <th>Marca</th>
      <th>Cantidad</th>
      <th>Valor total</th>
      <th>Valor unitario</th>
      <th>Clasificación</th>
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
    @endforeach
      </tr>
  </tbody>
</table>
