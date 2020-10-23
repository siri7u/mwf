@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/choses">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <h6>Créer une nouvelle chose</h6> <br>
                        <input type="text" class="form-control" name="name" placeholder="Nom"> <br>
                        <input type="text" class="form-control" name="description" placeholder="Description"><br>
                        <select class="custom-select mr-sm-2" name="emplacement_id" id="">
                            @foreach($emplacements as $emplacement)
                                <option value="{{ $emplacement->id }}">{{ $emplacement->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
