<html>
<head></head>
<body style="padding: 30px; background-color:rgb(241, 237, 245); font-family: 'Roboto', sans-serif;">
<h1>Your Order: {{$order->id}} was successful</h1>

<h2>Your order was successfully made.</h2>
<h3>Your order details:</h3>
<table border="1">
    <th>Product name</th>
    <th>Product price</th>
    <th>Quantity</th>
    @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->pivot->line_quantity}}</td>
        </tr>
    @endforeach
</table>
<h3>Delivery address</h3>
<ul style="list-style-type:none">
    <li>{{$order->name}}</li>
    <li>{{$order->street}}</li>
    <li>{{$order->city}}</li>
    <li>{{$order->postcode}}</li>
    <li>{{$order->country}}</li>
</ul>


<p>Total: £{{$order->total_price}}</p>
</body>
</html>