<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Desa Demung</title>
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
                <a href="berita.php">Berita</a>
                <a href="kontak.php" class="text-green-700 font-semibold">Kontak</a>
                <a href="admin/login.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
            <!-- Overlay for mobile -->
            <div id="navbar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>
        </div>
    </header>

    <section class="py-16 bg-green-50 min-h-screen" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Kontak & Lapor Desa Demung</h1>
        <div class="w-full mx-auto bg-white rounded-lg shadow p-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Form Elapor -->
            <div data-aos="fade-right">
                <h6 class="text-green-700 font-bold text-2xl py-4">E-LAPOR</h6>
                <form action="admin/proses_elapor.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-green-700">Nama Pelapor</label>
                        <input type="text" name="nama_pelapor" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Nama Anda">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-green-700">Foto Laporan</label>
                        <input type="file" name="foto_laporan" accept="image/*" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-green-700">Deskripsi</label>
                        <textarea name="deskripsi" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            rows="5" placeholder="Tulis laporan Anda..."></textarea>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 w-full">Kirim Laporan</button>
                </form>
            </div>
            <div data-aos="fade-left">
                <h6 class="text-green-700 font-bold text-2xl py-4">HUBUNGI KAMI</h6>
                <form onsubmit="return sendToWA(event)" class="justify-items-stretch">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-green-700">Nama</label>
                        <input type="text" id="nama" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Nama Anda">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-green-700">Email</label>
                        <input type="email" id="email" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Email Anda">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-green-700">Pesan</label>
                        <textarea id="pesan" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                            rows="5" placeholder="Tulis pesan Anda..."></textarea>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 w-full">Kirim Pesan</button>
                </form>
                <script>
                    function sendToWA(e) {
                        e.preventDefault();
                        var nama = document.getElementById('nama').value;
                        var email = document.getElementById('email').value;
                        var pesan = document.getElementById('pesan').value;
                        var no_wa = '6282322396666'; 
                        var text = `Assalamualaikum, Saya ${nama} (${email}).%0A${pesan}`;
                        var url = `https://wa.me/${no_wa}?text=${text}`;
                        window.open(url, '_blank');
                        return false;
                    }
                </script>
            </div>
            
        </div>
        <!-- Google Maps di bawah -->
        <div class="w-full h-80 md:h-96 rounded-lg overflow-hidden shadow mt-12 transition hover:scale-105 hover:shadow-lg" data-aos="fade-up">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.590687550191!2d113.7094277735794!3d-7.726987576570314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd71efcd20d6b39%3A0xc35e4f85077c7e7d!2sKantor%20Kepala%20Desa%20Demung!5e0!3m2!1sid!2sid!4v1751357868733!5m2!1sid!2sid" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="transition hover:scale-105 hover:shadow-lg w-full py-4 bg-white gap-8" data-aos="fade-left">
                <div class="mb-8 text-center text-gray-600 gap-8">
                    <div class="items-center gap-8">
                        <span><i class='bx bx-map text-xl'></i> Alamat: Jl. Desa Demung No. 1, Kecamatan Besuki</span>
                        <span><i class='bx bx-phone text-xl'></i> Telepon: 0812-3456-7890</span>
                        <span><i class='bx bx-envelope text-xl'></i> Email: info@desademung.id</span>
                    </div>
                </div>
            </div>
        </div>
</section>
<footer class="bg-green-700 text-white py-8 mt-12">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span class="font-bold">Desa Demung</span> &copy; <?= date('Y') ?>. KKN UNIVERSITAS NURUL JADID 25.
            </div>
            <div class="flex gap-4">
                <a href="https://www.tiktok.com/@pemdes.demung?_t=ZS-8xjZ94umTDu&_r=1" class="hover:text-green-200"><i class='bx bxl-tiktok'></i></a>
                <a href="https://www.instagram.com/demung_creative?igsh=MTZtc2pjdDM0bHpnYQ==" class="hover:text-green-200"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </footer>
</body>

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

</html>
