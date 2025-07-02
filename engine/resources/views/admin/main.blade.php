<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.1.9/dist/quill-emoji.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill-mention@2.2.6/dist/quill.mention.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill-better-table@1.2.10/dist/quill-better-table.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            background-color: #4f46e5;
            color: white;
        }

        .sidebar-link.active {
            background-color: #4f46e5;
            color: white;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(1, 183, 255, 0.44);
        }

        .notification-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background-color: #ef4444;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
<!-- Sidebar -->
    <div id="sidebar" class="sidebar w-64 bg-gray-800 text-white fixed h-full overflow-y-auto z-10">
    <div class="p-4 flex items-center justify-between">
        <h1 class="text-xl font-bold">BPMP Prov. NTB</h1>
        <button id="closeSidebar" class="md:hidden text-white">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="border-t border-gray-700 my-2"></div>
    <nav class="mt-4 space-y-1">

        {{-- @if(Auth::user()->name == 'admin') --}}
            {{-- Admin menu --}}
            <x-sidebar-item icon="fa-tachometer-alt" label="Dashboard" :items="[
                ['label' => 'Dashboard', 'url' => url('home')]
            ]"/>
            <x-sidebar-item icon="fa-newspaper" label="Berita" :items="[
                ['label' => 'Data Berita', 'url' => url('home/konten/berita')],
                ['label' => 'Kategori Berita', 'url' => url('home/kategori/berita')],
            ]"/>
            <x-sidebar-item icon="fa-bullhorn" label="Pengumuman" :items="[
                ['label' => 'Data Pengumuman', 'url' => url('home/konten/pengumuman')],
                ['label' => 'Kategori Pengumuman', 'url' => url('home/kategori/pengumuman')],
            ]"/>
            <x-sidebar-item icon="fa-pen-nib" label="Artikel" :items="[
                ['label' => 'Data Artikel', 'url' => url('home/konten/artikel')],
                ['label' => 'Kategori Artikel', 'url' => url('home/kategori/artikel')],
            ]"/>
            <x-sidebar-item icon="fa-clone" label="Klipping" :items="[
                ['label' => 'Data Klipping', 'url' => url('home/konten/kliping')],
                ['label' => 'Kategori Klipping', 'url' => url('home/kategori/kliping')],
            ]"/>
            <x-sidebar-item icon="fa-book" label="Jurnal" :items="[
                ['label' => 'Data Jurnal', 'url' => url('home/konten/jurnal')],
                ['label' => 'Kategori Jurnal', 'url' => url('home/kategori/jurnal')],
            ]"/>
            <x-sidebar-item icon="fa-newspaper" label="Buletin" :items="[
                ['label' => 'Data Buletin', 'url' => url('home/konten/buletin')],
                ['label' => 'Kategori Buletin', 'url' => url('home/kategori/buletin')],
            ]"/>
            <x-sidebar-item icon="fa-download" label="Unduhan" :items="[
                ['label' => 'Data Unduhan', 'url' => url('home/konten/unduhan')],
                ['label' => 'Kategori Unduhan', 'url' => url('home/kategori/unduhan')],
            ]"/>
            <x-sidebar-item icon="fa-pen-nib" label="Galeri" :items="[
                ['label' => 'Data Galeri', 'url' => url('home/konten/galeri')],
                ['label' => 'Kategori Galeri', 'url' => url('home/kategori/galeri')],
            ]"/>
            <x-sidebar-item icon="fa-download" label="Profil" :items="[
                ['label' => 'Data Profil', 'url' => url('home/konten/profil')],
                ['label' => 'Kategori Profil', 'url' => url('home/kategori/profil')],
            ]"/>

            <x-sidebar-item icon="fa-images" label="Sliders" :items="[
                ['label' => 'Sliders', 'url' => url('home/sliders/sliders')]
            ]"/>

            <x-sidebar-item icon="fa-link" label="Link Eksternal" :items="[
                ['label' => 'Link Eksternal', 'url' => url('home/link/link-items')]
            ]"/>
            <x-sidebar-item icon="fa-internet-explorer" label="User Manajement" :items="[
                ['label' => 'Users ', 'url' => url('home/management/users')]
            ]"/>
            <x-sidebar-link icon="fa-award" label="ZI-WBK" url="{{ url('home/zi-wbk') }}"/>
            <x-sidebar-item icon="fa-internet-explorer" label="Website Settings" :items="[
                ['label' => 'Website ', 'url' => url('home/settings')]
            ]"/>
            

            {{-- <x-sidebar-item icon="fa-user-cog" label="Profil User" :items="[
                ['label' => 'Profil User', 'url' => url('home/profile/profile')]
            ]"/>

        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
           class="sidebar-link flex items-center px-4 py-3 text-gray-300 hover:text-white">
            <i class="fas fa-sign-out-alt w-6"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form> --}}
    </nav>
    <div class="border-t border-gray-700 my-4"></div>
    <div class="px-4 py-2">
        <p class="text-sm text-gray-400">Logged in as</p>
        <p class="font-medium">{{ Auth::user()->name }}</p>
    </div>
</div>


        <!-- Main Content -->
        <div class="flex-1 ml-0 md:ml-64">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="openSidebar" class="md:hidden mr-4 text-gray-600">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="notification-dot"></span>
                            </button>
                        </div>
                        <div class="relative">
                            <button class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="notification-dot"></span>
                            </button>
                        </div>
                        <div class="flex items-center relative group">
                            <button type="button" class="flex items-center focus:outline-none" id="userDropdownBtn">
                                <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-medium">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="ml-2 hidden md:inline">{{ Auth::user()->name }}</span>
                                <svg class="ml-1 w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="userDropdownMenu" class="absolute right-0 mt-2 w-44 bg-white rounded-md shadow-lg py-2 z-50 hidden group-focus:block group-hover:block">
                                <a href="{{ url('home/profile/profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-cog mr-2"></i> Profil User
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
    <!-- Main Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info','flash_message') }}">{{ Session::get('message') }}</p>
                @endif
                @yield('content')
            </main>
    
                <!-- Footer -->
            <footer class="bg-white p-6 border-t mt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-600">© 2023 Admin Dashboard. All rights reserved.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-mention@2.2.6/dist/quill.mention.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-emoji@0.1.9/dist/quill-emoji.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-better-table@1.2.10/dist/quill-better-table.min.js"></script>
    <!-- JavaScript for Sidebar Toggle & Charts -->
    <script>
    // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        openSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('open');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('open');
        });

        // Navigation active state
        const sidebarLinks = document.querySelectorAll('.sidebar-link');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Remove active class from all links
                sidebarLinks.forEach(l => l.classList.remove('active'));

                // Add active class to clicked link
                this.classList.add('active');

                // Update header title
                const headerTitle = document.querySelector('header h2');
                headerTitle.textContent = this.querySelector('span').textContent;
            });
        });
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
        let quill;
        function quillGenerator() {
            if (!Quill.imports['modules/imageResize']) {
                Quill.register('modules/imageResize', window.ImageResize.default || window.ImageResize);
            }

            const Font = Quill.import('formats/font');
            Font.whitelist = ['serif', 'monospace', 'sans'];
            Quill.register(Font, true);
            // var quillSet = new Quill('#konten', { theme: 'snow' });
            // let content = document.getElementById('content').value;
            // quillSet.root.innerHTML = content;
            quill = new Quill('#konten', {
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
            
            quill.getModule('toolbar').addHandler('image', () => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.setAttribute('multiple', 'multiple'); // tambahkan multiple
                input.click();

                input.onchange = async () => {
                    const files = input.files;
                    if (!files.length) return;

                    const formData = new FormData();
                    for (let i = 0; i < files.length; i++) {
                        formData.append('image[]', files[i]); // name disesuaikan dengan backend
                    }

                    try {
                        const response = await fetch("<?= route('quil.upload.image') ?>", {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        });

                        const result = await response.json();

                        if (result.success && result.urls) {
                            const range = quill.getSelection(true);
                            for (let url of result.urls) {
                                quill.insertEmbed(range.index, 'image', url);
                                range.index += 1; // naikkan index agar tidak tertimpa
                            }
                        } else {
                            alert('Upload gagal: ' + result.message);
                        }

                    } catch (error) {
                        console.error('Error uploading images:', error);
                        alert('Terjadi kesalahan saat upload gambar.');
                    }
                };
            });


            // document.getElementById('wrap-left-btn').addEventListener('click', () => wrapImage('left'));
            // document.getElementById('wrap-right-btn').addEventListener('click', () => wrapImage('right'));
            quill.on('text-change', () => {
                document.getElementsByName('content')[0].value=quill.root.innerHTML;
            });
            
        }

        
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
    @yield('script')
    @stack('scripts')
    {{-- <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'94d67eac6732ab49',t:'MTc0OTUzMzYxNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script> --}}
</body>

</html>