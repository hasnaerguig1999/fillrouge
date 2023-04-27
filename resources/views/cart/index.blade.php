@extends('layouts.app')

@section('content')

@if(Auth::user() && Auth::user()->id)

<div class="container">
    <div class="row justify">
        <div class="col-md-12 card p-3">
          <h4 class="text-dark">votre panier</h4>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Quantity</th>
                <th>Prix></th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
             
              @php
                $product = $item->model;
              @endphp
              <tr>
                <td>
                  // <img src="{{ $item->image }}" alt="" width="50">
                </td>
                <td>
                  <a href="{{ route('products.show', $item->slug) }}">
                    {{ $item->title }}
                  </a>
                </td>
                <td>
                  <form action="{{ route('cart.update', $item->rowId) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" >
                    <input type="number" name="qty" value="{{ $item->qty }}" min="1" max="{{ $item->inStock }}">
                    <button type="submit" class="btn btn-sm btn-outline-dark">
                      <i class="fa fa-refresh"></i>
                    </button>
                  </form>
                </td>
                <td>
                  {{ $item->price }} dh
                </td>
                <td>
                  {{ $item->price * $item->qty }} dh
                </td>
                <td>
                  <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
                  
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endif

@endsection
