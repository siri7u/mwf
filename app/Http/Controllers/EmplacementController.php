<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmplacementController extends Controller
{
    public function index()
    {
        $index = \App\Models\Emplacement::All();
        return view('emplacements.index', compact('index'));
    }

    public function create()
    {
        return view('emplacements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
        ]);
        $em = new \App\Models\Emplacement();
        $em->name = $request->name;
        $em->description = $request->description;
        $em->save();
        return redirect('/emplacements');
    }

    public function show($id)
    {
        $show = \App\Models\Emplacement::findOrFail($id);
        return view('emplacements.show',compact('show'));
    }


    public function edit($id)
    {
        $edit = \App\Models\Emplacement::find($id);
        return view('emplacements.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = \App\Models\Emplacement::find($id);
        $update->description = $request->description;
        $update->name = $request->name;
        $update->save();
        return redirect('/emplacements/'.$id);
    }

    public function destroy($id)
    {
        $destroy = \App\Models\Emplacement::find($id)->forceDelete();
        return redirect('/emplacements');
    }
}
