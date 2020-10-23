@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/emplacements/{{ $edit->id }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <h6>Editer</h6>
                        <br>
                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" placeholder="Name">
                        <br>
                        <input type="text" name="description" value="{{ $edit->description }}" class="form-control" placeholder="Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
