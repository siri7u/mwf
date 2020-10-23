@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="/emplacements/{{ $show->id }}/edit">edit</a>
            </div>
            <div class="card-body">
                <br>
                <h1>Nom : {{ $show->name }}</h1>
                <h1>Description : {{ $show->description }}</h1>
            </div>
            <div class="card-header">
                <h3>Elle contient ces objets suivants : </h3>
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
                    @foreach($show->choses as $chose)
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
                </table>
            </div>
        </div>
    </div>
@endsection
