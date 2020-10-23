@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/emplacements">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <h6>Créer un nouvel emplacement pour vos choses : </h6>
                        <br>
                        <input type="text" class="form-control" name="name" placeholder="Nom"></input>
                        <br>
                        <input type="text" class="form-control" name="description" placeholder="Description"></input>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
