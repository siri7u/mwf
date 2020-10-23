
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="input-group">
                    <a class="btn btn-primary" href="/emplacements/create">Add new emplacement</a>
                </div>
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
                    <tbody>
                    @foreach ( $index as $emplacement)
                        <tr class="table-row" data-href="/emplacements/{{ $emplacement->id }}">
                            <td>{{ $emplacement->name }}</td>
                            <td> {{ $emplacement->description }}</td>
                            <td style="text-align: center"> @method('DELETE')
                                <form action="/emplacements/{{ $emplacement->id }}" method="POST">
                                    <a class="btn btn-info" href="/emplacements/{{ $emplacement->id }}">Show</a>
                                    <a class="btn btn-primary" href="/emplacements/{{ $emplacement->id }}/edit">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
