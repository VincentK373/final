@extends('home.part.main')
@section('container')
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-1"><b>{{ $article->title }}</b></h1>
                <p>By <a href="/articles?author={{ $article->author->username }}" class="text-decoration-none"
                        style="color: black"><b>{{ $article->author->name }}</b></a> in <a
                        href="/articles?category={{ $article->category->slug }}" class="text-decoration-none"
                        style="color:black"><b>{{ $article->category->name }}</b></a>
                    <small>{{ $article->updated_at->diffForHumans() }}</small>

                </p>
                <p>
                    <small>{{ $article->updated_at }}</small>
                </p>


                @if ($article->image)
                    <div style="max-height:400px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x600?{{ $article->category->name }}" class="img-fluid"
                        alt="...">
                @endif


                <article class="my-3">
                    {!! $article->body !!}
                    {{-- Untuk menjalankan tag html --}}
                </article>

                {{-- <a href="/articles" class="d-block mt-3">Back</a> --}}
                <a href="/articles" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> Back to My Articles</a>
            </div>
        </div>
    </div>
@endsection
