<!DOCTYPE html>
<html>
   <head>
    
      @include('home.metas')

      <title>E-commerce</title>

      @include('home.css')

   </head>
   <body>
      
            @include('home.header')


      <table class="table m-auto w-50 text-center" style="margin-top: 100px !important; margin-bottom: 100px !important">
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
              <td>{{$cart->price}}</td>
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
      <div class="m-auto w-50">
        <h2 style="margin: auto; width:15%">Total price: {{$totalPrice}}</h2>
      </div>
      
      
      @include('home.script')
   </body>
</html>