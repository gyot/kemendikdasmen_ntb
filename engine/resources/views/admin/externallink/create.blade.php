@extends('admin.main')

@section('content')
    <div class="container">
    <h1>Tambah Link Baru</h1>

    <form action="{{ route('eksternallink.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="link">Link URL</label>
            <input type="url" name="link" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="images">Pilih Icon (Emoji)</label>
            <select name="images" class="form-control" required>
                <option value="">-- Pilih Emoji --</option>
                <option value="🗃️">🗃️ Archive</option>
                <option value="🎨">🎨 Art</option>
                <option value="⚾">⚾ Baseball</option>
                <option value="🧺">🧺 Basket</option>
                <option value="🏦">🏦 Bank</option>
                <option value="🥉">🥉 Bronze Medal</option>
                <option value="🚌">🚌 Bus</option>
                <option value="📅">📅 Calendar</option>
                <option value="📷">📷 Camera</option>
                <option value="📸">📸 Camera Flash</option>
                <option value="💬">💬 Chat</option>
                <option value="📄">📄 Document</option>
                <option value="🗑️">🗑️ Delete</option>
                <option value="🚚">🚚 Delivery</option>
                <option value="🖥️">🖥️ Desktop</option>
                <option value="⬇️">⬇️ Download</option>
                <option value="🧬">🧬 DNA</option>
                <option value="✏️">✏️ Edit</option>
                <option value="✉️">✉️ Email</option>
                <option value="📘">📘 Facebook</option>
                <option value="📠">📠 Fax</option>
                <option value="🗄️">🗄️ File Cabinet</option>
                <option value="🔦">🔦 Flashlight</option>
                <option value="🎁">🎁 Gift</option>
                <option value="🏛️">🏛️ Government</option>
                <option value="🎓">🎓 Graduation</option>
                <option value="🎮">🎮 Game</option>
                <option value="⚙️">⚙️ Gear</option>
                <option value="✅">✅ Success</option>
                <option value="🖼️">🖼️ Gallery</option>
                <option value="🧮">🧮 Calculator</option>
                <option value="🧑‍💻">🧑‍💻 Programmer</option>
                <option value="🏥">🏥 Hospital</option>
                <option value="💡">💡 Idea</option>
                <option value="ℹ️">ℹ️ Info</option>
                <option value="📸">📸 Instagram</option>
                <option value="🧾">🧾 Invoice</option>
                <option value="🔑">🔑 Key</option>
                <option value="🔑">🔑 Login</option>
                <option value="📚">📚 Library</option>
                <option value="🔗">🔗 Link</option>
                <option value="🔗">🔗 LinkedIn</option>
                <option value="🔒">🔒 Lock</option>
                <option value="🧴">🧴 Lotion</option>
                <option value="🚪">🚪 Logout</option>
                <option value="🏬">🏬 Mall</option>
                <option value="🧲">🧲 Magnet</option>
                <option value="☰">☰ Menu</option>
                <option value="🎤">🎤 Microphone</option>
                <option value="📲">📲 Mobile Send</option>
                <option value="🎬">🎬 Movie</option>
                <option value="🎵">🎵 Music</option>
                <option value="📰">📰 News</option>
                <option value="📓">📓 Notebook</option>
                <option value="📔">📔 Notebook With Decorative Cover</option>
                <option value="🏢">🏢 Office</option>
                <option value="📙">📙 Orange Book</option>
                <option value="🧑‍🏫">🧑‍🏫 Teacher</option>
                <option value="🧑‍🎓">🧑‍🎓 Student</option>
                <option value="📞">📞 Phone</option>
                <option value="📞">📞 Telephone</option>
                <option value="📟">📟 Pager</option>
                <option value="💳">💳 Payment</option>
                <option value="🧫">🧫 Petri Dish</option>
                <option value="🎹">🎹 Piano</option>
                <option value="🔌">🔌 Plug</option>
                <option value="🚓">🚓 Police</option>
                <option value="📍">📍 Location</option>
                <option value="📻">📻 Radio</option>
                <option value="📊">📊 Report</option>
                <option value="🚀">🚀 Rocket</option>
                <option value="🏫">🏫 School</option>
                <option value="🔏">🔏 Secure</option>
                <option value="📈">📈 Statistics</option>
                <option value="🩺">🩺 Stethoscope</option>
                <option value="🧰">🧰 Toolbox</option>
                <option value="🛒">🛒 Cart</option>
                <option value="🎯">🎯 Target</option>
                <option value="🗂️">🗂️ Folder</option>
                <option value="🧼">🧼 Soap</option>
                <option value="📱">📱 Smartphone</option>
                <option value="📚">📚 Books</option>
                <option value="📜">📜 Scroll</option>
                <option value="🔓">🔓 Unlock</option>
                <option value="⬆️">⬆️ Upload</option>
                <option value="👤">👤 User</option>
                <option value="👥">👥 Users</option>
                <option value="📼">📼 VHS</option>
                <option value="🎥">🎥 Video</option>
                <option value="📹">📹 Video Camera</option>
                <option value="📺">📺 TV</option>
                <option value="📺">📺 YouTube</option>
                <option value="⚠️">⚠️ Warning</option>
                <option value="💬">💬 WhatsApp</option>
                <option value="❌">❌ Error</option>
                <option value="🧻">🧻 Toilet Paper</option>
                <option value="🧽">🧽 Sponge</option>
                <option value="🧷">🧷 Safety Pin</option>
                <option value="🧹">🧹 Broom</option>
                <option value="🛠️">🛠️ Tools</option>
                <option value="🐦">🐦 Twitter</option>
                <option value="🗓️">🗓️ Schedule</option>
                <option value="🏆">🏆 Trophy</option>
                <option value="🎫">🎫 Ticket</option>
                <option value="⏰">⏰ Time</option>
                <option value="🖨️">🖨️ Printer</option>
                <option value="🖱️">🖱️ Mouse</option>
                <option value="💉">💉 Syringe</option>
                <option value="💊">💊 Pill</option>
                <option value="🛡️">🛡️ Shield</option>
                <option value="🧪">🧪 Lab</option>
                <option value="🧭">🧭 Compass</option>
                <option value="🧹">🧹 Broom</option>
                <option value="🏀">🏀 Basketball</option>
                <option value="⚽">⚽ Soccer</option>
                <option value="🏈">🏈 Football</option>
                <option value="🏐">🏐 Volleyball</option>
                <option value="🏉">🏉 Rugby</option>
                <option value="🎾">🎾 Tennis</option>
                <option value="🥇">🥇 Gold Medal</option>
                <option value="🥈">🥈 Silver Medal</option>
                <option value="🚗">🚗 Car</option>
                <option value="🚕">🚕 Taxi</option>
                <option value="🚙">🚙 SUV</option>
                <option value="🚎">🚎 Trolleybus</option>
                <option value="✈️">✈️ Airplane</option>
                <option value="⛵">⛵ Boat</option>
                <option value="🛰️">🛰️ Satellite</option>
                <option value="🔋">🔋 Battery</option>
                <option value="💻">💻 Laptop</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
