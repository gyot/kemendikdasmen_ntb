<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.1.9/dist/quill-emoji.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill-mention@2.2.6/dist/quill.mention.min.css" rel="stylesheet">
    <style>
        #editor-container {
            height: 300px;
            margin-bottom: 20px;
        }

        .ql-editor img.float-left {
            float: left;
            margin: 0 10px 10px 0;
        }

        .ql-editor img.float-right {
            float: right;
            margin: 0 0 10px 10px;
        }

        #preview-container {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
        }

        /* Tambahan font */
        .ql-font-serif {
            font-family: serif;
        }

        .ql-font-monospace {
            font-family: monospace;
        }

        .ql-font-sans {
            font-family: sans-serif;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        /* Sidebar */
        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: #1c1c1c;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: left 0.3s;
        }

        #sidebar.hide {
            left: -250px;
        }

        #sidebar .logo {
            text-align: center;
            padding: 20px 0;
            color: white;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #sidebar ul li a {
            display: block;
            padding: 15px;
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar ul li a:hover,
        #sidebar ul li a.active {
            background-color: #343a40;
            color: white;
        }

        /* Main Content */
        #content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        /* Toggle Button */
        #sidebarToggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background: #1c1c1c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            font-size: 1.2rem;
            cursor: pointer;
        }

        /* Tambahan agar tombol burger pindah ke atas sidebar saat sidebar tampil */
        @media (max-width: 991.98px) {
            #sidebarToggle {
                display: block;
                /* Tambahan: geser tombol ke kanan saat sidebar tampil */
                transition: left 0.3s;
            }

            #sidebar.show~#sidebarToggle {
                left: 270px;
                /* sedikit keluar dari sidebar, sesuaikan jika perlu */
            }
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            #sidebar {
                left: -250px;
            }

            #sidebar.show {
                left: 0;
            }

            #content {
                margin-left: 0;
            }

            #sidebarToggle {
                display: block;
            }

            /* Tambahan: beri padding atas pada #content agar dashboard tidak tertutup tombol */
            #content {
                padding-top: 60px;
            }
        }

        /* Tambahan: pada layar kecil, beri margin kiri pada judul dashboard */
        @media (max-width: 575.98px) {
            #content h2 {
                margin-left: 45px;
            }
        }

        /* Statistic Cards */
        .stat-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-card .icon {
            width: 50px;
            height: 50px;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .stat-card .info {
            flex-grow: 1;
        }

        .stat-card .info h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .stat-card .info p {
            color: #777;
        }

        /* Sales Overview */
        .sales-overview {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .sales-overview .chart {
            height: 250px;
        }

        /* Traffic Sources */
        .traffic-sources {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .traffic-sources .chart {
            height: 250px;
        }

        /* Recent Orders */
        .recent-orders {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .recent-orders table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-orders th,
        .recent-orders td {
            padding: 10px;
            text-align: left;
        }

        .recent-orders th {
            background-color: #f8f9fa;
        }

        .recent-orders .status.completed {
            background-color: #d1e7dd;
            color: #155724;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .recent-orders .status.processing {
            background-color: #fff3cd;
            color: #856404;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .recent-orders .status.cancelled {
            background-color: #fed7d7;
            color: #842029;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .sidebar-menu-scroll {
            max-height: calc(100vh - 120px);
            /* adjust if needed */
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 4px;
        }

        /* Optional: custom scrollbar style */
        .sidebar-menu-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-menu-scroll::-webkit-scrollbar-thumb {
            background: #343a40;
            border-radius: 3px;
        }

        .sidebar-menu-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
    </style>
</head>

<body>
    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="logo">
            <h3><i class="fas fa-cog"></i> Admin Panel</h3>
        </div>
        <div class="sidebar-menu-scroll">
            <ul>
                <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <!-- 🔐 Untuk admin -->
                @if(Auth::user()->name=="admin")
                <li><a href="#">Berita</a></li>
                <li><a href="#">Data Berita</a></li>
                <li><a href="#">Kategori Berita</a></li>
                <li><a href="#">PSRB</a></li>
                <li><a href="#">Data PSRB</a></li>
                <li><a href="#">Kategori PSRB</a></li>
                <li><a href="#">Pengumuman</a></li>
                <li><a href="#">Data Pengumuman</a></li>
                <li><a href="#">Kategori Pengumuman</a></li>
                <li><a href="#">Artikel</a></li>
                <li><a href="#">Data Artikel</a></li>
                <li><a href="#">Kategori Artikel</a></li>
                <li><a href="#">Klipping</a></li>
                <li><a href="#">Data Klipping</a></li>
                <li><a href="#">Kategori Klipping</a></li>
                <li><a href="#">Jurnal</a></li>
                <li><a href="#">Data Jurnal</a></li>
                <li><a href="#">Kategori Jurnal</a></li>
                <li><a href="#">Buletin</a></li>
                <li><a href="#">Data Buletin</a></li>
                <li><a href="#">Kategori Buletin</a></li>
                <li><a href="#">Unduhan</a></li>
                <li><a href="#">Data Unduhan</a></li>
                <li><a href="#">Kategori Unduhan</a></li>
                <li><a href="#">Visi Misi</a></li>
                <li><a href="#">Sarana Prasarana</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Kegiatan</a></li>
                <li><a href="#">Sertifikat</a></li>
                <li><a href="#">Sertifikat Kumulatif</a></li>
                <li><a href="#">Struktur Organisasi</a></li>
                <li><a href="#">Tugas Pokok</a></li>
                <li><a href="#">Slider</a></li>
                <li><a href="#">Pinjam BMN</a></li>
                <li><a href="#">External Link</a></li>
                <li><a href="#">ZI-WBK</a></li>
                <li><a href="#">Change Profile</a></li>
                @elseif (Auth::user()->id_seksi=="4")
                <li><a href="#">Klipping</a></li>
                <li><a href="#">Data Klipping</a></li>
                <li><a href="#">Kategori Klipping</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <!-- 👥 Untuk pengguna biasa -->
                <!-- <li class="mt-3 text-white px-3">👥 Untuk Pengguna Biasa</li>
                <li><a href="#">Kegiatan</a></li>
                <li><a href="#">Sertifikat</a></li> -->
                @endif
                <li><a href="#">Change Profile</a></li>
                <li>
                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div id="content">
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info','flash_message') }}">{{ Session::get('message') }}</p>
        @endif
        @yield('content')
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-mention@2.2.6/dist/quill.mention.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-emoji@0.1.9/dist/quill-emoji.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

    <!-- JavaScript for Sidebar Toggle & Charts -->
    <script>
        // Wrap image
        function wrapImage(direction) {
            const range = quill.getSelection();
            if (!range) return;
            const [imgBlot] = quill.scroll.descendant(Quill.import('formats/image'), range.index);
            if (imgBlot) {
                const img = imgBlot.domNode;
                img.classList.remove('float-left', 'float-right');
                img.classList.add(`float-${direction}`);
            }
        }
        function quillGenerator() {
            if (!Quill.imports['modules/imageResize']) {
                Quill.register('modules/imageResize', window.ImageResize.default || window.ImageResize);
            }

            const Font = Quill.import('formats/font');
            Font.whitelist = ['serif', 'monospace', 'sans'];
            Quill.register(Font, true);

            const quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Tulis konten di sini...',
                modules: {
                    toolbar: '#toolbar',
                    imageResize: {},
                    mention: {
                        allowedChars: /^[A-Za-z\s]*$/,
                        mentionDenotationChars: ["@"],
                        source: function (searchTerm, renderList) {
                            const values = [
                                { id: 1, value: "admin" },
                                { id: 2, value: "editor" },
                                { id: 3, value: "user" },
                            ];
                            renderList(values.filter(v => v.value.toLowerCase().includes(searchTerm.toLowerCase())));
                        }
                    }
                }
            });

            // Upload image handler
            quill.getModule('toolbar').addHandler('image', () => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = () => {
                    const file = input.files[0];
                    const reader = new FileReader();
                    reader.onload = () => {
                        const range = quill.getSelection();
                        quill.insertEmbed(range.index, 'image', reader.result);
                    };
                    reader.readAsDataURL(file);
                };
            });

            document.getElementById('wrap-left-btn').addEventListener('click', () => wrapImage('left'));
            document.getElementById('wrap-right-btn').addEventListener('click', () => wrapImage('right'));
        }

        quillGenerator();
        // // Preview
        // document.getElementById('previewBtn').addEventListener('click', () => {
        //     const html = quill.root.innerHTML;
        //     const preview = document.getElementById('preview-content');
        //     const previewContainer = document.getElementById('preview-container');
        //     preview.innerHTML = html;
        //     previewContainer.style.display = 'block';
        // });

        // // Save to server
        // document.getElementById('saveBtn').addEventListener('click', () => {
        //     const html = quill.root.innerHTML;
        //     console.log("Konten HTML:", html);

        //     fetch('/save-editor', {
        //         method: 'POST',
        //         headers: { 'Content-Type': 'application/json' },
        //         body: JSON.stringify({ content: html })
        //     })
        //         .then(res => res.json())
        //         .then(data => alert("Konten berhasil disimpan!"))
        //         .catch(err => alert("Gagal menyimpan: " + err.message));
        // });

        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        sidebarToggle.addEventListener('click', function () {
            if (window.innerWidth <= 991.98) {
                sidebar.classList.toggle('show');
            }
        });
        // Hide sidebar when clicking outside (on mobile)
        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 991.98) {
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Sales Overview Chart
        function createSalesChart() {
            const salesChart = document.getElementById('salesChart').getContext('2d');
            new Chart(salesChart, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Sales',
                        data: [10, 20, 15, 25, 30, 20, 35],
                        borderColor: '#28a745',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Traffic Sources Chart
        function createTrafficChart() {
            const trafficChart = document.getElementById('trafficChart').getContext('2d');
            new Chart(trafficChart, {
                type: 'pie',
                data: {
                    labels: ['Organic', 'Social', 'Referral'],
                    datasets: [{
                        data: [75, 20, 5],
                        backgroundColor: ['#007bff', '#17a2b8', '#28a745']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }
    </script>
</body>

</html>