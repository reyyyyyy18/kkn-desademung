<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
$page = isset($_GET['page']) ? $_GET['page'] : 'berita';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Responsive Navbar -->
    <nav class="bg-green-700 text-white px-4 py-3 flex items-center justify-between md:hidden">
        <div class="font-bold text-lg">Admin Panel</div>
        <button id="adminNavToggle" class="focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </nav>
    <!-- Sidebar (desktop) & Mobile Menu -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="hidden md:block bg-green-700 text-white w-56 min-h-screen px-4 py-6">
            <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
            <ul class="space-y-2 font-semibold">
                <li><a href="?page=user" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'user' ? 'bg-green-800' : '' ?>">User</a></li>               
                <li><a href="?page=berita" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'berita' ? 'bg-green-800' : '' ?>">Berita</a></li>
                <li><a href="?page=anggota" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'anggota' ? 'bg-green-800' : '' ?>">Anggota</a></li>
                <li><a href="?page=produk" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'produk' ? 'bg-green-800' : '' ?>">Produk</a></li>
                <li><a href="?page=wisata" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'wisata' ? 'bg-green-800' : '' ?>">Wisata</a></li>
                <li><a href="logout.php" class="block py-2 px-3 rounded hover:bg-red-700 text-red-200">Logout</a></li>
            </ul>
        </aside>
        <!-- Mobile Menu -->
        <ul id="adminNavMobile" class="md:hidden fixed top-0 left-0 w-3/4 max-w-xs h-full bg-green-700 text-white z-40 px-6 py-8 space-y-3 transform -translate-x-full transition-transform duration-200">
            <li><a href="?page=user" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'user' ? 'bg-green-800' : '' ?>">User</a></li>            
            <li><a href="?page=berita" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'berita' ? 'bg-green-800' : '' ?>">Berita</a></li>
            <li><a href="?page=anggota" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'anggota' ? 'bg-green-800' : '' ?>">Anggota</a></li>
            <li><a href="?page=produk" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'produk' ? 'bg-green-800' : '' ?>">Produk</a></li>
            <li><a href="?page=wisata" class="block py-2 px-3 rounded hover:bg-green-800 <?= $page === 'wisata' ? 'bg-green-800' : '' ?>">Wisata</a></li>
            <li><a href="logout.php" class="block py-2 px-3 rounded hover:bg-red-700 text-red-200">Logout</a></li>
        </ul>
        <!-- Overlay for mobile menu -->
        <div id="adminNavOverlay" class="md:hidden fixed inset-0 bg-black bg-opacity-40 z-30 hidden"></div>
        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8">
            <?php
            if ($page === 'user') {
                include 'user_crud.php';          
            } elseif ($page === 'berita') {
                include 'berita_crud.php';
            } elseif ($page === 'anggota') {
                include 'anggota_crud.php';
            } elseif ($page === 'produk') {
                include 'produk_crud.php';
            } elseif ($page === 'wisata') {
                include 'wisata_crud.php';
            }
            ?>
        </main>
    </div>
    <script>
    // Hamburger menu logic
    const navToggle = document.getElementById('adminNavToggle');
    const navMobile = document.getElementById('adminNavMobile');
    const navOverlay = document.getElementById('adminNavOverlay');
    navToggle && navToggle.addEventListener('click', () => {
        navMobile.classList.toggle('-translate-x-full');
        navOverlay.classList.toggle('hidden');
    });
    navOverlay && navOverlay.addEventListener('click', () => {
        navMobile.classList.add('-translate-x-full');
        navOverlay.classList.add('hidden');
    });
    // Close mobile menu on link click
    navMobile && navMobile.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navMobile.classList.add('-translate-x-full');
            navOverlay.classList.add('hidden');
        });
    });
    </script>
</body>
</html>
