<form action="{{route('add_to_card',$product->id)}}" method="POST">
    @csrf
    <div class="row mt-3">

       <div class="col-md-4">
          <input type="number" name="quantity" value="1" max="{{$product->quantity}}" min="1">
       </div>

       <div class="col-md-4">
          <input type="submit" value="Add To Cart" class="option1">
       </div>
    </div>
 </form>