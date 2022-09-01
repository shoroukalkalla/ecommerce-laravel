<!DOCTYPE html>
<html>
   <head>
    
      @include('home.metas')

      <title>E-commerce</title>

      @include('home.css')

   </head>
   <body>
      
            @include('home.header')

            @if(session()->has('message'))
            <div class="alert alert-success w-50 m-auto text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif

      <table class="table m-auto w-50 text-center" style="margin-top: 100px !important; margin-bottom: 100px !important; font-family: monospace"">
        <thead>
          <tr>
            <th scope="col">Product Title</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $totalPrice=0; ?>
            @foreach ($cart as $cart)        
            <tr>
              <th scope="row">{{$cart->product_title}}</th>
              <td>{{$cart->quantity}}</td>
              <td>${{$cart->price}}</td>
              <td>
                <img src="/product/{{$cart->image}}" class="img-fluid rounded-start">
              </td>
              <td>
                <a href="{{route('remove_cart', $cart->id)}}" class="btn btn-danger">Remove</a>
              </td>
            </tr>
            <?php $totalPrice = $totalPrice + $cart->price ?>
            @endforeach
  
        </tbody>
      </table>
      <div>
        <h2 style="display:flex; justify-content:center; font-size: 20px; font-weight:bold;">Total price: ${{$totalPrice}}</h2>
      </div>
      
      <div>
        <h1 style="display:flex; justify-content:center; font-size:25px; padding:20px">Proceed To Order</h1>
        <div style="display:flex; justify-content:center; margin-bottom:30px">
          <a href="{{route('cash_order')}}" class="btn btn-secondary" style="margin-right: 5px;">Cash On Delivery</a>
          <a href="{{route('stripe',$totalPrice)}}" class="btn btn-secondary" >Pay Using Card</a>
        </div>
      </div>
      
      @include('home.script')
   </body>
</html>
