<table id="table_id" class="table table-striped table-bordered dataTable">
  <thead>
    <tr>
      <th>Elemento</th>
      <th>Marca</th>
      <th>Cantidad</th>
      <th>valor total</th>
      <th>valor unitario</th>
      <th>Categoria</th>
    </tr>
  </thead>
  <tbody>
    @foreach($bills as $bill)
      <tr>
        <td>{{$bill->item}}</td>
        <td>{{$bill->brand}}</td>
        <td>{{$bill->quantity}}</td>
        <td>{{$bill->price}}</td>
        <td>{{$bill->price/$bill->quantity}}</td>
        <td>Pending</td>
    @endforeach
      </tr>
  </tbody>
</table>
