<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
          @foreach ($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{route('product_details', $product->id)}}" class="option1">
                     Product Details
                     </a>
                     
                     @include('home.add_to_cart_form')

                  </div>
               </div>
               <div class="img-box">
                  <img src="/product/{{$product->image}}">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$product->title}}
                  </h5>

                  @if ($product->discount_price !== null)

                  <h6 style="color: red">
                     {{$product->discount_price}}
                  </h6>

                  <h6 style="text-decoration-line: line-through; color:green">
                     {{$product->price}}
                  </h6>
                      
                  @else

                  <h6 style="color: green">
                     {{$product->price}}
                  </h6>

                  @endif
                  
               </div>
            </div>
         </div>
       @endforeach
       
       <div class="d-flex justify-content-center m-auto" style="margin-top: 20px !important">
         {!! $products->links() !!}
       </div>

    </div>
 </section>

