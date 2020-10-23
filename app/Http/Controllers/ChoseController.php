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
        return redirect('/chose');
    }

    public function show(Chose $chose)
    {
        //
    }

    public function edit(Chose $chose)
    {
        //
    }

    public function update(Request $request, Chose $chose)
    {
        //
    }

    public function destroy(Chose $chose)
    {
        //
    }
}
