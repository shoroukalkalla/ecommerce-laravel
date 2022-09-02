<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')

      <div class="container-fluid page-body-wrapper">
          @include('admin.navbar')

          <div class="main-panel">
            <div class="content-wrapper">

                
                <div class="div_center" style="margin-bottom: 30px">
                    <h2 class="h2_font">All Orders</h2>
                </div>

                <table class="table font-monospace text-center text-light">
                    <thead>
                        <tr>
                          <th scope="col" class="text-warning" >Username</th>
                          <th scope="col" class="text-warning" >Email</th>
                          <th scope="col" class="text-warning" >Address</th>
                          <th scope="col" class="text-warning" >Phone</th>
                          <th scope="col" class="text-warning" >Product Title</th>
                          <th scope="col" class="text-warning" >Quantity</th>
                          <th scope="col" class="text-warning" >Price</th>
                          <th scope="col" class="text-warning" >Payment Status</th>
                          <th scope="col" class="text-warning" >Delivery Status</th>
                          <th scope="col" class="text-warning" >Image</th>
                          <th scope="col" class="text-warning" >Delivered</th>
                          <th scope="col" class="text-warning" >PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)             
                      <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img src="/product/{{$order->image}}">
                        </td>
                        <td>
                          @if ($order->delivery_status == 'Processing')
                              
                          <a href="{{route('delivered', $order->id)}}" class="btn btn-primary">Delivered</a>

                          @else
                          
                          <p style="color: green">Delivered</p>

                          @endif
                      </td>
                      <td>
                        <a href="" class="btn btn-secondary">Print</a>
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
    </div>

    @include('admin.script')
  </body>
</html>