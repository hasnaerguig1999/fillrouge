@extends('layouts.app')

@section('content')

<div class="container mt-4">
  <div class="container">
    <h1>Ajouter un produit</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <input type="hidden" name="product_id">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" step="0.01" name="price" id="price" required>
        </div>
        <div class="form-group">
            <label for="old_price">Ancien prix</label>
            <input type="number" step="0.01" name="old_price" id="old_price">
        </div>
        <div class="form-group">
            <label for="inStock">En stock</label>
            <input type="number" name="inStock" id="inStock" required>
        </div>
        <div class="form-group">
            <label for="qty">Quantité</label>
            <input type="number" name="qty" id="qty" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" required>
        </div>
        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" value="Ajouter le produit" class="btn btn-success">
                    valider
                </button>
            </div>
        </form>
    </div>
    
</div>
<style>
  /* CSS pour rendre le formulaire responsive */
  * {
      box-sizing: border-box;
  }
  body {
      font-family: Arial, sans-serif;
      margin: 0;
  }
  .container {
      width: 100%;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
  }
  .form-group {
      margin-bottom: 20px;
  }
  label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
  }
  input, textarea {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      margin-top: 5px;
  }
  input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
  }
  input[type="submit"]:hover {
      background-color: #3e8e41;
  }
  @media screen and (max-width: 600px) {
      /* CSS pour rendre le formulaire responsive sur les petits écrans */
      input[type="submit"] {
          width: 100%;
      }
  }
</style>
@endsection