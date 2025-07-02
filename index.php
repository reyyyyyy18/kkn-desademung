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
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
    <!-- Tambahkan di dalam <head> -->
        <style>
            .logo-shine {
            position: relative;
            overflow: hidden;
            }
            .logo-shine::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(120deg, rgba(255,255,255,0) 40%, rgba(255,255,255,0.6) 50%, rgba(255,255,255,0) 60%);
            transform: rotate(25deg);
            animation: shine 2.5s infinite;
            pointer-events: none;
            }
            @keyframes shine {
            0% {
                transform: translateX(-100%) rotate(25deg);
            }
            60% {
                transform: translateX(120%) rotate(25deg);
            }
            100% {
                transform: translateX(120%) rotate(25deg);
            }
            }
        </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
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
                <a href="index.php" class="text-green-700 font-semibold">Beranda</a>
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
                <a href="berita.php">Berita</a>
                <a href="kontak.php">Kontak</a>
                <a href="admin/login.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
            <!-- Overlay for mobile -->
            <div id="navbar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>
        </div>
    </header>
    <!-- Home Section dengan Carousel Background -->
    <section class="py-16 relative overflow-hidden" data-aos="fade-up">
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
            <div class="flex items-center gap-3">
            <div class="h-96 rounded-full relative overflow-hidden logo-shine border-2 border-green-200 bg-white/80 shadow-lg flex items-center justify-center">
                <img src="logo.svg" alt="Logo Desa Demung" class="h-96 object-contain" />
            </div>
</div>
            
        </div>
    </section>
    <!-- Section Layanan Desa -->
    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-green-700 mb-8 text-center">Layanan Desa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="flip-up">
                    <i class="bx bxs-id-card text-6xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Administrasi Kependudukan</h3>
                    <p class="text-gray-600 text-center">Pembuatan KTP, KK, Akta Kelahiran, Akta Kematian, Pindah Datang/Keluar.</p>
                </div>
                <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="flip-up">
                    <i class="bx bxs-file-doc text-6xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Pembuatan Surat Keterangan</h3>
                    <p class="text-gray-600 text-center">Surat Keterangan Domisili, Usaha, Tidak Mampu, Tanah, dan lainnya.</p>
                </div>
                <div class="bg-green-50 rounded-lg shadow p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-lg" data-aos="flip-up">
                    <i class="bx bxs-building-house text-6xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Administrasi Kantor Desa</h3>
                    <p class="text-gray-600 text-center">Pengelolaan surat masuk/keluar, keuangan desa, arsip, laporan, dan perencanaan.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Berita Terbaru -->
    <section class="py-16 bg-green-50" data-aos="fade-up">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-green-700 mb-8 text-center">Berita Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                include 'koneksi.php';
                $berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC LIMIT 3");
                while ($row = mysqli_fetch_assoc($berita)):
                ?>
                <div class="bg-white border border-gray-200 rounded-lg shadow transition hover:scale-105 hover:shadow-lg">
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
                <span class="font-bold">Desa Demung</span> &copy; <?= date('Y') ?>. KKN UNIVERSITAS NURUL JADID 25.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-green-200"><i class='bx bxl-tiktok'></i></a>
                <a href="#" class="hover:text-green-200"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
    <script>
        AOS.init();
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
