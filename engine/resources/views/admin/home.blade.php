@extends('admin.main')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Artikel</p>
                    <h3 class="text-2xl font-bold total-artikel"></h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-file-alt text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Berita</p>
                    <h3 class="text-2xl font-bold total-berita"></h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-newspaper text-green-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Buletin</p>
                    <h3 class="text-2xl font-bold total-buletin"></h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-book-open text-purple-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Jurnal</p>
                    <h3 class="text-2xl font-bold total-jurnal"></h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-book text-yellow-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-pink-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Kliping</p>
                    <h3 class="text-2xl font-bold total-kliping"></h3>
                </div>
                <div class="bg-pink-100 p-3 rounded-full">
                    <i class="fas fa-clone text-pink-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Pengumuman</p>
                    <h3 class="text-2xl font-bold total-pengumuman"></h3>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-bullhorn text-red-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Galeri</p>
                    <h3 class="text-2xl font-bold total-galeri"></h3>
                </div>
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-images text-indigo-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 transition-all duration-300 card-hover border-l-4 border-teal-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Unduhan</p>
                    <h3 class="text-2xl font-bold total-unduhan"></h3>
                </div>
                <div class="bg-teal-100 p-3 rounded-full">
                    <i class="fas fa-download text-teal-500 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="h-70">
                <canvas id="chartPerBulan"></canvas>
                
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="h-64 flex items-center justify-center">
                <div class="relative w-48 h-48">
                    <canvas id="chartPieKategori" width="192" height="192"></canvas>
                    {{-- <div id="pieLegend" class="mt-4 space-y-2"></div> --}}
                </div>
            </div>
            <div id="pieLegend" class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-4">
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                    <span class="text-xs">Artikel (<span class="total-artikel"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                    <span class="text-xs">Berita (<span class="total-berita"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-purple-700 rounded-full mr-2"></span>
                    <span class="text-xs">Buletin (<span class="total-buletin"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-yellow-400 rounded-full mr-2"></span>
                    <span class="text-xs">Jurnal (<span class="total-jurnal"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-pink-500 rounded-full mr-2"></span>
                    <span class="text-xs">Kliping (<span class="total-kliping"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                    <span class="text-xs">Pengumuman (<span class="total-pengumuman"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-indigo-500 rounded-full mr-2"></span>
                    <span class="text-xs">Galeri (<span class="total-galeri"></span>)</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-teal-500 rounded-full mr-2"></span>
                    <span class="text-xs">Unduhan (<span class="total-unduhan"></span>)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Viewer per kategori -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h3 class="text-lg font-semibold mb-4">Jumlah Viewer per Kategori</h3>
        <div class="h-70" style="overflow-y: scroll">
            {{-- <canvas id="chartViewerPerKategori"></canvas> --}}
            <table class="w-full text-xs md:text-sm" >
                <thead class="bg-gray-50" >
                    <tr>
                        <th class="px-2 py-2 border text-center align-middle" rowspan="2">Bulan</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Artikel</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Berita</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Buletin</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Jurnal</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Kliping</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Pengumuman</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Galeri</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Unduhan</th>
                        <th class="px-2 py-2 border text-center align-middle" colspan="2">Total Bulanan</th>
                    </tr>
                    <tr>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                        <th class="px-2 py-1 border text-center">Unggahan</th>
                        <th class="px-2 py-1 border text-center">Dilihat</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($rekap as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::create()->month($row['bulan'])->translatedFormat('F') }}</td>
                        <td>{{ $row['artikel_unggah'] }}</td>
                        <td>{{ $row['artikel_lihat'] }}</td>
                        <td>{{ $row['berita_unggah'] }}</td>
                        <td>{{ $row['berita_lihat'] }}</td>
                        <td>{{ $row['buletin_unggah'] }}</td>
                        <td>{{ $row['buletin_lihat'] }}</td>
                        <td>{{ $row['jurnal_unggah'] }}</td>
                        <td>{{ $row['jurnal_lihat'] }}</td>
                        <td>{{ $row['kliping_unggah'] }}</td>
                        <td>{{ $row['kliping_lihat'] }}</td>
                        <td>{{ $row['pengumuman_unggah'] }}</td>
                        <td>{{ $row['pengumuman_lihat'] }}</td>
                        <td>{{ $row['galeri_unggah'] }}</td>
                        <td>{{ $row['galeri_lihat'] }}</td>
                        <td>{{ $row['unduhan_unggah'] }}</td>
                        <td>{{ $row['unduhan_lihat'] }}</td>
                        <td>{{ $row['total_unggah'] }}</td>
                        <td>{{ $row['total_lihat'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="h-70">
                <canvas id="unggahanChart" height="100"></canvas>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="h-70">
                <canvas id="viewerChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <canvas id="unggahanBulananChart" height="100"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <canvas id="viewerBulananChart" height="100"></canvas>
        </div>
    </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
    let tahun = null;
document.addEventListener('DOMContentLoaded', function () {
    fetch('/dashboard-json')
        .then(res => res.json())
        .then(data => {
            
            renderLineChart(data.grafik_per_bulan);
            renderPieChart(data.pie_chart);
            renderTotalCards(data.total_per_kategori);
            renderTotalBulanan(tahun);
        });
});

function renderLineChart(data) {
    const categories = [...new Set(data.map(item => item.kategori))];
    const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    const datasets = categories.map(kat => {
        const values = Array(12).fill(0);
        data.forEach(item => {
            if (item.kategori === kat) values[item.bulan - 1] = item.jumlah;
        });
        return {
            label: kat.charAt(0).toUpperCase() + kat.slice(1),
            data: values,
            fill: false,
            tension: 0.2,
            borderWidth: 2,
        };
    });

    new Chart(document.getElementById('chartPerBulan'), {
        type: 'line',
        data: {
            labels: monthLabels,
            datasets: datasets
        },
        options: {
            responsive: true,
            plugins: {
                title: { display: true, text: 'Grafik Postingan per Bulan' },
                legend: { display: true }
            }
        }
    });
}

function renderPieChart(data) {
    const kategoriData = data.map(i => i.kategori);
    const totalData = data.map(i => i.total);
    const colors = [
        '#36A2EB', '#FF6384', '#FFCD56', '#4BC0C0',
        '#9966FF', '#FF9F40', '#C9CBCF', '#2ecc71'
    ];

    // Pie chart
    new Chart(document.getElementById('chartPieKategori'), {
        type: 'doughnut',
        data: {
            labels: kategoriData,
            datasets: [{
                data: totalData,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Jumlah Postingan per Kategori'
                },
                legend: { display: false } // Matikan legend di grafik
            }
        }
    });

    // Tampilkan daftar kategori dan jumlah di bawah grafik
    const legendContainer = document.getElementById('pieLegend');
    kategoriData.forEach((kategori, index) => {
        const jumlah = totalData[index];
        const warna = colors[index];

        const item = document.createElement('div');
        item.innerHTML = `
            <div class="flex items-center">
                <span class="w-3 h-3 rounded-full mr-2" style="background-color: ${warna};"></span>
                <span class="text-xs">${kategori} (<span>${jumlah}</span>)</span>
            </div>
            `;
            // <div class="flex items-center space-x-2">
            //     <span class="inline-block w-4 h-4 rounded" style="background-color: ${warna};"></span>
            //     <span class="font-medium capitalize">${kategori}</span>
            //     <span class="ml-auto font-bold">${jumlah}</span>
            // </div>
        legendContainer.appendChild(item);
    });


}

// Render angka total ke card
function renderTotalCards(data) {
    data.forEach(item => {
        const elements = document.querySelectorAll(`.total-${item.kategori}`);
        elements.forEach(el => {
            el.textContent = item.total;
        });
    // console.log(`Total total-${item.kategori} ${item.kategori}: ${item.total}`);
    
    });
}

fetch('/statistik-tahunan')
    .then(res => res.json())
    .then(data => {
        const labels = data.map(row => row.tahun);
        const unggahanData = data.map(row => row.unggahan);
        const viewerData = data.map(row => row.viewer);

        // Chart Unggahan
        new Chart(document.getElementById('unggahanChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Unggah',
                    data: unggahanData,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Statistik Total Unggah 3 Tahun Terakhir'
                    }
                }
            }
        });

        // Chart Viewer
        new Chart(document.getElementById('viewerChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Dilihat',
                    data: viewerData,
                    borderColor: 'green',
                    backgroundColor: 'rgba(0, 128, 0, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Statistik Total Dilihat 3 Tahun Terakhir'
                    }
                }
            }
        });
    });

function renderTotalBulanan(tahun) {
    fetch('/statistik-bulanan/' + tahun)
        .then(res => res.json())
        .then(data => {
            const bulanLabels = [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ];
            const unggahanData = data.map(row => row.unggahan);
            const viewerData = data.map(row => row.viewer);

            // Chart Unggahan Bulanan
            new Chart(document.getElementById('unggahanBulananChart'), {
                type: 'bar',
                data: {
                    labels: bulanLabels,
                    datasets: [{
                        label: 'Total Unggahan',
                        data: unggahanData,
                        backgroundColor: '#6366f1'
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Unggahan per Bulan'
                        },
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            // Chart Viewer Bulanan
            new Chart(document.getElementById('viewerBulananChart'), {
                type: 'bar',
                data: {
                    labels: bulanLabels,
                    datasets: [{
                        label: 'Total Viewer',
                        data: viewerData,
                        backgroundColor: '#22c55e'
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Viewer per Bulan'
                        },
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
}
</script>
@endpush
