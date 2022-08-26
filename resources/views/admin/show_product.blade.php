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

            <table class="table m-auto font-monospace w-50 text-center text-light">
                <thead>
                    <tr>
                      <th scope="col" class="text-warning" >ID</th>
                      <th scope="col" class="text-warning" >Product Title</th>
                      <th scope="col" class="text-warning" >Quantity</th>
                      <th scope="col" class="text-warning" >Category</th>
                      <th scope="col" class="text-warning" >Price</th>
                      <th scope="col" class="text-warning" >Discount price</th>
                      <th scope="col" class="text-warning" >Product Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)             
                  <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category->category_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$product->image}}">
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