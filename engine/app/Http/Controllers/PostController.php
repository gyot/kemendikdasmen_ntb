<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Buletin;
use App\Models\EditorContent;
use App\Models\ExternalLink;
use App\Models\GaleriVideo;
use App\Models\Galeri;
use App\Models\Gambar;
use App\Models\HelperData;
use App\Models\Jurnal;
use App\Models\Jurnallr;
use App\Models\KategoriArtikel;
use App\Models\KategoriBerita;
use App\Models\KategoriGaleri;
use App\Models\KategoriBuletin;
use App\Models\KategoriJurnal;
use App\Models\KategoriKliping;
use App\Models\KategoriPengumuman;
use App\Models\KategoriPsrp;
use App\Models\KategoriSejarah;
use App\Models\KategoriStructur;
use App\Models\KategoriUnduhan;
use App\Models\KategoriVisiMisi;
use App\Models\KategoriWbk;
use App\Models\KategoriZiwbk;
use App\Models\Kegiatan;
use App\Models\Kliping;
use App\Models\Link;
use App\Models\LoginAgenda;
use App\Models\Pengumuman;
use App\Models\Profil;
use App\Models\KategoriProfil;
use App\Models\Psrp;
use App\Models\Sarpras;
use App\Models\Sejarah;
use App\Models\Seksi;
use App\Models\Sertifikat;
use App\Models\Sertikum;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\Structur;
use App\Models\TugasPokok;
use App\Models\Unduhan;
use App\Models\User;
use App\Models\VisiMisi;
use App\Models\Visitor;
use App\Models\Ziwbk;
use App\Models\KategoriLakin;
use App\Models\KategoriPerjanjiankinerja;
use App\Models\KategoriRenstra;
use App\Models\Resntra;
use App\Models\Lakin;
use App\Models\Perjanjiankinerja;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;


class PostController extends Controller
{
    //
    protected function getModel($jenis)
    {
        return match ($jenis) {
            'artikel' => new Artikel,
            'berita' => new Berita,
            'buletin' => new Buletin,
            'editor_content' => new EditorContent,
            'external_link' => new ExternalLink,
            'galeri_video' => new GaleriVideo,
            'galeri' => new Galeri,
            'gambar' => new Gambar,
            'helper_data' => new HelperData,
            'jurnal' => new Jurnal,
            'kegiatan' => new Kegiatan,
            'kliping' => new Kliping,
            'link' => new Link,
            'login_agenda' => new LoginAgenda,
            'pengumuman' => new Pengumuman,
            'profil' => new Profil,
            // 'psrp' => new Psrp,
            'seksi' => new Seksi,
            'sertifikat' => new Sertifikat,
            'sertikum' => new Sertikum,
            'settings' => new Settings,
            'slider' => new Slider,
            'structur' => new Structur,
            'tugas_pokok' => new TugasPokok,
            'unduhan' => new Unduhan,
            'user' => new User,
            'visi_misi' => new VisiMisi,
            'visitor' => new Visitor,
            'ziwbk' => new Ziwbk,
            'lakin' => new Lakin,
            'perjanjian_kinerja' => new Perjanjiankinerja,
            'renstra' => new Resntra,

            
            default => abort(404)
        };
    }

    protected function getModelKategori($jenis)
    {
        return match ($jenis) {
            'artikel' => new KategoriArtikel,
            'berita' => new KategoriBerita,
            'buletin' => new KategoriBuletin,
            'jurnal' => new KategoriJurnal,
            'kliping' => new KategoriKliping,
            'pengumuman' => new KategoriPengumuman,
            'galeri' => new KategoriGaleri,
            // 'psrp' => new KategoriPsrp,
            'sejarah' => new KategoriSejarah,
            'structur' => new KategoriStructur,
            'unduhan' => new KategoriUnduhan,
            'visi_misi' => new KategoriVisiMisi,
            'ziwbk' => new KategoriZiwbk,
            'profil' => new KategoriProfil,
            'lakin' => new KategoriLakin,
            'perjanjian_kinerja' => new KategoriPerjanjiankinerja,
            'renstra' => new KategoriRenstra,

            default => abort(404)
        };
    }

    public function index($jenis)
    {
        $model = $this->getModel($jenis);
        $data_all = $model->with('Kategori')->latest()->paginate(20);
        // dd($data_all);
        return view('admin.konten.index', compact('data_all', 'jenis'));
    }

    public function create($jenis)
    {
        $model = $this->getModelKategori($jenis);
        $kategori = $model->all();
        return view('admin.konten.create', compact(['jenis','kategori']));
    }

    public function store(Request $request, $jenis)
    {
        $model = $this->getModel($jenis);

        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:1,2',
            'tags' => 'required|string',
            'writer' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:2048',
            // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Data tidak valid, silakan periksa kembali.');
        }

        $data['slug'] = Str::slug($request->title);

        // Proses upload gambar jika ada
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . strtolower($file->getClientOriginalExtension());
            
            
            $ext = strtolower($file->getClientOriginalExtension());

            // Nama file random + ekstensi
            $compress = time() . '.' . $ext;
            $path = public_path('../../upload/'.$jenis.'/thm-' . $compress);

            // Inisialisasi ImageManager
            $manager = new ImageManager(new GdDriver()); // default driver 'gd'
            $image = $manager->read($file->getPathname());

            // Resize (proportional)
            $image->scale(width: 1280);

            // Simpan berdasarkan ekstensi
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $image->toJpeg(80)->save($path); // 75 = kualitas
                    break;
                case 'png':
                    $image->toPng()->save($path); // PNG lossless, gak pakai kualitas
                    break;
                case 'webp':
                    $image->toWebp(80)->save($path); // WebP bisa compress
                    break;
                default:
                    return back()->with('error', 'Format gambar tidak didukung.');
            }

            $file->move(public_path('../../upload/'.$jenis), $filename);

            $data['images'] = $filename;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . strtolower($file->getClientOriginalExtension());
            $file->move(public_path('../../upload/'.$jenis), $filename);
            $data['file'] = $filename;
        }else {
            $data['file'] = '-';
        }

        if ($request->hasFile('file_kliping')) {
            $file = $request->file('file_kliping');
            $filename = time() . '.' . strtolower($file->getClientOriginalExtension());
            $file->move(public_path('../../upload/'.$jenis), $filename);
            $data['file_kliping'] = $filename;
        }else {
            $data['file_kliping'] = '-';
        }
        

        $model->create($data);

        return redirect()->route('konten.index', $jenis)->with('success', 'Berhasil disimpan!');
    }

    public function edit($jenis, $id)
    {
        $model = $this->getModel($jenis);
        $data = $model->findOrFail($id);
        return view('admin.konten.edit', compact(['data', 'jenis', 'id']));
    }

    public function update(Request $request, $jenis, $id)
    {
        $model = $this->getModel($jenis);
        $data = $model->findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . strtolower($file->getClientOriginalExtension());
            $ext = strtolower($file->getClientOriginalExtension());

            // Nama file random + ekstensi
            $compress = time() . '.' . $ext;
            $path = public_path('../../upload/'.$jenis.'/thm-' . $compress);

            // Inisialisasi ImageManager
            $manager = new ImageManager(new GdDriver()); // default driver 'gd'
            $image = $manager->read($file->getPathname());

            // Resize (proportional)
            $image->scale(width: 1280);

            // Simpan berdasarkan ekstensi
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $image->toJpeg(80)->save($path); // 75 = kualitas
                    break;
                case 'png':
                    $image->toPng()->save($path); // PNG lossless, gak pakai kualitas
                    break;
                case 'webp':
                    $image->toWebp(80)->save($path); // WebP bisa compress
                    break;
                default:
                    return back()->with('error', 'Format gambar tidak didukung.');
            }
            $file->move(public_path('../../upload/'.$jenis), $filename);
            $data['images'] = $filename;
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . strtolower($file->getClientOriginalExtension());
            $file->move(public_path('../../upload/'.$jenis), $filename);
            $data['file'] = $filename;
        }
        $data->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'id_kategori' => $request->id_kategori,
            'status' => $request->status,
            'viewer' => $request->viewer,
            'tags' => $request->tags,
            'writer' => $request->writer,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('konten.index', $jenis)->with('success', 'Berhasil diperbarui!');
    }

    public function destroy($jenis, $id)
    {
        $model = $this->getModel($jenis);
        $data = $model->findOrFail($id);
        $data->delete();

        return redirect()->route('konten.index', $jenis)->with('success', 'Berhasil dihapus!');
    }

    /**
     * Upload multiple images and return their URLs.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function uploadImage(Request $request)
    {
        // Validasi file gambar maksimal 1MB
        $validator = Validator::make($request->all(), [
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:20024' // maksimal 1MB per file
        ]);

        if ($validator->fails()) {
            // Ambil error pertama dari masing-masing file
            $error = $validator->errors()->first();
            if (str_contains($error, 'may not be greater than')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ukuran gambar tidak boleh lebih dari 1MB.'
                ], 422);
            }
            return response()->json([
                'success' => false,
                'message' => $error
            ], 422);
        }

        $uploadedUrls = [];

        foreach ($request->file('image') as $file) {
            // $filename = time() . '.' . preg_replace('/\s+/', '.', strtolower($file->getClientOriginalExtension()));
            // $destinationPath = public_path('upload');
            
            // $file->move($destinationPath, $filename);

            
            $ext = strtolower($file->getClientOriginalExtension());

            // Nama file random + ekstensi
            $compress = time() . '.' . $ext;
            $path = public_path('../../upload/' . $compress);

            // Inisialisasi ImageManager
            $manager = new ImageManager(new GdDriver()); // default driver 'gd'
            $image = $manager->read($file->getPathname());

            // Resize (proportional)
            $image->scale(width: 1280);

            // Simpan berdasarkan ekstensi
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    $image->toJpeg(80)->save($path); // 75 = kualitas
                    break;
                case 'png':
                    $image->toPng()->save($path); // PNG lossless, gak pakai kualitas
                    break;
                case 'webp':
                    $image->toWebp(80)->save($path); // WebP bisa compress
                    break;
                default:
                    return back()->with('error', 'Format gambar tidak didukung.');
            }
            $uploadedUrls[] = asset('../../upload/' . $compress);
        }

        return response()->json([
            'success' => true,
            'urls' => $uploadedUrls
        ]);
    }

    public function post_detail($jenis,$id, $slug)
    {
        $model = $this->getModel($jenis);
        $data = $model->where('id', $id)->firstOrFail();
        $viewName = 'detail';
        $lasts = $model->where('id', '!=', $id)->latest()->take(5)->get();
        // dd($data);
        // $data->increment('viewer');
        return view('post_detail', compact('data', 'jenis','viewName', 'lasts'));

    }

    public function post($jenis)
    {
        $viewName = 'list';
        if ($jenis == 'posts') {
            # code...

            $model_artikel = $this->getModel('artikel');
            $artikel = $model_artikel->where('status', '1')->latest('tanggal')->take(5)->get();

            $model_berita = $this->getModel('berita');
            $berita = $model_berita->where('status', '1')->latest('tanggal')->take(5)->get();
            $data = $berita->concat($artikel)->sortByDesc('tanggal')->paginate(5); ;
            // Gabungkan dan urutkan berdasarkan tanggal
            $lasts = $berita->concat($artikel)->sortByDesc('tanggal')->take(5);
        } else {
            # code...
            $model = $this->getModel($jenis);
            $data = $model->orderBy('tanggal', 'desc')->paginate(5);
            $lasts = $model->latest()->paginate(5);
        }
        
        // dd($data);
        // $data->increment('viewer');
        return view('post_detail', compact('data', 'jenis','viewName', 'lasts'));

    }

    public function totalPostings($tahun = null)
    {
        $unggahan = DB::query()
        ->fromSub(
            DB::table('artikel')->selectRaw('"artikel" as kategori, tanggal')
                ->unionAll(DB::table('berita')->selectRaw('"berita" as kategori, tanggal'))
                ->unionAll(DB::table('buletin')->selectRaw('"buletin" as kategori, tanggal'))
                ->unionAll(DB::table('jurnal')->selectRaw('"jurnal" as kategori, tanggal'))
                ->unionAll(DB::table('kliping')->selectRaw('"kliping" as kategori, tanggal'))
                ->unionAll(DB::table('pengumuman')->selectRaw('"pengumuman" as kategori, tanggal'))
                ->unionAll(DB::table('galeri')->selectRaw('"galeri" as kategori, tanggal'))
                ->unionAll(DB::table('unduhan')->selectRaw('"unduhan" as kategori, tanggal'))
            , 'postingan'
        )
        ->selectRaw('kategori, MONTH(tanggal) as bulan, COUNT(*) as total')
        ->whereYear('tanggal', 2025)
        ->groupBy('kategori', DB::raw('MONTH(tanggal)'))
        ->get();

        $viewer = DB::table('visitors')
        ->selectRaw("
            CASE
                WHEN url LIKE '%/artikel/%' THEN 'artikel'
                WHEN url LIKE '%/berita/%' THEN 'berita'
                WHEN url LIKE '%/buletin/%' THEN 'buletin'
                WHEN url LIKE '%/jurnal/%' THEN 'jurnal'
                WHEN url LIKE '%/kliping/%' THEN 'kliping'
                WHEN url LIKE '%/pengumuman/%' THEN 'pengumuman'
                WHEN url LIKE '%/galeri/%' THEN 'galeri'
                WHEN url LIKE '%/unduhan/%' THEN 'unduhan'
                ELSE 'lainnya'
            END as kategori,
            MONTH(created_at) as bulan,
            COUNT(*) as total
        ")
        ->whereYear('created_at', 2025)
        ->groupBy('kategori', DB::raw('MONTH(created_at)'))
        ->get();

        $kategoriList = ['artikel', 'berita', 'buletin', 'jurnal', 'kliping', 'pengumuman', 'galeri', 'unduhan'];
        $rekap = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $row = ['bulan' => $bulan];
            foreach ($kategoriList as $kategori) {
                $unggah = $unggahan->firstWhere('kategori', $kategori)?->total ?? 0;
                $lihat = $viewer->firstWhere(fn($v) => $v->kategori == $kategori && $v->bulan == $bulan)?->total ?? 0;

                $row["{$kategori}_unggah"] = $unggahan->firstWhere(fn($u) => $u->kategori == $kategori && $u->bulan == $bulan)?->total ?? 0;
                $row["{$kategori}_lihat"] = $viewer->firstWhere(fn($v) => $v->kategori == $kategori && $v->bulan == $bulan)?->total ?? 0;
            }

            // Total bulan ini
            $row['total_unggah'] = collect($row)->filter(fn($v, $k) => str_ends_with($k, '_unggah'))->sum();
            $row['total_lihat'] = collect($row)->filter(fn($v, $k) => str_ends_with($k, '_lihat'))->sum();

            $rekap[] = $row;
        }

        return view('admin.home', compact('rekap'));
    }

    
    public function getDashboardData()
    {
        $tahun = 2025;

        $kategoriTetap = [
            'artikel', 'berita', 'buletin', 'jurnal',
            'kliping', 'pengumuman', 'galeri', 'unduhan'
        ];

        // Gabungkan semua data dari berbagai tabel
        $gabunganQuery = DB::table('artikel')->selectRaw('"artikel" as kategori, tanggal')
            ->unionAll(DB::table('berita')->selectRaw('"berita" as kategori, tanggal'))
            ->unionAll(DB::table('buletin')->selectRaw('"buletin" as kategori, tanggal'))
            ->unionAll(DB::table('jurnal')->selectRaw('"jurnal" as kategori, tanggal'))
            ->unionAll(DB::table('kliping')->selectRaw('"kliping" as kategori, tanggal'))
            ->unionAll(DB::table('pengumuman')->selectRaw('"pengumuman" as kategori, tanggal'))
            ->unionAll(DB::table('galeri')->selectRaw('"galeri" as kategori, tanggal'))
            ->unionAll(DB::table('unduhan')->selectRaw('"unduhan" as kategori, tanggal'));

        // Ambil data sesuai tahun
        $gabungan = DB::query()
            ->fromSub($gabunganQuery, 'postingan')
            ->whereYear('tanggal', $tahun)
            ->get();

        // 1. Total per kategori (isi 0 jika tidak ada)
        $totals = collect($kategoriTetap)->map(function ($kategori) use ($gabungan) {
            return [
                'kategori' => $kategori,
                'total' => $gabungan->where('kategori', $kategori)->count(),
            ];
        });

        // 2. Grafik per bulan per kategori (12 bulan × semua kategori)
        $grafik = collect($kategoriTetap)->flatMap(function ($kategori) use ($gabungan) {
            $dataPerKategori = $gabungan->where('kategori', $kategori)
                ->groupBy(function ($item) {
                    return (int) date('n', strtotime($item->tanggal)); // 1–12
                });

            return collect(range(1, 12))->map(function ($bulan) use ($kategori, $dataPerKategori) {
                return [
                    'kategori' => $kategori,
                    'bulan' => $bulan,
                    'jumlah' => isset($dataPerKategori[$bulan]) ? $dataPerKategori[$bulan]->count() : 0,
                ];
            });
        });

        // 3. Pie chart (sama dengan total_per_kategori)
        $pieChart = $totals;

        // JSON response ke frontend
        return response()->json([
            'total_per_kategori' => $totals,
            'grafik_per_bulan'   => $grafik,
            'pie_chart'          => $pieChart,
        ]);
    }

    public function getStatistikTahunan()
    {
        $tahunSekarang = date('Y');
        $tahunRange = range($tahunSekarang, $tahunSekarang - 2);

        $unggahan = DB::query()
            ->fromSub(
                DB::table('artikel')->selectRaw('"artikel" as kategori, tanggal')
                    ->unionAll(DB::table('berita')->selectRaw('"berita" as kategori, tanggal'))
                    ->unionAll(DB::table('buletin')->selectRaw('"buletin" as kategori, tanggal'))
                    ->unionAll(DB::table('jurnal')->selectRaw('"jurnal" as kategori, tanggal'))
                    ->unionAll(DB::table('kliping')->selectRaw('"kliping" as kategori, tanggal'))
                    ->unionAll(DB::table('pengumuman')->selectRaw('"pengumuman" as kategori, tanggal'))
                    ->unionAll(DB::table('galeri')->selectRaw('"galeri" as kategori, tanggal'))
                    ->unionAll(DB::table('unduhan')->selectRaw('"unduhan" as kategori, tanggal'))
                , 'postingan'
            )
            ->selectRaw('YEAR(tanggal) as tahun, COUNT(*) as total')
            ->whereIn(DB::raw('YEAR(tanggal)'), $tahunRange)
            ->groupBy(DB::raw('YEAR(tanggal)'))
            ->pluck('total', 'tahun');

        $viewer = DB::table('visitors')
            ->selectRaw('YEAR(created_at) as tahun, COUNT(*) as total')
            ->whereIn(DB::raw('YEAR(created_at)'), $tahunRange)
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->pluck('total', 'tahun');

        $data = collect($tahunRange)->map(function ($tahun) use ($unggahan, $viewer) {
            return [
                'tahun' => $tahun,
                'unggahan' => $unggahan[$tahun] ?? 0,
                'viewer' => $viewer[$tahun] ?? 0,
            ];
        })->values();

        return response()->json($data);
    }

    public function getStatistikBulanan($tahun = null)
    {
        $tahun = $tahun ?? date('Y');

        // Ambil total unggahan per bulan (semua kategori)
        $unggahan = DB::query()
            ->fromSub(
                DB::table('artikel')->selectRaw('"artikel" as kategori, tanggal')
                    ->unionAll(DB::table('berita')->selectRaw('"berita" as kategori, tanggal'))
                    ->unionAll(DB::table('buletin')->selectRaw('"buletin" as kategori, tanggal'))
                    ->unionAll(DB::table('jurnal')->selectRaw('"jurnal" as kategori, tanggal'))
                    ->unionAll(DB::table('kliping')->selectRaw('"kliping" as kategori, tanggal'))
                    ->unionAll(DB::table('pengumuman')->selectRaw('"pengumuman" as kategori, tanggal'))
                    ->unionAll(DB::table('galeri')->selectRaw('"galeri" as kategori, tanggal'))
                    ->unionAll(DB::table('unduhan')->selectRaw('"unduhan" as kategori, tanggal'))
                , 'postingan'
            )
            ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->whereYear('tanggal', $tahun)
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->pluck('total', 'bulan');

        // Ambil total viewer per bulan (semua kategori)
        $viewer = DB::table('visitors')
            ->selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', $tahun)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'bulan');

        // Susun data untuk 12 bulan
        $data = collect(range(1, 12))->map(function ($bulan) use ($unggahan, $viewer) {
            return [
                'bulan' => $bulan,
                'unggahan' => $unggahan[$bulan] ?? 0,
                'viewer' => $viewer[$bulan] ?? 0,
            ];
        })->values();

        return response()->json($data);
    }
}
