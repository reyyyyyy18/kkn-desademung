<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Desa</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>
<body class="bg-gray-50">
<?php include 'koneksi.php'; ?>
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center gap-3">
                <img src="logo.svg" alt="Logo Desa Demung" class="h-12 w-12 rounded-full">
                <a href="#" class="text-2xl font-bold text-green-700">Desa Demung</a>
            </div>
            <nav class="hidden md:flex gap-6 items-center" id="navbar">
                <a href="home.php" class="text-green-700 font-semibold">Beranda</a>
                <div class="relative group">
                    <a href="#" class="flex items-center gap-1">Profil Desa <i class='bx bx-chevron-down'></i></a>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
                        <a href="sejarah.html" class="block px-4 py-2 hover:bg-gray-100">Sejarah Desa</a>
                        <a href="visi.html" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                        <a href="perangkat.php" class="block px-4 py-2 hover:bg-gray-100">Perangkat Desa</a>
                    </div>
                </div>
                <a href="potensi.php">Potensi Desa</a>
                <a href="berita.php" class="text-green-700 font-semibold">Berita</a>
                <a href="kontak.html">Kontak</a>
            </nav>
        </div>
    </header>
    <section class="py-16 bg-green-50 min-h-screen">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-green-700 mb-2 text-center">Daftar Berita Terbaru</h1>
            <h6 class="text-lg text-gray-600 mb-8 text-center">Daftar Berita Desa Terbaru</h6>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                $berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
                if ($berita && mysqli_num_rows($berita) > 0):
                    while ($row = mysqli_fetch_assoc($berita)):
                ?>
                <a href="detail_berita.php?id=<?= $row['id'] ?>" class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    <?php if ($row['gambar']) echo '<img src="admin/' . htmlspecialchars($row['gambar']) . '" class="w-full h-48 object-cover">'; ?>
                    <div class="p-5">
                        <h2 class="text-xl font-bold text-green-700 mb-2 text-center"><?= htmlspecialchars($row['judul']) ?></h2>
                    </div>
                </a>
                <?php endwhile; else: ?>
                <p class="col-span-3 text-center text-gray-500">Tidak ada berita ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>
</html>