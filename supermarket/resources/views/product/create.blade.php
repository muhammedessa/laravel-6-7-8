@extends('product.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('products.store')}}" method="POST">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" class="form-control"  placeholder="product name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  Price</label>
            <input type="text" name="price" class="form-control"  placeholder="product price">
          </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Details  </label>
          <textarea class="form-control" name="detail"   rows="3"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection
