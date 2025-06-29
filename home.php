<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Desa Demung</title>
    <link rel="stylesheet" href="home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>

<body class="bg-gray-50">
    <header class="header bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center gap-3">
                <img src="logo.svg" alt="Logo Desa Demung" class="h-12 w-12 rounded-full">
                <a href="#" class="logo text-2xl font-bold text-green-700">Desa Demung</a>
            </div>
            <button data-collapse-toggle="navbar" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none"
                aria-controls="navbar" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <i class='bx bx-menu text-2xl'></i>
            </button>
            <nav class="hidden md:flex gap-6 items-center" id="navbar">
                <a href="home.php" class="text-green-700 font-semibold">Beranda</a>
                <div class="relative group">
                    <a href="#" class="flex items-center gap-1">Profil Desa <i class='bx bx-chevron-down'></i></a>
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
                        <a href="sejarah.html" class="block px-4 py-2 hover:bg-gray-100">Sejarah Desa</a>
                        <a href="visi.html" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                        <a href="perangkat.php" class="block px-4 py-2 hover:bg-gray-100">Perangkat Desa</a>
                    </div>
                </div>
                <a href="potensi.php">Potensi Desa</a>
                <a href="berita.php">Berita</a>
                <a href="kontak.html">Kontak</a>
                <a href="admin/login.php"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
        </div>
    </header>
    <!-- Home Section dengan Carousel Background -->
    <section class="py-16 relative overflow-hidden">
        <!-- Carousel Background -->
        <div id="carousel-bg" class="absolute inset-0 w-full h-full z-0">
            <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-full overflow-hidden rounded-lg">
                    <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                        <img src="https://mercusuar.co/wp-content/uploads/2023/11/pengertian-Desa-dan-Pedesaan.jpg" class="absolute block w-full h-full object-cover object-center opacity-60"
                            alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                        <img src="https://www.simpeldesa.com/blog/wp-content/uploads/2020/07/musyawarah-desa.jpg" class="absolute block w-full h-full object-cover object-center opacity-60"
                            alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                        <img src="https://www.djkn.kemenkeu.go.id/files/images/2020/12/desa1.png" class="absolute block w-full h-full object-cover object-center opacity-60"
                            alt="...">
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-10 px-6 relative z-10">
            <div class="Home-content max-w-xl bg-white/80 rounded-lg p-8 shadow-lg">
                <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-4">Selamat Datang di Website Resmi</h1>
                <h2 class="text-3xl font-semibold text-green-600 mb-4">Desa Demung</h2>
                <p class="mb-2 text-gray-700">Desa Demung adalah desa yang kaya akan budaya, potensi alam, dan semangat
                    gotong royong masyarakatnya.</p>
                <p class="mb-6 text-gray-700">Mari bersama-sama membangun desa yang lebih maju, mandiri, dan sejahtera.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-2xl text-gray-600 hover:text-green-600"><i class='bx bxl-tiktok'></i></a>
                    <a href="#" class="text-2xl text-gray-600 hover:text-green-600"><i class='bx bxl-instagram'></i>
                    </a>
                </div>
            </div>
            <img src="logo.svg" alt="Logo Desa Demung"
                class="w-64 h-64 object-contain rounded-full shadow-lg border-4 border-green-200 bg-white/80">
        </div>
    </section>
    <!-- Section Layanan Desa -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-green-700 mb-8 text-center">Layanan Desa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center">
                    <i class="bx bxs-id-card text-6xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Administrasi Kependudukan</h3>
                    <p class="text-gray-600 text-center">Pembuatan KTP, KK, Akta Kelahiran, Akta Kematian, Pindah Datang/Keluar.</p>
                </div>
                <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center">
                    <i class="bx bxs-file-doc text-6xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Pembuatan Surat Keterangan</h3>
                    <p class="text-gray-600 text-center">Surat Keterangan Domisili, Usaha, Tidak Mampu, Tanah, dan lainnya.</p>
                </div>
                <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center">
                    <i class="bx bxs-building-house text-6xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Administrasi Kantor Desa</h3>
                    <p class="text-gray-600 text-center">Pengelolaan surat masuk/keluar, keuangan desa, arsip, laporan, dan perencanaan.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Berita Terbaru -->
    <section class="py-16 bg-green-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-green-700 mb-8 text-center">Berita Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                include 'koneksi.php';
                $berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC LIMIT 3");
                while ($row = mysqli_fetch_assoc($berita)):
                ?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <?php if ($row['gambar']) echo '<a href="detail_berita.php?id=' . $row['id'] . '"><img class="rounded-t-lg w-full h-48 object-cover" src="admin/' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['judul']) . '" /></a>'; ?>
                    <div class="p-5 flex flex-col">
                        <a href="detail_berita.php?id=<?= $row['id'] ?>">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-green-600 text-left"><?= htmlspecialchars($row['judul']) ?></h5>
                        </a>
                        <a href="detail_berita.php?id=<?= $row['id'] ?>" class="mt-auto inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Baca Selengkapnya</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-green-700 text-white py-8 mt-12">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span class="font-bold">Desa Demung</span> &copy; <?= date('Y') ?>. All rights reserved.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-green-200"><i class='bx bxl-tiktok'></i></a>
                <a href="#" class="hover:text-green-200"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
    <script>
        // Aktifkan carousel Flowbite
        document.addEventListener('DOMContentLoaded', function() {
            if (window.Flowbite && window.Flowbite.Carousel) {
                new Flowbite.Carousel(document.getElementById('default-carousel'), {
                    interval: 3000,
                    indicators: false,
                    pauseOnHover: false,
                    ride: 'carousel'
                });
            }
        });
    </script>
</body>

</html>
