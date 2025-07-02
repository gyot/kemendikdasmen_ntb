<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditorContent;

class EditorContentController extends Controller
{
    public function saveContent(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $content = $request->input('content');

        $editorContent = EditorContent::create([
            'content' => $content,
        ]);

        return response()->json([
            'message' => 'Konten berhasil disimpan',
            'data' => $editorContent,
        ]);
    
    }

    public function getContent()
    {
        $content = EditorContent::latest()->first();

        if (!$content) {
            return response()->json([
                'message' => 'Tidak ada konten yang ditemukan',
            ], 404);
        }

        return view('welcome', compact('content'));
    }

}
