@extends('dashboard.part.main')
@section('container')
    <div class="container" style="margin-top: 90px">
        <div class="row my-3" style="justify-content: center">
            <div class="col-md-8">
                <h1>{{ $article->title }}</h1>
                <small>
                    {{ $article->updated_at->format('l, d-m-Y h:i A') }}
                </small>
                <br>
                <br>
                <a href="/dashboard" class="btn btn-success"><i class="bi bi-arrow-bar-left" style="font-weight: bold;"></i>Back
                    to Manage Posts</a>
                <a href="/dashboard/{{ $article->slug }}/edit" class="btn btn-warning" style="color:white"><i
                        class="bi bi-pencil-square"></i>Edit</a>
                <form action="/dashboard/{{ $article->slug }}" method="POST" class="d-inline"
                    onclick="return confirm('Sure?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"><i class="bi bi-trash3"></i>Delete</button>
                </form>

                @if ($article->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mt-3" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" class="img-fluid mt-3"
                        alt="...">
                @endif

                <article class="my-3" style="text-indent: 1em;">
                    {!! $article->body !!}
                    {{-- Untuk menjalankan tag html --}}
                </article>

            </div>
        </div>
    </div>
@endsection
