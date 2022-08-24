{{-- <x-app-layout>
</x-app-layout> --}}

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

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input type="text" placeholder="Enter category name" name="category_name" class="input_color">
                        <input type="submit" value="Add Category" class="btn btn-primary" name="submit">
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    @include('admin.script')
  </body>
</html>