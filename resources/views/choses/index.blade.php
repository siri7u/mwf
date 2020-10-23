
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="input-group">
                    <a class="btn btn-primary" href="/choses/create">Add new chose</a>
                </div>
            </div>
        </div>
        <br><br>
        @foreach ( $emplacements as $emplacement)
            <br>
            <div class="card">
                <div class="card-header">
                    <h3>{{ $emplacement->name }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th></th>
                        </tr>
                        </thead>

                        @foreach($emplacement->choses as $chose)
                            <tr class="table-row" data-href="/choses/{{ $chose->id }}">
                                <td>{{ $chose->name }}</td>
                                <td> {{ $chose->description }}</td>
                                <td style="text-align: center"> @method('DELETE')
                                    <form action="/choses/{{ $chose->id }}" method="POST">
                                        <a class="btn btn-info" href="/choses/{{ $chose->id }}">Show</a>
                                        <a class="btn btn-primary" href="/choses/{{ $chose->id }}/edit">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

    <style>
        .table-row{
            cursor:pointer;
        }
    </style>
@endsection
