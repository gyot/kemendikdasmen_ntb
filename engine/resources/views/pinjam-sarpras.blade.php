@extends('main')
@section('content')

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Artikel Utama -->
                <div class="max-w-9xl mx-auto flex-1">
                <iframe src="https://sarpras1.gdoank.my.id/dashboard" style="width:100%; height:900px; border:none;overflow: hidden;"></iframe>
                </div>
                <!-- Sidebar Kanan -->
                @include('components.sidebar-kanan', ['jenis' => 'pinjam-sarpras', 'lasts' => []])
                
        </div>
        </div>
    </section>
@endsection
@section('script') 
@endsection
@section('style')
@endsection