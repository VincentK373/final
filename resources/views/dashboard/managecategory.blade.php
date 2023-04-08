@extends('dashboard.part.main')
@section('container')
    <div class="kotak2">
        <div class="kiri">
            @include('dashboard.part.sidebar')
        </div>
        <div class="kanan">
            <h1><b>Manage Categories</b></h1>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table" style="max-height: 250px; overflow:auto; margin-bottom:10px">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th style="width: 50%;">Category</th>
                        </tr>
                    </thead>
                    <tbody style="justify-content: center">
                        @foreach ($categories as $category)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h2>
                    Create Category
                </h2>


            </div>


            <div class="clear"></div>
        </div>

        <style>
            .kanan {
                float: right;
                width: 70%;
                max-height: 400px;
                padding-right: 50px;
                margin-top: 0px;
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
                height: 450px;
                background-color: white;
                margin-top: 130px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 40px;
                padding-top: 50px;
                padding-left: 50px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }
        </style>
    @endsection
