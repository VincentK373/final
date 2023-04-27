@extends('home.part.main')
@section('container')
    <div class="container2" style="font-family: 'poppins'">
        <div class="row justify-content-center mb-3" style="margin-top: 60px">
            <div class="card text-bg-dark" style="width: 100%">
                <img src="https://source.unsplash.com/1400x500?storage" alt="..." style="width:100%; height:auto;">
                <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title text-center flex-fill p-2" style="background-color: rgba(0, 0, 0, 0.7)">
                        <p class="mb-0"style="font-size: medium">Welcome to</p>
                        <b style="color: rgb(0, 104, 71)">Me</b><b>xi</b><b style="color: rgb(206, 17, 38)">co</b>
                        <b>Storage | </b></p>
                    </h5>
                </div>
            </div>
        </div>
        <h1 class="mb-3 text-center"><b>{{ $title }}</b></h1>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/products" method="GET">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($products->count())
            <div class="container">
                <div class="row">
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($products as $product)
                        @if ($x % 3 == 0)
                            <div class="col-md-12 mb-0">
                                <hr style="border-width:2px; border-color:black">
                            </div>
                        @endif
                        @php
                            $x++;
                        @endphp
                        <div class="col-md-4 mb-2">
                            <div class="card" style="border-radius: 20px; box-shadow: 0 0 10px rgba(0,0,0,1.1);">
                                <div class="position-absolute bg-dark px-3 py-10 text-white"
                                    style="background-color: rgba(0,0,0,0.7); border-radius: 20px; margin:10px"><a
                                        href="/products?category={{ $product->category->slug }}"
                                        style="text-decoration: none; color:white"><b>{{ $product->category->name }}</b>
                                    </a>
                                </div>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid"
                                        style="max-height: 300px; overflow:
                                    hidden alt="..."
                                        style="margin: 10px; border-radius: 20px; border: 2px solid black">
                                @else
                                    <img src="https://source.unsplash.com/500x300?{{ $product->name }}" class="img-fluid"
                                        alt="..." style="margin: 10px; border-radius: 20px; border: 2px solid black">
                                @endif
                                <div class="card-body">
                                    <small style="font-size:medium"> Last Update:
                                        @if ($product->updated_at->isToday() && $product->updated_at->format('H') < 12)
                                            Today, {{ $product->updated_at->format('h:i A') }}
                                        @else
                                            {{ $product->updated_at->format('l, d-m-Y h:i A') }}
                                        @endif
                                    </small>
                                    <br>
                                    <small>
                                        <span style="float: right">
                                            {{ $product->updated_at->diffForHumans() }}</span>
                                    </small>
                                    <br>
                                    <p>
                                    <h5
                                        style="color:black; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: auto; text-overflow: ellipsis; margin-bottom: 0.5rem; height: 1.3em">
                                        <b>{{ $product->name }}</b>
                                    </h5>
                                    </p>
                                    <fieldset>
                                        <legend>
                                            Description:
                                        </legend>
                                        <article
                                            style="color:black, -webkit-line-clamp: 5; 
                                        -webkit-box-orient: vertical; 
                                        overflow: auto; 
                                        text-overflow: ellipsis; 
                                        margin-bottom: 0.5rem; height: 7.5em">
                                            {!! $product->des !!}
                                        </article>
                                    </fieldset>
                                    <h6 style="font-weight: bold">Price:</h6>
                                    <p>
                                        &nbsp;&nbsp;&nbsp;Rp{{ number_format($product->price, 2, ',', '.') }}
                                    </p>
                                    <h6 style="font-weight: bold">Quantity:</h6>
                                    <p>
                                        &nbsp;&nbsp;&nbsp;{{ $product->quantity }}
                                    </p>
                                    <a href="#" class="btn btn-dark"
                                        style="background-color: rgb(183, 141, 230); color:black"><b>Add</b></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        @else
            <p class="text-center fs-4">No Products Found.</p>
        @endif


        <div class="d-flex justify-content-center mt-5 pagination">
            {{ $products->links() }}
        </div>

        <style>
            .pagination li:hover a {
                background-color: rgb(125, 161, 161);
                color: #fff;
            }

            .pagination {
                display: flex;
                justify-content: center;
            }

            .page-link {
                background-color: rgb(217, 217, 217);
                border-radius: 50px;
                color: black;
                font-weight: bold;
            }

            .pagination>.page-item.active>.page-link {
                background-color: black;
                color: rgb(217, 217, 217);
                border: none;
            }

            .pagination li {
                margin-right: 10px;
                text-align: center;
            }

            .pagination li.disabled <style>.pagination li:hover a {
                background-color: rgb(125, 161, 161);
                /* Menambahkan warna merah pada background saat elemen di-hover */
                color: #fff;
            }

            .pagination {
                display: flex;
                justify-content: center;
            }

            .page-link {
                background-color: rgb(217, 217, 217);
                border-radius: 50px;
                color: black;
                font-weight: bold
            }

            /* span.page-link {
                                                                                                                                                                                                                                                                                                                                                            background-color: red;
                                                                                                                                                                                                                                                                                                                                                            color: black
                                                                                                                                                                                                                                                                                                                                                        } */

            .pagination>.page-item.active>.page-link {
                background-color: black;
                color: rgb(217, 217, 217);
                border: none
            }


            .pagination li {
                margin-right: 10px;
                text-align: center;
            }

            fieldset {
                display: block;
                margin-inline-start: 2px;
                margin-inline-end: 2px;
                padding-block-start: 0.35em;
                padding-inline-start: 0.75em;
                padding-inline-end: 0.75em;
                padding-block-end: 0.625em;
                min-inline-size: min-content;
                border-width: 2px;
                border-style: groove;
                border-color: gray;
                border-image: initial;
                padding-bottom: 0;
                margin-bottom: 0.35em
            }

            legend {
                font-size: medium;
                font-weight: bold;
                display: block;
                padding-inline-start: 2px;
                padding-inline-end: 2px;
                border-width: initial;
                border-style: none;
                border-color: initial;
                border-image: initial;
                margin-bottom: 0
            }
        </style>


        <hr style="border-width: 3px; border-color:gray">
        <div class="container mb-4">
            <span style="display:block; text-align: center; color:darkgray">
                All Rights Reserved @ Copyright, Mexico Storage
            </span>
        </div>

    @endsection
