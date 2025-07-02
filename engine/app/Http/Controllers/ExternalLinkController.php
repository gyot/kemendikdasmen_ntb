<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExternalLink; // Assuming you have a model for ExternalLink

class ExternalLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = ExternalLink::where('status', 1)->latest()->paginate(5);
        return view('admin.externallink.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.externallink.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'link' => 'required|url',
            'images' => 'required|string', // ini adalah nama ikon FA, contoh: 'fas fa-book'
            'status' => 'required|in:0,1',
        ]);

        ExternalLink::create($request->all());

        return redirect()->route('eksternallink.index')->with('success', 'Link berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = ExternalLink::findOrFail($id);
        return view('admin.externallink.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required|url',
            'images' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $item = ExternalLink::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('eksternallink.index')->with('success', 'Link berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ExternalLink::findOrFail($id);
        $item->delete();

        return redirect()->route('eksternallink.index')->with('success', 'Link berhasil dihapus!');
    }
}
