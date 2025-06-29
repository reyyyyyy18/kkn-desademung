<?php
// koneksi.php
$host = 'localhost';
$user = 'root'; // Ganti jika username database berbeda
$pass = '';    // Ganti jika ada password database
$db   = 'desademung';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}
?>
