@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="/choses/{{ $show->id }}/edit">edit</a>
            </div>
            <div class="card-body">
                <h1>Nom : {{ $show->name }}</h1>
                <h1>Description : {{ $show->description }}</h1>
            </div>
        </div>
    </div>
@endsection
