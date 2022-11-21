<?php

namespace App\Http\Controllers;

use App\Models\Hymn;
use Smalot\PdfParser\Parser;
use Illuminate\Http\Request;

class HymnController extends Controller
{
    public function index()
    {
        $hymns = Hymn::orderBy('hymn_no', 'asc')->get();
        return view('admin.hymns.index', compact('hymns'));
    }

    public function create()
    {
        $hymn = new Hymn;
        return view('admin.hymns.form', compact('hymn'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hymn_no' => 'required',
            'body' => 'required',
        ]);
        Hymn::create($request->all());
        return back()->with('success', $request->hymn_no . ' added successfully!');
    }

    public function edit(Hymn $hymn)
    {
        return view('admin.hymns.form', compact('hymn'));
    }

    public function update(Hymn $hymn, Request $request)
    {
        $request->validate([
            'hymn_no' => 'required',
            'body' => 'required',
        ]);
        $hymn->update($request->all());
        return back()->with('success', $request->hymn_no . ' updated successfully!');
    }

    public function destroy(Hymn $hymn)
    {
        $hymn->delete();
        session()->flash('success', 'Hymn deleted successfully!');
        return apiSuccess([], 'Hymn deleted successfully');
    }
}
