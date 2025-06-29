<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Potensi Desa Demung</title>
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
        <a href="home.php" class="text-2xl font-bold text-green-700">Desa Demung</a>
      </div>
      <nav class="hidden md:flex gap-6 items-center" id="navbar">
        <a href="home.php">Beranda</a>
        <div class="relative group">
          <a href="#" class="flex items-center gap-1">Profil Desa <i class='bx bx-chevron-down'></i></a>
          <div class="absolute left-0 mt-2 w-48 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto z-10">
            <a href="sejarah.html" class="block px-4 py-2 hover:bg-gray-100">Sejarah Desa</a>
            <a href="visi.html" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
            <a href="perangkat.php" class="block px-4 py-2 hover:bg-gray-100">Perangkat Desa</a>
          </div>
        </div>
        <a href="potensi.php" class="text-green-700 font-semibold">Potensi Desa</a>
        <a href="berita.php">Berita</a>
        <a href="kontak.html">Kontak</a>
      </nav>
    </div>
  </header>
  <section class="py-16 bg-green-50 min-h-screen">
    <div class="container mx-auto px-6">
      <h1 class="text-3xl font-bold text-green-700 mb-8 text-center">Potensi Desa Demung</h1>
      <h2 class="text-2xl font-semibold text-green-600 mb-6">UMKM Unggulan</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <?php 
        $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($produk)):
        ?>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
          <?php if ($row['foto']) echo '<img src="admin/' . htmlspecialchars($row['foto']) . '" alt="' . htmlspecialchars($row['nama']) . '" class="w-24 h-24 object-cover rounded mb-4">'; ?>
          <h3 class="text-lg font-semibold mb-2 text-green-700 text-center"><?= htmlspecialchars($row['nama']) ?></h3>
          <p class="text-gray-600 text-center mb-2"><?= htmlspecialchars($row['deskripsi']) ?></p>
          <a href="https://wa.me/<?= htmlspecialchars($row['nomor_wa']) ?>" target="_blank" class="inline-block bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700"><i class='bx bxl-whatsapp'></i> Hubungi via WA</a>
        </div>
        <?php endwhile; ?>
      </div>
      <h2 class="text-2xl font-semibold text-green-600 mb-6">Wisata Desa</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php 
        $wisata = mysqli_query($conn, "SELECT * FROM wisata ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($wisata)):
        ?>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
          <?php if ($row['foto']) echo '<img src="admin/' . htmlspecialchars($row['foto']) . '" alt="' . htmlspecialchars($row['nama']) . '" class="w-24 h-24 object-cover rounded mb-4">'; ?>
          <h3 class="text-lg font-semibold mb-2 text-green-700 text-center"><?= htmlspecialchars($row['nama']) ?></h3>
          <p class="text-gray-600 text-center mb-2"><?= htmlspecialchars($row['deskripsi']) ?></p>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
</body>

</html>
