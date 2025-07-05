<?php
include 'koneksi.php';
if (!isset($_GET['id'])) {
    echo '<p>Berita tidak ditemukan.</p>';
    exit();
}
$id = intval($_GET['id']);
$detail = mysqli_query($conn, "SELECT * FROM berita WHERE id=$id");
$berita = mysqli_fetch_assoc($detail);
if (!$berita) {
    echo '<p>Berita tidak ditemukan.</p>';
    exit();
}

// Ambil berita lain, jika kosong tampilkan semua berita
$berita_lain = mysqli_query($conn, "SELECT id, judul, gambar FROM berita WHERE id != $id ORDER BY id DESC LIMIT 10");
if (mysqli_num_rows($berita_lain) == 0) {
    $berita_lain = mysqli_query($conn, "SELECT id, judul, gambar FROM berita ORDER BY id DESC LIMIT 10");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($berita['judul']) ?></title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
</head>
<body class="bg-gray-50">
    <header class="header bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center gap-3">
                <img src="logo.svg" alt="Logo Desa Demung" class="h-12 w-12 rounded-full">
                <a href="#" class="logo text-2xl font-bold text-green-700">Desa Demung</a>
            </div>
            <!-- Hamburger -->
            <button id="navbar-toggle" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none"
                aria-controls="navbar" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <i class='bx bx-menu text-2xl'></i>
            </button>
            <!-- Navbar -->
            <nav id="navbar" class="fixed md:static top-0 left-0 w-full md:w-auto h-full md:h-auto bg-white md:bg-transparent flex-col md:flex-row gap-6 items-start md:items-center px-8 md:px-0 py-24 md:py-0 hidden md:flex transition-all z-40 md:z-auto">
                <a href="index.php">Beranda</a>
                <div class="relative group w-full md:w-auto">
                    <button type="button" id="profilDropdownBtn" class="flex items-center gap-1 w-full md:w-auto py-2 md:py-0 focus:outline-none" aria-expanded="false">
                        Profil Desa <i id="chevronIcon" class='bx bx-chevron-down transition-transform duration-200'></i>
                    </button>
                    <div id="profilDropdown" class="absolute md:absolute left-0 md:mt-2 mt-1 w-11/12 md:w-48 bg-white rounded shadow-lg opacity-0 pointer-events-none transition z-20 border border-gray-100 md:border-none mx-auto md:mx-0" style="right:0;left:0;">
                        <a href="sejarah.php" class="block px-4 py-2 hover:bg-gray-100">Sejarah Desa</a>
                        <a href="visi.php" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                        <a href="perangkat.php" class="block px-4 py-2 hover:bg-gray-100">Perangkat Desa</a>
                    </div>
                </div>
                <a href="potensi.php">Potensi Desa</a>
                <a href="berita.php" class="text-green-700 font-semibold">Berita</a>
                <a href="kontak.php">Kontak</a>
                <a href="admin/login.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
            <!-- Overlay for mobile -->
            <div id="navbar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>
        </div>
    </header>
    <main class="container mx-auto px-6 py-10 flex flex-col md:flex-row gap-10">
        <div class="main-detail flex-1 bg-white rounded-lg shadow p-8" data-aos="fade-up">
            <?php if ($berita['gambar']) echo '<img src="admin/' . htmlspecialchars($berita['gambar']) . '" class="w-full max-w-lg mx-auto rounded mb-6">'; ?>
            <h1 class="text-3xl font-bold text-green-700 mb-4"><?= htmlspecialchars($berita['judul']) ?></h1>
            <div class="text-sm text-gray-500 mb-6">
                Dipublikasikan pada <?= date('d M Y H:i', strtotime($berita['created_at'])) ?>
            </div>
            <div class="text-gray-700 text-lg leading-relaxed">
                <?= nl2br(htmlspecialchars($berita['isi'])) ?>
            </div>
        </div>
        <aside class="rightbar w-full md:w-80 bg-green-50 rounded-lg shadow p-6" data-aos="fade-left">
            <h3 class="text-xl font-bold text-green-700 mb-4">Berita Lainnya</h3>
            <div class="flex overflow-x-auto md:block gap-4 md:gap-0 pb-2 md:pb-0 space-x-4 md:space-x-0"
                 style="scroll-padding-left: 8px; scroll-padding-right: 8px; scroll-snap-type: x mandatory;">
                <?php while ($row = mysqli_fetch_assoc($berita_lain)): ?>
                <div class="min-w-[220px] max-w-xs md:w-full bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition hover:scale-105 overflow-hidden flex-shrink-0 md:min-w-0 md:max-w-none mx-auto mb-0 md:mb-6 border-b md:border-b-0 pb-0 md:pb-4"
                     style="scroll-snap-align: center;">
                    <a href="detail_berita.php?id=<?= $row['id'] ?>" class="flex items-center gap-3 hover:bg-green-100 rounded p-2 w-full">
                        <?php if ($row['gambar']) echo '<img src="admin/' . htmlspecialchars($row['gambar']) . '" class="w-16 h-12 object-cover rounded">'; ?>
                        <div class="text-green-800 font-semibold text-base"><?= htmlspecialchars($row['judul']) ?></div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </aside>
    </main>
    <footer class="bg-green-700 text-white py-8 mt-12">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span class="font-bold">Desa Demung</span> &copy; <?= date('Y') ?>. KKN UNIVERSITAS NURUL JADID 25.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-green-200"><i class='bx bxl-tiktok'></i></a>
                <a href="https://www.instagram.com/demung_creative?igsh=MTZtc2pjdDM0bHpnYQ==" class="hover:text-green-200"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </footer>
    <script>

        // Navbar mobile toggle
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbar = document.getElementById('navbar');
        const overlay = document.getElementById('navbar-overlay');

        navbarToggle.addEventListener('click', () => {
            const isOpen = navbar.classList.contains('flex');
            if (!isOpen) {
                navbar.classList.remove('hidden');
                navbar.classList.add('flex');
                overlay.classList.remove('hidden');
            } else {
                navbar.classList.remove('flex');
                navbar.classList.add('hidden');
                overlay.classList.add('hidden');
            }
        });
        overlay.addEventListener('click', () => {
            navbar.classList.remove('flex');
            navbar.classList.add('hidden');
            overlay.classList.add('hidden');
        });
        // Close navbar on link click (mobile)
        navbar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    navbar.classList.remove('flex');
                    navbar.classList.add('hidden');
                    overlay.classList.add('hidden');
                }
            });
        });
        // Dropdown Profil Desa
        const profilBtn = document.getElementById('profilDropdownBtn');
        const profilDropdown = document.getElementById('profilDropdown');
        const chevronIcon = document.getElementById('chevronIcon');
        let dropdownOpen = false;

        function openDropdown() {
            profilDropdown.classList.remove('opacity-0', 'pointer-events-none');
            profilDropdown.classList.add('opacity-100', 'pointer-events-auto');
            chevronIcon.classList.add('rotate-180');
            profilBtn.setAttribute('aria-expanded', 'true');
            dropdownOpen = true;
        }
        function closeDropdown() {
            profilDropdown.classList.add('opacity-0', 'pointer-events-none');
            profilDropdown.classList.remove('opacity-100', 'pointer-events-auto');
            chevronIcon.classList.remove('rotate-180');
            profilBtn.setAttribute('aria-expanded', 'false');
            dropdownOpen = false;
        }
        function toggleDropdown(e) {
            e.stopPropagation();
            dropdownOpen ? closeDropdown() : openDropdown();
        }
        // Event handler universal (mobile & desktop)
        profilBtn.onclick = toggleDropdown;
        chevronIcon.onclick = toggleDropdown;
        // Close dropdown if click outside
        window.addEventListener('click', (e) => {
            if (dropdownOpen && !profilDropdown.contains(e.target) && !profilBtn.contains(e.target)) {
                closeDropdown();
            }
        });
        // Close dropdown after pilih menu
        profilDropdown.querySelectorAll('a').forEach(link => {
            link.onclick = () => {
                closeDropdown();
                if (window.innerWidth < 768) {
                    navbar.classList.remove('flex');
                    navbar.classList.add('hidden');
                    overlay.classList.add('hidden');
                }
            };
        });
        // Responsive: tutup dropdown saat resize
        window.addEventListener('resize', () => {
            closeDropdown();
        });
        
        AOS.init();
    </script>
</body>
</html>
