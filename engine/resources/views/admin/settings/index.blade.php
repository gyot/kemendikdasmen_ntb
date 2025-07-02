@extends('admin.main')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h3 class="text-2xl font-bold mb-6">Settings</h3>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Logo:</label>
            <input type="file" name="logo" class="block w-full border rounded px-3 py-2">
            @if($setting->logo)
                <img src="{{ asset('upload/settings/'.$setting->logo) }}" alt="Logo" class="h-12 mt-2">
            @endif
        </div>

        <div>
            <label class="block font-semibold mb-1">Favicon:</label>
            <input type="file" name="favicon" class="block w-full border rounded px-3 py-2">
            @if($setting->favicon)
                <img src="{{ asset('upload/settings/'.$setting->favicon) }}" alt="Favicon" class="h-8 mt-2">
            @endif
        </div>

        <div>
            <label class="block font-semibold mb-1">Judul (Title):</label>
            <input type="text" name="title" value="{{ $setting->title }}" class="block w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Footer:</label>
            <input type="text" name="footer" value="{{ $setting->footer }}" class="block w-full border rounded px-3 py-2">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Facebook:</label>
                <input type="text" name="facebook" value="{{ $setting->facebook }}" class="block w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">Twitter:</label>
                <input type="text" name="twitter" value="{{ $setting->twitter }}" class="block w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">Instagram:</label>
                <input type="text" name="instagram" value="{{ $setting->instagram }}" class="block w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">YouTube:</label>
                <input type="text" name="youtube" value="{{ $setting->youtube }}" class="block w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">WhatsApp:</label>
                <input type="text" name="whatsapp" value="{{ $setting->whatsapp }}" class="block w-full border rounded px-3 py-2">
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-1">Alamat:</label>
            <textarea name="alamat" class="block w-full border rounded px-3 py-2">{{ $setting->alamat }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Telepon (Phone):</label>
                <input type="text" name="phone" value="{{ $setting->phone }}" class="block w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">HP:</label>
                <input type="text" name="hp" value="{{ $setting->hp }}" class="block w-full border rounded px-3 py-2">
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-1">Email:</label>
            <input type="email" name="email" value="{{ $setting->email }}" class="block w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Map:</label>
            <textarea name="map" onchange="mapchange(this)" class="block w-full border rounded px-3 py-2">{{ $setting->map }}</textarea>
            
            <iframe id="mapview" src="{{ $setting->map }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">Simpan</button>
    </form>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<script>
function mapchange(event) {
    const mapview = document.getElementById('mapview');
    if (!mapview) {
        console.error('Map view element not found');
        return false;
    }   
    if (!event || !event.value) {
        console.error('Invalid event or value');
        return false;
    }
    if (!event.value.startsWith('https://www.google.com/maps/embed?')) {
        console.error('Invalid map URL');
        return false;
    }   

    mapview.src = event.value;
    if (mapview.src === '') {
        console.error('Map view source is empty');
        return false;
    }
    return true;
}
</script>
@endsection
