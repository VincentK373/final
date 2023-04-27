@extends('dashboard.part.main')
@section('container')
    <div class="container" style="margin-top: 90px">
        <div class="row my-3" style="justify-content: center">
            <div class="col-md-8">
                <a href="/dashboard" class="btn btn-success"><i class="bi bi-arrow-bar-left" style="font-weight: bold;"></i>Back
                    to Manage Products</a>
                <a href="/dashboard/{{ $product->slug }}/edit" class="btn btn-warning" style="color:white"><i
                        class="bi bi-pencil-square"></i>Edit</a>
                <form action="/dashboard/{{ $product->slug }}" method="POST" class="d-inline"
                    onclick="return confirm('Sure?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"><i class="bi bi-trash3"></i>Delete</button>
                </form>
                <br>
                <br>
                <h6>Last Update: <small>
                        {{ $product->updated_at->format('l, d-m-Y h:i A') }}
                    </small></h6>


                @if ($product->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mt-3" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $product->name }}" class="img-fluid mt-3"
                        alt="...">
                @endif

                <article class="my-3" style="text-indent: 1em;">
                    <h3>{{ $product->name }}</h3>
                    <aside>
                        <details>
                            <summary style="font-weight: bold">
                                Description
                            </summary>
                            <article style="text-indent: 3em">
                                {!! $product->des !!}
                                <br>
                            </article>
                        </details>
                    </aside>
                    <aside>
                        <details>
                            <summary style="font-weight: bold">
                                Category
                            </summary>
                            <p>
                                {{ $product->category->name }}
                            </p>
                        </details>
                    </aside>
                    <aside>
                        <details>
                            <summary style="font-weight: bold">
                                Price
                            </summary>
                            <p>
                                Rp{{ number_format($product->price, 2, ',', '.') }}
                            </p>
                        </details>
                    </aside>
                    <aside>
                        <details>
                            <summary style="font-weight: bold">
                                Quantity
                            </summary>
                            <p>
                                {{ $product->quantity }}
                            </p>
                        </details>
                    </aside>

                </article>

            </div>
        </div>
    </div>
    <style>
        p {
            text-indent: 3em
        }
    </style>
@endsection
