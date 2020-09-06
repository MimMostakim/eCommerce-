<table>
    <thead>
    <tr>
        <th>Order Id</th>
        <th>Customer Name</th>
        <th>Order Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->customer->fullname}}</td>
            <td>{{$order->order_total}}</td>
        </tr>
    @endforeach
    </tbody>
</table>