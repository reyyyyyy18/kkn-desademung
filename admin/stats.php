<?php
include '../koneksi.php';
$jumlah_berita = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM berita"))[0];
$jumlah_produk = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM produk"))[0];
$jumlah_wisata = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM wisata"))[0];
$jumlah_user = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM user"))[0];

// Statistik per bulan (7 bulan terakhir)
function getMonthlyStats($conn, $table, $date_col = 'created_at') {
    $data = [];
    $labels = [];
    for ($i = 6; $i >= 0; $i--) {
        $bulan = date('Y-m', strtotime("-{$i} month"));
        $label = date('M', strtotime($bulan.'-01'));
        $labels[] = $label;
        $q = mysqli_query($conn, "SELECT COUNT(*) FROM $table WHERE DATE_FORMAT($date_col, '%Y-%m') = '$bulan'");
        $data[] = (int)mysqli_fetch_row($q)[0];
    }
    return ['labels' => $labels, 'data' => $data];
}
$berita_bulan = getMonthlyStats($conn, 'berita', 'created_at');
$produk_bulan = getMonthlyStats($conn, 'produk', 'created_at');
$wisata_bulan = getMonthlyStats($conn, 'wisata', 'created_at');
$user_bulan = getMonthlyStats($conn, 'user', 'created_at');

// Statistik per tahun (5 tahun terakhir)
function getYearlyStats($conn, $table, $date_col = 'created_at') {
    $data = [];
    $labels = [];
    for ($i = 4; $i >= 0; $i--) {
        $tahun = date('Y', strtotime("-{$i} year"));
        $labels[] = $tahun;
        $q = mysqli_query($conn, "SELECT COUNT(*) FROM $table WHERE YEAR($date_col) = '$tahun'");
        $data[] = (int)mysqli_fetch_row($q)[0];
    }
    return ['labels' => $labels, 'data' => $data];
}
$berita_tahun = getYearlyStats($conn, 'berita', 'created_at');
$produk_tahun = getYearlyStats($conn, 'produk', 'created_at');
$wisata_tahun = getYearlyStats($conn, 'wisata', 'created_at');
$user_tahun = getYearlyStats($conn, 'user', 'created_at');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Statistik Website Desa Demung</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 justify-items-stretch mb-12">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="zoom-in">
                <i class='bx bx-news text-4xl text-green-600 mb-2'></i>
                <div class="text-2xl font-bold text-green-700"><?php echo $jumlah_berita; ?></div>
                <div class="text-gray-600">Total Berita</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="zoom-in">
                <i class='bx bx-package text-4xl text-green-600 mb-2'></i>
                <div class="text-2xl font-bold text-green-700"><?php echo $jumlah_produk; ?></div>
                <div class="text-gray-600">Total Produk UMKM</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="zoom-in">
                <i class='bx bx-map-pin text-4xl text-green-600 mb-2'></i>
                <div class="text-2xl font-bold text-green-700"><?php echo $jumlah_wisata; ?></div>
                <div class="text-gray-600">Total Wisata</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="zoom-in">
                <i class='bx bx-user text-4xl text-green-600 mb-2'></i>
                <div class="text-2xl font-bold text-green-700"><?php echo $jumlah_user; ?></div>
                <div class="text-gray-600">Total User</div>
            </div>
        </div>

        <div class="mb-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                <h2 class="text-xl font-bold text-green-700">Statistik Perkembangan Data</h2>
                <select id="filterWaktu" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="bulan">Per Bulan</option>
                    <option value="tahun">Per Tahun</option>
                </select>
            </div>
            <canvas id="statsChart" height="100"></canvas>
        </div>
    </div>
    <script>AOS.init();</script>
    <script>
const dataStat = {
    bulan: {
        labels: <?php echo json_encode($berita_bulan['labels']); ?>,
        berita: <?php echo json_encode($berita_bulan['data']); ?>,
        produk: <?php echo json_encode($produk_bulan['data']); ?>,
        wisata: <?php echo json_encode($wisata_bulan['data']); ?>,
        user: <?php echo json_encode($user_bulan['data']); ?>,
    },
    tahun: {
        labels: <?php echo json_encode($berita_tahun['labels']); ?>,
        berita: <?php echo json_encode($berita_tahun['data']); ?>,
        produk: <?php echo json_encode($produk_tahun['data']); ?>,
        wisata: <?php echo json_encode($wisata_tahun['data']); ?>,
        user: <?php echo json_encode($user_tahun['data']); ?>,
    }
};

const ctx = document.getElementById('statsChart').getContext('2d');
let statsChart = null;

function renderChart(filter) {
    const d = dataStat[filter];
    if (statsChart) statsChart.destroy();
    statsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: d.labels,
            datasets: [
                {
                    label: 'Berita',
                    data: d.berita,
                    backgroundColor: '#16a34a',
                },
                {
                    label: 'Produk',
                    data: d.produk,
                    backgroundColor: '#2563eb',
                },
                {
                    label: 'Wisata',
                    data: d.wisata,
                    backgroundColor: '#f59e42',
                },
                {
                    label: 'User',
                    data: d.user,
                    backgroundColor: '#a21caf',
                },
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: false }
            },
            interaction: { mode: 'index', intersect: false },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
}

document.getElementById('filterWaktu').addEventListener('change', function() {
    renderChart(this.value);
});
renderChart('bulan');
    </script>
</body>
</html>
