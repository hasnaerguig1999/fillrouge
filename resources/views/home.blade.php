@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <center>
            <h5 class="card-price"> Featured Products</h5>
            </center>
          </div>
          <div class="card-body">
            <center>
            {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquet, metus vel volutpat hendrerit, massa tellus vestibulum ipsum, ac dapibus sapien quam vel mauris.</p> --}}
            <img src="../img/undraw_successful_purchase_uyin.svg" width="44%"  alt=""></center>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <center>
            <h3>Categories</h3>
        </center>
          </div>
          <div class="list-group list-group-flush">
            @foreach ($categories as $category)
              <a href="{{ route('category.products', $category->slug) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                {{ $category->title }}
                <span class="badge bg-dark rounded-pill">{{ $category->products->count() }}</span>
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid mt-5 mb-3">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
    @foreach ($products as $product)
      <div class="col">
        <div class="card h-100">
          <img class="card-img-top h-50" src="{{url($product['image']) }}" alt="{{ $product->title }}">
  
          <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-price">{{ $product->price }} dh</h5>
              <span class="text-danger">
                <strike>{{ $product->old_price }} dh</strike>
              </span>
            </div>
          </div>
  
          <div class="card-footer">
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-dark w-100"><i class="fa fa-info" aria-hidden="true"></i> View Detail</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<style>
    /* adjust card width and image height based on screen size */
.card {
  width: 100%;
  border: none;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  height: 250px;
  object-fit: cover;
}

@media (min-width: 576px) {
  .card-img-top {
    height: 300px;
  }
}

@media (min-width: 768px) {
  .card-img-top {
    height: 350px;
  }
}

@media (min-width: 992px) {
  .card-img-top {
    height: 400px;
  }
}
@media (min-width: 1200px) {
  .card-img-top {
    height: 450px;
  }
}

/* add some padding to the card body */
.card-body {
  padding: 1rem;
}

/* center the card title */
.card-title {
  text-align: center;
}

/* add some margin to the card price */
.card-price {
  margin-top: 1rem;
}

/* add some margin to the view detail button */
.btn-warning {
  margin-top: 1rem;
}

/* make the categories list sticky and add some margin */
.list-group {
  position: sticky;
  top: 2rem;
  margin-top: 2rem;
}


</style>
@endsection
