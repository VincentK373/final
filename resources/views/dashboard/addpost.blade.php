@extends('dashboard.part.main')
@section('container')
    <div class="kotak2">
        <div class="kiri">
            @include('dashboard.part.sidebar')
        </div>
        <div class="kanan">
            <h1><b>Add Post</b></h1>
            <div class="form col-lg-12">
                <form method="POST" action="/dashboard" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid
                        @enderror"
                            type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="body"
                            style="max-height: 120px; overflow:auto; min-height:120px; background-color:white">
                        </trix-editor>
                    </div>

                    <button type="submit" class="btn btn-primary"
                        style="border-radius: 10px; width:100px; background-color:rgb(167, 78, 173); color:black; border:0cm">Add
                        Post</button>
                </form>
            </div>
            <script>
                const title = document.querySelector('#title');
                const slug = document.querySelector('#slug');

                title.addEventListener('change', function() {
                    fetch('/dashboard/checkslug?title=' + title.value)
                        .then(response => response.json())
                        .then(data => slug.value = data.slug)
                });
                document.addEventListener('trix-file-accept', function(e) {
                    e.preventDefault();
                })

                function previewImage() {

                    const image = document.querySelector('#image');
                    const preview = document.querySelector('.img-preview');
                    preview.style.display = 'block';
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);
                    oFReader.onload = function(oFREvent) {
                        preview.src = oFREvent.target.result;
                    }
                }
            </script>
        </div>

        <style>
            .kanan {
                float: right;
                width: 70%;
                padding-right: 50px;
                margin-top: 0px;
            }

            .form {
                max-height: 590px;

                overflow: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                border: 1px solid white;
            }

            th,
            td {
                padding: 8px;
                border: 1px solid white;
            }

            td {
                background-color: rgb(232, 204, 245);
            }

            th {
                text-align: center;
                background-color: rgb(144, 68, 199);
                font-weight: bold;
                color: white
            }

            .kiri {
                background-color: red;
                float: left;
                margin-right: 30px;
            }

            .kotak2 {
                width: 1150px;
                height: 700px;
                background-color: rgb(232, 204, 245);
                margin-top: 130px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 40px;
                padding-top: 50px;
                padding-left: 50px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            }
        </style>
    @endsection
