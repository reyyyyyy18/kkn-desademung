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
$berita_lain = mysqli_query($conn, "SELECT id, judul, gambar FROM berita WHERE id != $id ORDER BY id DESC LIMIT 5");
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
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center gap-3">
                <img src="logo.svg" alt="Logo Desa Demung" class="h-12 w-12 rounded-full">
                <a href="index.php" class="text-2xl font-bold text-green-700">Desa Demung</a>
            </div>
            <nav class="hidden md:flex gap-6 items-center" id="navbar">
                <a href="index.php" class="text-green-700 font-semibold">Beranda</a>
                <div class="relative group">
                    <a href="#" class="flex items-center gap-1">Profil Desa <i class='bx bx-chevron-down'></i></a>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
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
        </div>
    </header>
    <main class="container mx-auto px-6 py-10 flex flex-col md:flex-row gap-10">
        <div class="main-detail flex-1 bg-white rounded-lg shadow p-8">
            <?php if ($berita['gambar']) echo '<img src="admin/' . htmlspecialchars($berita['gambar']) . '" class="w-full max-w-lg mx-auto rounded mb-6">'; ?>
            <h1 class="text-3xl font-bold text-green-700 mb-4"><?= htmlspecialchars($berita['judul']) ?></h1>
            <div class="text-gray-700 text-lg leading-relaxed">
                <?= nl2br(htmlspecialchars($berita['isi'])) ?>
            </div>
        </div>
        <aside class="rightbar w-full md:w-80 bg-green-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-bold text-green-700 mb-4">Berita Lainnya</h3>
            <?php while ($row = mysqli_fetch_assoc($berita_lain)): ?>
            <div class="flex items-center gap-4 mb-6 border-b pb-4">
                <a href="detail_berita.php?id=<?= $row['id'] ?>" class="flex items-center gap-3 hover:bg-green-100 rounded p-2 w-full">
                    <?php if ($row['gambar']) echo '<img src="admin/' . htmlspecialchars($row['gambar']) . '" class="w-16 h-12 object-cover rounded">'; ?>
                    <div class="text-green-800 font-semibold text-base"><?= htmlspecialchars($row['judul']) ?></div>
                </a>
            </div>
            <?php endwhile; ?>
        </aside>
    </main>
</body>
</html>
