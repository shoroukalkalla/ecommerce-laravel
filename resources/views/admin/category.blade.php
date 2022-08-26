<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            padding top:40px ;
        }

        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color{
            color: black;
        }

    </style>

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
                @elseif(session()->has('danger'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('danger')}}
                    </div>
                @endif
                
                <div class="div_center" style="margin-bottom: 30px">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{route('add_category')}}" method="POST">
                        @csrf
                        <input type="text" placeholder="Enter category name" name="category_name" class="input_color">
                        <input type="submit" value="Add Category" class="btn btn-primary" name="submit">
                    </form>
                </div>
                <table class="table m-auto font-monospace w-50 text-center text-light">
                    <thead>
                        <tr>
                          <th scope="col" class="text-warning" >ID</th>
                          <th scope="col" class="text-warning" >Catgeory Name</th>
                          <th scope="col" class="text-warning" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)             
                      <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a href="{{route('delete_category', $category->id)}}" class="btn btn-danger">Delete</a>
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