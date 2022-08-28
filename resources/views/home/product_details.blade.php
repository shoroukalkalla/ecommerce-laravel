<!DOCTYPE html>
<html>
   <head>
    
    <base href="/public">
      @include('home.metas')

      <title>Fashion</title>

      @include('home.css')

   </head>
   <body>
      
            @include('home.header')
        <div style="margin: 150px 150px">
            <div class="card mb-3 m-auto" style="max-width: 75%; padding:50px">
              <div class="row g-0">
                <div class="col-md-5">
                  <img src="/product/{{$product->image}}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <h2 class="card-title">{{$product->title}}</h2>
                    <hr>
                   
                    @if ($product->discount_price !== null)
                    <p class="card-text" style="text-decoration-line: line-through; color:green"><b>Price: </b>${{$product->price}}</p>
                    <p class="card-text" style="color: red"><b>Discount Price: </b>${{$product->discount_price}}</p>
                    @else
                    <p class="card-text"><small style="color:green"><b>Price: </b>${{$product->price}}</small></p>
                    @endif

                    <p class="card-text"><small><b>Description: </b> {{$product->description}}</small></p>
                    <p class="card-text"><small><b>Quantity: </b> {{$product->quantity}}</small></p>
                    <p class="card-text"><small><b>Catgeory: </b> {{$product->category->category_name}}</small></p>
                  </div>
                </div>
              </div>
            </div>
        </div>

      @include('home.footer')
      
      @include('home.script')
   </body>
</html>