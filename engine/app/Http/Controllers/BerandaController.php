<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Berita;
use App\Models\Artikel;
use App\Models\KategoriBerita;
use App\Models\KategoriArtikel;
use App\Models\Pengumuman;
use App\Models\KategoriPengumuman;
use App\Models\Profil;
use App\Models\ExternalLink;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $sliders = Sliders::where('status', 'active')->orderBy('order')->get()->take(3);
        $artikel = Artikel::with('Kategori')
        ->where('status', 1)
        ->latest('tanggal')
        ->take(10)
        ->get();

    $berita = Berita::with('Kategori')
        ->where('status', 1)
        ->latest('tanggal')
        ->take(10)
        ->get();

    // Gabungkan dan ambil 6 konten terbaru dari artikel/berita
    $lastPost = $berita->concat($artikel)
        ->sortByDesc('tanggal')
        ->take(6);

    $externalLinks = ExternalLink::where('status', 1)->get();
        return view('home', compact('sliders', 'berita', 'artikel', 'lastPost', 'externalLinks'));
    }
    public function dashboard()
    {
        return view('dashboard');       
    }
}
