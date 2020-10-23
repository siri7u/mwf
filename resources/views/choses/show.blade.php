@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary" href="/emplacements/{{ $show->id }}/edit">edit</a>
                <h1>Nom : {{ $show->name }}</h1>
                <h1>Description : {{ $show->description }}</h1>
            </div>
        </div>
    </div>
@endsection
