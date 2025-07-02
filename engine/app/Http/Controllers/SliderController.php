<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Sliders::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);
        $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/sliders'), $filename);
            $data['image'] = $filename;

        $order = Sliders::max('order') + 1;

        Sliders::create([
            'title' => $request->title,
            'image' => $filename,
            'link' => $request->link,
            'description' => $request->description,
            'order' => $order,
            'status' => $request->status
        ]);

        return back()->with('success', 'Slider berhasil ditambahkan.');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            Sliders::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        $slider = Sliders::findOrFail($id);
        if (Storage::exists('public/upload/sliders/' . $slider->image)) {
            Storage::delete('public/upload/sliders/' . $slider->image);
        }
        $slider->delete();
        return back()->with('success', 'Slider berhasil dihapus.');
    }
    public function edit($id)
    {
        $sliders = Sliders::findOrFail($id);
        $slider = Sliders::all()->sortBy('order');
        return view('admin.sliders.edit', compact(['sliders', 'slider']));
    }
    public function update(Request $request, $id)
    {
        $slider = Sliders::findOrFail($id);
        $request->validate([
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/upload/sliders/' . $slider->image)) {
                Storage::delete('public/upload/sliders/' . $slider->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/sliders'), $filename);
            $slider->image = $filename;
        }

        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->save();

        return back()->with('success', 'Slider berhasil diperbarui.');
    }
    public function show($id)
    {
        $slider = Sliders::findOrFail($id);
        return view('admin.sliders.show', compact('slider'));
    }
}
