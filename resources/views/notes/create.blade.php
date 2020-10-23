@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/notes">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <div id="editor_container">
                            <textarea id="editable" type="text" class="form-control" name="text"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            state = false;
            id = "editable";
            md ='';
            var simplemde = new EasyMDE({
                element: $("textarea#" + id)[0],
                initialValue: md,
            });
            html = simplemde.options.previewRender(md);
        });
    </script>
@endsection
