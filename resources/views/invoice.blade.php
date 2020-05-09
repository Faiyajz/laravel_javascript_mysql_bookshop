<!DOCTYPE html>
<html>
<head>
<style>
body{
    display: block;
}
.float-left{
    float: left;
}
.float-right{
    float: right;
}
.display{
  height: 100px;
}
ul li{
  list-style: none;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th{
  background-color: #dddddd;
}
.item{
  border-bottom: 1px solid #eee;
}
</style>
</head>
<body>
  <div class="display">
      <div class="float-left">
          <ul>
            <li> {{ $order->name }}</li>
            <li>{{ $order->phone_no }} </li>
            <li>{{ $order->email }}</li>
            <li>{{ $order->address }}</li>
          </ul>
      </div>
      <div class="float-right">
        <ul>
          <li>Date: {{ $order->created_at->format('m/d/Y') }}</li>
          <li>Order ID:{{ $order->slug }}</li>
          <li>Account: {{ $order->payment_id }}</li>
          <li>Transation: {{ $order->transaction_id }}</li>
        </ul>
      </div>

  </div>
  <table>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Writer</th>
      <th>Books</th>
      <th>SubTotal</th>
    </tr>
      @php $i = 1; @endphp
      @foreach($order->order_item as $orderitem)
      <tr class="item">
          <td>{{ $i++ }}</td>
          <td>{{ $orderitem->book->name }}</td>
          <td>{{ $orderitem->book->writer->name }}</td>
          <td>{{ $orderitem->quantity }}</td>
          <td>{{ $orderitem->subtotal }} TK.</td>
      </tr>
      @endforeach
  </table>
</body>
</html>
