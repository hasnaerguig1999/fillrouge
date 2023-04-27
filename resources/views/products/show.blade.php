@extends('layouts.app')

@section('content')

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true">X</span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this post</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure
                        you want to delete this post?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <a href="../" id="aa"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-skip-backward-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.79-2.907L8.5 7.028V5.5a.5.5 0 0 0-.79-.407L5 7.028V5.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0V8.972l2.71 1.935a.5.5 0 0 0 .79-.407V8.972l2.71 1.935A.5.5 0 0 0 12 10.5v-5a.5.5 0 0 0-.79-.407z" />
                </svg></a>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img-top h-50" src="{{ url($product['image']) }}"
                                    alt="{{ $product->title }}">
                            </div>
                            <div class="col-md-8">
                                <h3 class="card-title">{{ $product->title }}</h3>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text font-weight-bold mb-0">{{ $product->price }} DH</p>
                                @if ($product->old_price)
                                    <p class="card-text text-muted"><strike>{{ $product->old_price }} DH</strike></p>
                                @endif
                                <p class="card-text font-weight-bold mb-0">
                                    Stock:
                                    @if ($product->inStock > 0)
                                        <span class="text-success">Disponible</span>
                                    @else
                                        <span class="text-danger">Non Disponible</span>
                                    @endif
                                </p>
                                <form action="{{ route('add.cart', $product) }}" method="post">
                                    @csrf
                                    <div class="form-group mt-3">
                                        <label for="qty" class="label-input">Quantité :</label>
                                        <div class="input-group">
                                            <input type="number" name="qty" id="qty" placeholder="quantité"
                                                max="{{ $product->inStock }}" min="1" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-dark">
                                                    <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (session('cart'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="cart">
                        <center>
                            <h2>Panier <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </span> </h2>
                        </center>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Produit</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Prix unitaire</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php$total = 0;
                                        
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $item)
                                            @php
                                                // dd(print_r($item));
                                                $subtotal = $item['price'] * $item['quantity'];
                                            @endphp
                                            @if ($item['quantity'] > 0)
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="mr-3">

                                                                <img src="{{ url($item['image']) }}"
                                                                    class="align-self-center" alt="{{ $item['title'] }}"
                                                                    height="100px" width="100px">
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h5 class="mb-0">{{ $item['title'] }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">{{ $item['quantity'] }}</td>
                                                    <td class="align-middle">
                                                        <form action="/update/{{ $item['id'] }}/cart" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group mt-3">
                                                                <label for="qty" class="label-input">Quantité
                                                                    :</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="qty" id="qty"
                                                                        placeholder="quantité" class="form-control">
                                                                    <div class="input-group-append">
                                                                        <button type="submit" class="btn btn-light">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor"
                                                                                class="bi bi-pencil-fill"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                                            </svg> Edit
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td class="align-middle">{{ $item['price'] }} DH</td>
                                                    <td class="align-middle">{{ $subtotal }} DH</td>
                                                    <td class="align-middle">
                                                        {{-- @if (Auth::user() && Auth::user()->id == $post->user_id) --}}


                                                        <a href="" class="btn btn-light"></a>


                                                        </button>
                                                        </a>
                                                        <form action="/remove/cart/{{ $item['id'] }}" method="POST"
                                                            class="">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                </svg>
                                                        </form>


                                                </tr>
                                            @endif
                                            @php $total += $subtotal @endphp
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total : <span><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path
                                                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                    </svg></span></strong></td>
                                        <td class="align-middle"><strong>{{ $total }} DH</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    @endif
    </div>
    </div>
    </div>


    <style>
        a svg,
        a#aa {
            color: black;
            text-decoration: none;
            font-size: 30px;
            margin: 0 60px;

        }

        .cart {
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }

        @media (min-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table .table {
            background-color: #fff;
        }

        .media {
            display: flex;
            align-items: center;
        }

        .media-body {
            flex: 1;
        }

        .align-self-center {
            align-self: center;
        }

        .align-middle {
            vertical-align: middle !important;
        }
    </style>




@endsection
