@extends('home.part.main')
@section('container')
    <h1 style="margin-top: 80px">Categories</h1>
    <br>
    <div class="container">
        <div class="row">
            @php
                $x = 0;
            @endphp
            @foreach ($categories as $category)
                @if ($x % 3 == 0)
                    <div class="col-md-12 mb-0">
                        <hr style="border-width:2px; border-color:black">
                    </div>
                @endif
                @php
                    $x++;
                @endphp
                <div class="col-md-4 mb-1">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card text-bg-dark" style="box-shadow: 0 0 10px rgba(0,0,0,1.1);">
                            <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img"
                                alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4"
                                    style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                                <p class="card-text">
                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>

    </div>
    <br><br>
@endsection
