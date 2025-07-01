<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Desa Demung</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
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
                    <button type="button" id="profilDropdownBtn" class="text-green-700 font-semibold" class="flex items-center gap-1 w-full md:w-auto py-2 md:py-0 focus:outline-none" aria-expanded="false">
                        Profil Desa <i id="chevronIcon" class='bx bx-chevron-down transition-transform duration-200'></i>
                    </button>
                    <div id="profilDropdown" class="absolute md:absolute left-0 md:mt-2 mt-1 w-11/12 md:w-48 bg-white rounded shadow-lg opacity-0 pointer-events-none transition z-20 border border-gray-100 md:border-none mx-auto md:mx-0" style="right:0;left:0;">
                        <a href="sejarah.php" class="block px-4 py-2 hover:bg-gray-100 text-green-700 font-semibold">Sejarah Desa</a>
                        <a href="visi.php" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                        <a href="perangkat.php" class="block px-4 py-2 hover:bg-gray-100">Perangkat Desa</a>
                    </div>
                </div>
                <a href="potensi.php">Potensi Desa</a>
                <a href="berita.php">Berita</a>
                <a href="kontak.php">Kontak</a>
                <a href="admin/login.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
            <!-- Overlay for mobile -->
            <div id="navbar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>
        </div>
    </header>

    <section class="py-16 bg-green-50 min-h-screen">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Sejarah Desa Demung</h1>
            <div class="bg-white rounded-lg shadow p-8 max-w-3xl mx-auto">
                <p class="text-gray-700 leading-relaxed text-lg">
                    Bermula dari hijrahnya Raden Abdurrahman Murobroto dari Pamekasan,
                    Madura, pada tanggal 10 Asyura 1164 Hijriah atau tahun 1743 Masehi ke Desa Demung.
                    Beliau adalah cucu dari Raden Abdullah Surowikromo yang masih merupakan keluarga Keraton Mataram, Susuhunan Pakubuwana II.
                    Keputusan hijrah ini diambil karena wilayah Tanjung Jambul, Pamekasan, mengalami nimur kara atau kemarau panjang yang menyengsarakan rakyat.
                </p>

                <p class="text-gray-700 leading-relaxed text-lg mt-4">
                    Pada waktu itu, Raden Wino Broto memutuskan untuk hijrah ke tengah Pulau
                    Jawa, mengarungi lautan menggunakan proco demi mencari tanah baru untuk
                    bercocok tanam. Akhirnya, beliau tiba di Desa Demung yang dahulu dikenal
                    dengan nama Nambhekor, berasal dari kata nambhe yang berarti berlabuh. Di
                    sana, beliau mulai membuka hutan dan membangun sebuah gubuk yang dikenal
                    dengan nama Tujuk Setacam di Dusun Demung Barat, serta membuka lahan pertanian.
                </p>

                <p class="text-gray-700 leading-relaxed text-lg mt-4">
                    Berkat kerja keras tanpa mengenal putus asa, hasil panen Wino Broto melimpah ruah.
                    Dalam catatan sejarah, Desa Demung merupakan hasil penyatuan dari empat desa. Pada
                    tahun 1927, perangkat desa pertama kali diangkat, yaitu Raden Siniwi Joyo.
                </p>

                <p class="text-gray-700 leading-relaxed text-lg mt-4">
                    Berdasarkan Monografi Desa Demung tahun 2020, jumlah penduduk mencapai 4.700,28 jiwa,
                    yang terbagi ke dalam empat dusun, yaitu: Dusun Ketah, Dusun Demung Barat, Dusun Semiring, dan Dusun Watuketu.
                </p>

                <p class="text-gray-700 leading-relaxed text-lg mt-4">
                    Hingga saat ini, sektor pertanian masih menjadi penunjang utama perekonomian masyarakat
                    Desa Demung. Sekitar 60% warga bermata pencaharian sebagai petani, dengan lahan pertanian
                    seluas 262.388 hektare dan lahan perkebunan seluas 5.584 hektare. Selain bertani, sebagian
                    masyarakat juga bekerja sebagai nelayan, karena letak Desa Demung berada di pesisir selatan
                    Pantai Selat Madura.
                </p>
            </div>
        </div>
    </section>
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
    </script>


</body>

</html>
