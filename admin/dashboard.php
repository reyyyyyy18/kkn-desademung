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
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="?page=berita">Berita</a></li>
            <li><a href="?page=anggota">Anggota</a></li>
            <li><a href="?page=produk">Produk</a></li>
            <li><a href="?page=wisata">Wisata</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <?php
        if ($page === 'berita') {
            include 'berita_crud.php';
        } elseif ($page === 'anggota') {
            include 'anggota_crud.php';
        } elseif ($page === 'produk') {
            include 'produk_crud.php';
        } elseif ($page === 'wisata') {
            include 'wisata_crud.php';
        }
        ?>
    </div>
</body>
</html>
