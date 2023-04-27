@extends('layouts.app')

@section('content')

<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Modifier un produit') }}</div>
        <div class="card-body">
          {{-- @foreach ($product as $product) --}}
          {{-- @endforeach --}}
          {{-- <a href="/admin/edit/{{$product->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Modifier</a> --}}
          {{-- /admin/products{{$product->id}} --}}
          <form  method="POST" action="/admin/update/{{$product->id}}"  enctype="multipart/form-data">
            @csrf
           
            @method('PUT')
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="form-group">
              <label for="title">{{ __('Titre') }}</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $product->title) }}" required autofocus>
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">{{ __('Description') }}</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">{{ __('Prix') }}</label>
              <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price', $product->price) }}" required>
              @error('price')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="old_price">{{ __('Ancien prix') }}</label>
              <input type="number" step="0.01" class="form-control @error('old_price') is-invalid @enderror" name="old_price" id="old_price" value="{{ old('old_price', $product->old_price) }}">
              @error('old_price')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inStock">{{ __('En stock') }}</label>
              <input type="number" class="form-control @error('inStock') is-invalid @enderror" name="inStock" id="inStock" value="{{ old('inStock', $product->inStock) }}" required>
              @error('inStock')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="qty">{{ __('Quantité') }}</label>
              <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty" value="{{ old('qty', $product->qty) }}" required>
              @error('qty')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="image">{{ __('Image') }}</label>
              <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image" >
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="category_id">{{ __('Catégorie') }}</label>
              <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required>
                <option value="">{{ __('Choisir une catégorie') }}</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
              </select>
              @error('category_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Modifier') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection