<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $res = \App\Models\Notes::latest()->take(15)->get();
        return view('notes.index', compact('res'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text'=> 'required',
        ]);
        $note = new \App\Models\Notes();
        $note->text = $request->text;
        $note->save();
        return redirect('/notes/'.$note->id);

    }

    public function edit($id)
    {
        $note = \App\Models\Notes::find($id);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = \App\Models\Notes::find($id);
        $note->text = $request->text;
        $note->save();
        return redirect('/notes/'.$id);
    }




    public function show($id)
    {
        return view('notes.show', ['note' => \App\Models\Notes::findOrFail($id)]);
    }

    public function ajaxSearch(Request $request)
    {
        return response()->json(\App\Models\Notes::search($request->input("search")));
    }
}
