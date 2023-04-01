@extends('home.part.main')
@section('container')
    <div class="row justify-content-center mb-3" style="margin-top: 90px">
        <div class="card text-bg-dark">
            <img src="https://source.unsplash.com/1400x500?library+dark" alt="..." style="width:100%; height:auto;">
            <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-2" style="background-color: rgba(0, 0, 0, 0.7)">
                    <p class="mb-0"style="font-size: medium">Welcome to</p>
                    <p class="mb-0" style="font-size:xx-large">The On<span style="color:rgb(183, 141, 230)">Learn </span>
                        Blog</p>
                </h5>
            </div>
        </div>
    </div>
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/articles" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($articles->count())
        <div class="container">
            <div class="row">
                @php
                    $x = 0;
                @endphp
                @foreach ($articles as $article)
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
                                    href="/articles?category={{ $article->category->slug }}"
                                    style="text-decoration: none; color:white"><b>{{ $article->category->name }}</b>
                                </a>
                            </div>
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="..."
                                    style="margin: 10px; border-radius: 20px; border: 2px solid black">
                            @else
                                <img src="https://source.unsplash.com/500x300?{{ $article->category->name }}"
                                    class="img-fluid" alt="..."
                                    style="margin: 10px; border-radius: 20px; border: 2px solid black">
                            @endif
                            <div class="card-body">
                                <small>{{ $article->updated_at }}</small>
                                <a href="/articles/{{ $article->slug }}" class="text-decoration-none">
                                    <h5 style="color:black"><b>{{ $article->title }}</b></h5>
                                </a>
                                <p>
                                    <small>By.
                                        <a href="/articles?author={{ $article->author->username }}"
                                            class="text-decoration-none"
                                            style="color: black"><b>{{ $article->author->name }}</b></a>
                                        {{ $article->updated_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p>{{ $article->synopsis }}</p>
                                <a href="/articles/{{ $article->slug }}" class="btn"
                                    style="background-color: rgb(183, 141, 230)"><b>Read more...</b></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No article found.</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
@endsection
