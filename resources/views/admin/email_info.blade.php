<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
         
                <div class="div_center" style="margin-bottom: 30px">
                    <h2 class="h2_font">Send Email To {{$order->email}}</h2>
                </div>

                <form action="{{route('send_user_email', $order->id)}}" method="POST" class="m-auto w-50">
                  @csrf
                        <div class="mb-3">
                          <label class="form-label">Email Greeting: </label>
                          <input type="text" class="form-control input_color" name="greeting">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email FirstLine: </label>
                          <input type="text" class="form-control input_color" name="firstline">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email Body: </label>
                          <input type="text" class="form-control input_color" name="body">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email Button Name: </label>
                          <input type="text" class="form-control input_color" name="button">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email URL: </label>
                          <input type="text" class="form-control input_color" name="url">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email LastLine: </label>
                          <input type="text" class="form-control input_color" name="lastline">
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Send Email" class="btn btn-primary">
                        </div>
                </form>
        </div>
        </div>
      </div>
    </div>

    @include('admin.script')
  </body>
</html>