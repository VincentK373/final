@extends('dashboard.part.main')
@section('container')
    <div class="kotak2">
        <div class="kiri">
            @include('dashboard.part.sidebar')
        </div>
        <div class="kanan">
            <h1><b>My Profile</b></h1>
            <div class="scroll mb-2" style="
            max-height: 280px;
            overflow: auto;">

                <table>
                    <tr>
                        <th>Name</th>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $phone }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($status === null)
                                Member
                            @else
                                Admin
                            @endif
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <style>
            .kanan {
                float: right;
                width: 70%;
                max-height: 400px;
                padding-right: 50px;
                margin-top: 0px;
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
                width: 70%;
            }

            th {
                text-align: center;
                background-color: rgb(144, 68, 199);
                font-weight: bold;
                width: 30%;
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
