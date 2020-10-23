<?php

namespace App\Http\Controllers;

use App\Models\Chose;
use Illuminate\Http\Request;

class ChoseController extends Controller
{
    public function index()
    {
        $emplacements = \App\Models\Emplacement::with('choses')->get();
        return view('choses.index', compact('emplacements'));
    }

    public function create()
    {
        $emplacements = \App\Models\Emplacement::All();
        return view('choses.create', compact('emplacements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
        ]);
        $chose = new \App\Models\Chose();
        $chose->name = $request->name;
        $chose->description = $request->description;
        $chose->emplacement_id = intval($request->emplacement_id);
        $chose->save();
        return redirect('/choses');
    }

    public function show($id)
    {
        $show = \App\Models\Chose::findOrFail($id);
        return view('choses.show',compact('show'));
    }

    public function edit($id)
    {
        $edit = \App\Models\Chose::find($id);
        return view('choses.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = \App\Models\Chose::find($id);
        $update->name = $request->name;
        $update->description = $request->description;
        $update->emplacement_id = intval($request->emplacement_id);
        $update->save();
        return redirect('/choses/'.$id);
    }

    public function destroy($id)
    {
        $destroy = \App\Models\Chose::find($id)->forceDelete();
        return redirect('/choses');
    }
}
