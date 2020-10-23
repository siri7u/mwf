
@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="/notes/{{ $note['id'] }}/edit">edit</a>
        <div id="editor_container" style="display: none;">
            <textarea id="editable"></textarea>
        </div>
        <div class="jumbotron" id="html_container"></div>
    </div>
    <script>
        $(document).ready(function() {
            state = false;
            id = "editable";
            md = `{{ $note["text"] }}`;
            var simplemde = new EasyMDE({
                element: $("textarea#" + id)[0],
                initialValue: md,
            });
            html = simplemde.options.previewRender(md);
            $('#html_container').wrapInner(html);

            $("button").click(function() {
                if (state) {
                    $("div#editor_container").css('display', 'none');
                    // Show markdown rendered by CodeMirror
                    $('#html_container').wrapInner(simplemde.options.previewRender(simplemde.value()));
                } else {
                    // Show editor
                    $("div#editor_container").css('display', 'inline');
                    // Do a refresh to show the editor value
                    simplemde.codemirror.refresh();
                    $('#html_container').empty();
                };
                state = !state;
            });
        });
    </script>

@endsection
