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
              <h2 class="h2_font">All Products</h2>
            </div>

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
                      <th scope="col" class="text-warning" >Edit Product</th>
                      <th scope="col" class="text-warning" >Delete Product</th>
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
                    <td>
                      <a href="{{route('edit_product',$product->id)}}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                      <a href="" class="btn btn-danger">Delete</a>
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