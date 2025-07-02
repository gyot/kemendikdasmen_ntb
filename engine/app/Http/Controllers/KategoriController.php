<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\KategoriArtikel;
use App\Models\KategoriBerita;
use App\Models\KategoriBuletin;
use App\Models\KategoriJurnal;
use App\Models\KategoriKliping;
use App\Models\KategoriPengumuman;
use App\Models\KategoriSejarah;
use App\Models\KategoriStructur;
use App\Models\KategoriUnduhan;
use App\Models\KategoriVisiMisi;
use App\Models\KategoriZiwbk;
use App\Models\KategoriProfil;
use Illuminate\Support\Facades\Storage;
use App\Models\HelperData; // Pastikan HelperData sudah ada

class KategoriController extends Controller
{
    // Tampilkan daftar kategori
    protected function getModelKategori($jenis)
    {
        return match ($jenis) {
            'artikel' => new KategoriArtikel,
            'berita' => new KategoriBerita,
            'buletin' => new KategoriBuletin,
            'jurnal' => new KategoriJurnal,
            'kliping' => new KategoriKliping,
            'pengumuman' => new KategoriPengumuman,
            // 'psrp' => new KategoriPsrp,
            'sejarah' => new KategoriSejarah,
            'structur' => new KategoriStructur,
            'unduhan' => new KategoriUnduhan,
            'visi_misi' => new KategoriVisiMisi,
            'ziwbk' => new KategoriZiwbk,
            'profil' => new KategoriProfil,

            default => abort(404)
        };
    }
    public function index($jenis)
    {
        $model = $this->getModelKategori($jenis);
        $kategori = $model->latest()->paginate(20);
        return view('admin.konten.kategori.index', compact(['kategori', 'jenis']));
    }

    // Tampilkan form tambah kategori
    public function create($jenis)
    {
        return view('admin.konten.kategori.create', compact(['jenis']));
    }

    // Simpan kategori baru
    public function store(Request $request, $jenis)
    {
        $model = $this->getModelKategori($jenis);
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:1,2', // sesuaikan status dari HelperData
        ]);

        $data = [
            'title' => $request->title,
            'status' => $request->status,
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('kategori', 'public');
        }

        $model->create($data);

        return redirect()->route('kategori.index',['jenis'=>$jenis])->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($jenis, $id)
    {
        $model = $this->getModelKategori($jenis);
        $kategori = $model->findOrFail($id);
        return view('admin.konten.kategori.edit', compact(['id', 'kategori', 'jenis']));
    }

    // Simpan perubahan
    public function update(Request $request, $jenis, $id )
    {
        $model = $this->getModelKategori($jenis);
        $kategori = $model->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:1,2',
        ]);

        $data = [
            'title' => $request->title,
            'status' => $request->status,
        ];

        if ($request->hasFile('thumbnail')) {
            // Hapus file lama jika ada
            if ($kategori->thumbnail) {
                Storage::disk('public')->delete($kategori->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('kategori', 'public');
        }

        $kategori->update($data);

        return redirect()->route('kategori.index',['jenis'=>$jenis])->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy($jenis,$id)
    {
        $model = $this->getModelKategori($jenis);
        $kategori = $model->findOrFail($id);
        if ($kategori->thumbnail) {
            Storage::disk('public')->delete($kategori->thumbnail);
        }
        $kategori->delete();

        return redirect()->route('kategori.index',['jenis'=>$jenis])->with('success', 'Kategori berhasil dihapus.');
    }

    // Tampilkan detail kategori (jika dibutuhkan)
    public function show($jenis,$id)
    {
        $model = $this->getModelKategori($jenis);
        $kategori = $model->findOrFail($id);
        return view('admin.konten.kategori.show', compact(['kategori', 'jenis']));
    }
}
