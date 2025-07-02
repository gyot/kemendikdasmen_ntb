@extends('admin.main')

@section('content')
<div class="container">
    <h1>Edit Link</h1>

    <form action="{{ route('eksternallink.update', $item->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" required value="{{ $item->title }}">
        </div>

        <div class="mb-3">
            <label for="link">Link URL</label>
            <input type="url" name="link" class="form-control" required value="{{ $item->link }}">
        </div>

        <div class="mb-3">
            <label for="images">Pilih Icon (Emoji)</label>
            <select name="images" class="form-control" required>
                <option value="">-- Pilih Emoji --</option>
                <option value="📢" @if($item->images == '📢') selected @endif>📢 Announcement</option>
                <option value="🎨" @if($item->images == '🎨') selected @endif>🎨 Art</option>
                <option value="🧺" @if($item->images == '🧺') selected @endif>🧺 Basket</option>
                <option value="⚾" @if($item->images == '⚾') selected @endif>⚾ Baseball</option>
                <option value="🏦" @if($item->images == '🏦') selected @endif>🏦 Bank</option>
                <option value="🚌" @if($item->images == '🚌') selected @endif>🚌 Bus</option>
                <option value="📅" @if($item->images == '📅') selected @endif>📅 Calendar</option>
                <option value="📷" @if($item->images == '📷') selected @endif>📷 Camera</option>
                <option value="📸" @if($item->images == '📸') selected @endif>📸 Camera Flash</option>
                <option value="💬" @if($item->images == '💬') selected @endif>💬 Chat</option>
                <option value="🧮" @if($item->images == '🧮') selected @endif>🧮 Calculator</option>
                <option value="🎮" @if($item->images == '🎮') selected @endif>🎮 Game</option>
                <option value="🗃️" @if($item->images == '🗃️') selected @endif>🗃️ Archive</option>
                <option value="🏢" @if($item->images == '🏢') selected @endif>🏢 Office</option>
                <option value="🧭" @if($item->images == '🧭') selected @endif>🧭 Compass</option>
                <option value="🧑‍💻" @if($item->images == '🧑‍💻') selected @endif>🧑‍💻 Programmer</option>
                <option value="🗂️" @if($item->images == '🗂️') selected @endif>🗂️ Folder</option>
                <option value="📘" @if($item->images == '📘') selected @endif>📘 Facebook</option>
                <option value="🗄️" @if($item->images == '🗄️') selected @endif>🗄️ File Cabinet</option>
                <option value="🏛️" @if($item->images == '🏛️') selected @endif>🏛️ Government</option>
                <option value="🎁" @if($item->images == '🎁') selected @endif>🎁 Gift</option>
                <option value="🎓" @if($item->images == '🎓') selected @endif>🎓 Graduation</option>
                <option value="🖼️" @if($item->images == '🖼️') selected @endif>🖼️ Gallery</option>
                <option value="⚙️" @if($item->images == '⚙️') selected @endif>⚙️ Gear</option>
                <option value="🏫" @if($item->images == '🏫') selected @endif>🏫 School</option>
                <option value="🏥" @if($item->images == '🏥') selected @endif>🏥 Hospital</option>
                <option value="🏠" @if($item->images == '🏠') selected @endif>🏠 Home</option>
                <option value="💡" @if($item->images == '💡') selected @endif>💡 Idea</option>
                <option value="ℹ️" @if($item->images == 'ℹ️') selected @endif>ℹ️ Info</option>
                <option value="📸" @if($item->images == '📸') selected @endif>📸 Instagram</option>
                <option value="🧾" @if($item->images == '🧾') selected @endif>🧾 Invoice</option>
                <option value="🔑" @if($item->images == '🔑') selected @endif>🔑 Login</option>
                <option value="🔒" @if($item->images == '🔒') selected @endif>🔒 Lock</option>
                <option value="🔗" @if($item->images == '🔗') selected @endif>🔗 Link</option>
                <option value="📄" @if($item->images == '📄') selected @endif>📄 Document</option>
                <option value="📚" @if($item->images == '📚') selected @endif>📚 Library</option>
                <option value="🔓" @if($item->images == '🔓') selected @endif>🔓 Unlock</option>
                <option value="🛒" @if($item->images == '🛒') selected @endif>🛒 Cart</option>
                <option value="🚪" @if($item->images == '🚪') selected @endif>🚪 Logout</option>
                <option value="💳" @if($item->images == '💳') selected @endif>💳 Payment</option>
                <option value="📞" @if($item->images == '📞') selected @endif>📞 Phone</option>
                <option value="📟" @if($item->images == '📟') selected @endif>📟 Pager</option>
                <option value="🧑‍🏫" @if($item->images == '🧑‍🏫') selected @endif>🧑‍🏫 Teacher</option>
                <option value="🧑‍🎓" @if($item->images == '🧑‍🎓') selected @endif>🧑‍🎓 Student</option>
                <option value="📍" @if($item->images == '📍') selected @endif>📍 Location</option>
                <option value="📺" @if($item->images == '📺') selected @endif>📺 TV</option>
                <option value="📺" @if($item->images == '📺') selected @endif>📺 YouTube</option>
                <option value="📢" @if($item->images == '📢') selected @endif>📢 Announcement</option>
                <option value="📖" @if($item->images == '📖') selected @endif>📖 Book</option>
                <option value="📊" @if($item->images == '📊') selected @endif>📊 Report</option>
                <option value="📈" @if($item->images == '📈') selected @endif>📈 Statistics</option>
                <option value="📹" @if($item->images == '📹') selected @endif>📹 Video Camera</option>
                <option value="🎥" @if($item->images == '🎥') selected @endif>🎥 Video</option>
                <option value="📘" @if($item->images == '📘') selected @endif>📘 Facebook</option>
                <option value="📻" @if($item->images == '📻') selected @endif>📻 Radio</option>
                <option value="📼" @if($item->images == '📼') selected @endif>📼 VHS</option>
                <option value="📹" @if($item->images == '📹') selected @endif>📹 Video Camera</option>
                <option value="📲" @if($item->images == '📲') selected @endif>📲 Mobile Send</option>
                <option value="📱" @if($item->images == '📱') selected @endif>📱 Smartphone</option>
                <option value="📠" @if($item->images == '📠') selected @endif>📠 Fax</option>
                <option value="📂" @if($item->images == '📂') selected @endif>📂 Folder</option>
                <option value="📅" @if($item->images == '📅') selected @endif>📅 Calendar</option>
                <option value="📆" @if($item->images == '📆') selected @endif>📆 Calendar</option>
                <option value="📇" @if($item->images == '📇') selected @endif>📇 Card Index</option>
                <option value="📈" @if($item->images == '📈') selected @endif>📈 Chart Increasing</option>
                <option value="📉" @if($item->images == '📉') selected @endif>📉 Chart Decreasing</option>
                <option value="📊" @if($item->images == '📊') selected @endif>📊 Bar Chart</option>
                <option value="📋" @if($item->images == '📋') selected @endif>📋 Clipboard</option>
                <option value="📌" @if($item->images == '📌') selected @endif>📌 Pushpin</option>
                <option value="📍" @if($item->images == '📍') selected @endif>📍 Round Pushpin</option>
                <option value="📎" @if($item->images == '📎') selected @endif>📎 Paperclip</option>
                <option value="📏" @if($item->images == '📏') selected @endif>📏 Straight Ruler</option>
                <option value="📐" @if($item->images == '📐') selected @endif>📐 Triangular Ruler</option>
                <option value="📑" @if($item->images == '📑') selected @endif>📑 Bookmark Tabs</option>
                <option value="📒" @if($item->images == '📒') selected @endif>📒 Ledger</option>
                <option value="📓" @if($item->images == '📓') selected @endif>📓 Notebook</option>
                <option value="📔" @if($item->images == '📔') selected @endif>📔 Notebook With Decorative Cover</option>
                <option value="📕" @if($item->images == '📕') selected @endif>📕 Closed Book</option>
                <option value="📖" @if($item->images == '📖') selected @endif>📖 Open Book</option>
                <option value="📗" @if($item->images == '📗') selected @endif>📗 Green Book</option>
                <option value="📘" @if($item->images == '📘') selected @endif>📘 Blue Book</option>
                <option value="📙" @if($item->images == '📙') selected @endif>📙 Orange Book</option>
                <option value="📚" @if($item->images == '📚') selected @endif>📚 Books</option>
                <option value="📛" @if($item->images == '📛') selected @endif>📛 Name Badge</option>
                <option value="📜" @if($item->images == '📜') selected @endif>📜 Scroll</option>
                <option value="📝" @if($item->images == '📝') selected @endif>📝 Tasks</option>
                <option value="🗑️" @if($item->images == '🗑️') selected @endif>🗑️ Delete</option>
                <option value="✉️" @if($item->images == '✉️') selected @endif>✉️ Email</option>
                <option value="✏️" @if($item->images == '✏️') selected @endif>✏️ Edit</option>
                <option value="✅" @if($item->images == '✅') selected @endif>✅ Success</option>
                <option value="❌" @if($item->images == '❌') selected @endif>❌ Error</option>
                <option value="⚠️" @if($item->images == '⚠️') selected @endif>⚠️ Warning</option>
                <option value="⬇️" @if($item->images == '⬇️') selected @endif>⬇️ Download</option>
                <option value="⬆️" @if($item->images == '⬆️') selected @endif>⬆️ Upload</option>
                <option value="☰" @if($item->images == '☰') selected @endif>☰ Menu</option>
                <option value="🐦" @if($item->images == '🐦') selected @endif>🐦 Twitter</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" @if($item->status == 1) selected @endif>Aktif</option>
                <option value="0" @if($item->status == 0) selected @endif>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('eksternallink.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
