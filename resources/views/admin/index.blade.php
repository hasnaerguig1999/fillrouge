@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Liste des produits</h1>
    <div class="text-center">
        <a href="./create" class="btn btn-success btn-lg btn-rounded">Ajouter un produit</a>
      </div><br>
      
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Ancien prix</th>
                    <th scope="col">En stock</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->old_price }}</td>
                    <td>{{ $product->inStock }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td class="product-image">
                        <div class="image-container">
                          <img src="{{ url($product->image) }}" alt="" class="img-fluid">
                        </div>
                      </td>
                                          <td>
                                            {{-- {{ route('admin.edit',$product->slug)}} --}}
                        <a href="/admin/edit/{{$product->id}}" id="{{ $product->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Modifier</a>
    
                        
                        <form  id="{{ $product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button
                             {{-- onclick="event.preventDefault();
                            // if(confirm('are you sur for delete thid product {{ $product->title }} ?'))
                            // document.getElementById({{ $product->id}}).submit();" --}}
                             class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .table td,
.table th {
    vertical-align: middle;
    text-align: center;
}
.table th {
    font-size: 1.2rem;
    font-weight: bold;
    background-color: #343a40;
    color: #fff;
}
.table td {
    font-size: 1.1rem;
}
.table tbody tr:hover {
    background-color: #f2f2f2;
}
@media only screen and (max-width: 767px) {
    .table td,
    .table th {
        font-size: 1rem;
        padding: 0.5rem;
    }
}
@media only screen and (max-width: 576px) {
    .table th {
        font-size: 1rem;
    }
}
@media (max-width: 575.98px) {
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    /* .table-responsive table */
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
}
.product-image {
  position: relative;
  padding: 0;
}

.image-container {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 100%; /* Make the container square */
  overflow: hidden;
}

.image-container:before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.1); /* Add a semi-transparent overlay */
  z-index: 1;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.product-image:hover .image-container:before {
  opacity: 1; /* Show the overlay on hover */
}

.product-image img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; /* Make sure the image fills the container */
  z-index: 2;
}
.btn-rounded {
  border-radius: 50px;
}

@media only screen and (max-width: 576px) {
  .btn-lg {
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
  }
}



</style>

@endsection
