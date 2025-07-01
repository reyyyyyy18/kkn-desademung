<?php
session_start();
include '../koneksi.php';
if (isset($_SESSION['admin'])) {
    header('Location: dashboard.php');
    exit();
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['admin'] = $row['username'];
        $session_id = session_id();
        mysqli_query($conn, "UPDATE user SET session_admin='$session_id' WHERE id=" . $row['id']);
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>
<body>

    <header class="header bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center gap-3">
                <img src="../logo.svg" alt="Logo Desa Demung" class="h-12 w-12 rounded-full">
                <a href="../home.php" class="logo text-2xl font-bold text-green-700">Desa Demung</a>
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
                <a href="../home.php">Beranda</a>
                <div class="relative group w-full md:w-auto">
                    <button type="button" id="profilDropdownBtn" class="flex items-center gap-1 w-full md:w-auto py-2 md:py-0 focus:outline-none" aria-expanded="false">
                        Profil Desa
                        <span class="ml-1 flex items-center">
                            <svg id="chevronIcon" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </button>
                    <div id="profilDropdown" class="absolute md:absolute left-0 md:mt-2 mt-1 w-11/12 md:w-48 bg-white rounded shadow-lg opacity-0 pointer-events-none transition z-20 border border-gray-100 md:border-none mx-auto md:mx-0" style="right:0;left:0;">
                        <a href="../sejarah.html" class="block px-4 py-2 hover:bg-gray-100">Sejarah Desa</a>
                        <a href="../visi.html" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                        <a href="../perangkat.php" class="block px-4 py-2 hover:bg-gray-100">Perangkat Desa</a>
                    </div>
                </div>
                <a href="../potensi.php">Potensi Desa</a>
                <a href="../berita.php">Berita</a>
                <a href="../kontak.html">Kontak</a>
                <a href="login.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
            <!-- Overlay for mobile -->
            <div id="navbar-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden md:hidden"></div>
        </div>
    </header>
    
    <div class="flex justify-center items-center min-h-[60vh] px-2">
        <div class="login-container w-full max-w-sm bg-white rounded-lg shadow-lg p-8 mt-8">
            <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Login Admin</h2>
            <?php if ($error) echo '<p class="error text-red-600 text-center mb-4">'.$error.'</p>'; ?>
            <form method="post" class="relative">
                <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"><br>
                <input type="password" name="password" id="passwordInput" placeholder="Password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"><br>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold transition">Login</button>
            </form>
        </div>
    </div>

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
