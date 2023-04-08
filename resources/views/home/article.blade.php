@extends('home.part.main')
@section('container')
    <div class="container mb-5" style="margin-top: 80px" style="font-family: 'poppins'">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-1"><b>{{ $article->title }}</b></h1>
                <p>By <a href="/articles?author={{ $article->author->username }}" class="text-decoration-none"
                        style="color: black"><b>{{ $article->author->name }}</b></a> in <a
                        href="/articles?category={{ $article->category->slug }}" class="text-decoration-none"
                        style="color:black"><b>{{ $article->category->name }} - </b></a>
                    <small>
                        @if ($article->updated_at->isToday() && $article->updated_at->format('H') < 12)
                            Today, {{ $article->updated_at->format('h:i A') }}
                        @else
                            {{ $article->updated_at->format('l, d-m-Y h:i A') }}
                        @endif
                    </small>
                </p>
                @if ($article->image)
                    <div style="max-height:400px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x600?{{ $article->category->name }}" class="img-fluid"
                        alt="...">
                @endif


                <article class="my-3" style="text-indent: 1em;">
                    {!! $article->body !!}
                    {{-- Untuk menjalankan tag html --}}
                </article>
                <br>
                {{-- <a href="/articles" class="d-block mt-3">Back</a> --}}
                <a href="/articles" class="btn btn-dark" style="background-color: rgb(183, 141, 230); color:black"><b><i
                            class="bi bi-arrow-bar-left" style="font-weight: bold;"></i> Back to Articles</b></a>
            </div>
        </div>
    </div>
    <hr style="border-width: 3px; border-color:gray">
    <div class="container mb-4">
        <span style="display:block; text-align: center; color:darkgray">
            All Rights Reserved @ Copyright, OnLearn Blog
        </span>
    </div>
@endsection
