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

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('success')}}
                    </div>
                @endif
                
            <div class="div_center" style="margin-bottom: 30px">
                <h2 class="h2_font">Add Product</h2>

                <form action="{{route('add_product')}}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
                    @csrf
                        <div class="mb-3">
                          <label class="form-label">Porduct Title: </label>
                          <input type="text" class="form-control input_color" placeholder="Enter product title" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Porduct Description: </label>
                            <input type="text" class="form-control input_color" placeholder="Enter product description" name="description">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Porduct Quantity: </label>
                            <input type="number" min="0" class="form-control input_color" placeholder="Enter product quantity" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Porduct Price: </label>
                            <input type="text" class="form-control input_color" placeholder="Enter product price" name="price" class="input_color">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discount Price: </label>
                            <input type="text" class="form-control input_color" placeholder="Enter discount price" name="discount_price" class="input_color">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Image: </label>
                            <input class="form-control file_input_color" type="file" name="image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Category: </label>
                            <select class="form-select form-control input_color" name="category">
                                <option selected>Select Category..</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <input type="submit" value="Add Product" class="btn btn-primary" name="submit">
                </form>
            </div>
        </div>
      </div>
    </div>

    @include('admin.script')
  </body>
</html>