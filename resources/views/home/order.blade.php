<!DOCTYPE html>
<html>

<head>

    @include('home.metas')

    <title>E-commerce</title>

    @include('home.css')

    <style>
        .center {
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }

        table,th,td{
            border: 1px solid black;
            /* border-collapse: collapse; */
        }

        .th_deg{
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>

</head>

<body>

    @include('home.header')

    <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>
            </tr>

            @foreach($order as $order)
            <tr>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->delivery_status }}</td>
                <td><img src="product/{{$order->image}}" alt="Image" width="100px" height="100px"></td>
                <td>
                    @if ($order->delivery_status == 'Processing')    
                    <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger">Cancel Order</a>
                    @else
                    <p style="color:blue">Not Allowed</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('home.script')
</body>

</html>
