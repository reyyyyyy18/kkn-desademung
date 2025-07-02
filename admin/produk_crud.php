<?php
include '../koneksi.php';
// Handle tambah, edit, hapus produk
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $nomor_wa = $_POST['nomor_wa'];
    $foto = '';
    if ($_FILES['foto']['name']) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $sql = "INSERT INTO produk (nama, foto, alamat, deskripsi, nomor_wa) VALUES ('$nama', '$foto', '$alamat', '$deskripsi', '$nomor_wa')";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=produk');
    exit();
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
    header('Location: dashboard.php?page=produk');
    exit();
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $nomor_wa = $_POST['nomor_wa'];
    $foto = $_POST['foto_lama'];
    if ($_FILES['foto']['name']) {
        $foto = 'uploads/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }
    $sql = "UPDATE produk SET nama='$nama', foto='$foto', alamat='$alamat', deskripsi='$deskripsi', nomor_wa='$nomor_wa' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=produk');
    exit();
}
$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>
<div class="max-w-3xl mx-auto py-6">
    <h2 class="text-2xl font-bold text-green-700 mb-6">CRUD Produk</h2>
    <form method="post" enctype="multipart/form-data" class="bg-white rounded shadow p-4 mb-8 space-y-4">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        <input type="hidden" name="foto_lama" value="<?= $edit['foto'] ?? '' ?>">
        <div>
            <label class="block mb-1 font-semibold">Foto</label>
            <input type="file" name="foto" accept="image/*" class="block w-full text-sm">
            <?php if (!empty($edit['foto'])): ?>
                <img src="<?= $edit['foto'] ?>" alt="Foto" class="w-24 mt-2 rounded">
            <?php endif; ?>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Nama Produk</label>
            <input type="text" name="nama" placeholder="Nama Produk" value="<?= $edit['nama'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div></div>
            <label class="block mb-1 font-semibold">Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat" value="<?= $edit['alamat'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
        <div>
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="deskripsi" placeholder="Deskripsi" required class="w-full border rounded px-3 py-2 min-h-[80px]"><?= $edit['deskripsi'] ?? '' ?></textarea>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Nomor WA</label>
            <input type="text" name="nomor_wa" placeholder="Nomor WA Contoh( 62822987578 )" value="<?= $edit['nomor_wa'] ?? '' ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <button type="submit" name="<?= $edit ? 'update' : 'tambah' ?>" class="bg-green-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                <?= $edit ? 'Update' : 'Tambah' ?>
            </button>
                <?php if ($edit): ?>
                    <a href="dashboard.php?page=produk" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">Batal</a>
                <?php endif; ?>
        </div>
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow text-sm">
            <thead>
                <tr class="bg-green-100 text-green-800">
                    <th class="py-2 px-4">Foto</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Alamat</th>
                    <th class="py-2 px-4">Deskripsi</th>
                    <th class="py-2 px-4">Nomor WA</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($produk)): ?>
                <tr class="border-b">
                    <td class="py-2 px-4 text-center">
                        <?php if (!empty($row['foto'])): ?>
                            <img src="<?= $row['foto'] ?>" class="w-16 h-16 object-cover rounded mx-auto">
                        <?php endif; ?>
                    </td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['nama']) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['alamat']) ?></td>
                    <td class="py-2 px-4 max-w-xs break-words"><?= htmlspecialchars($row['deskripsi']) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($row['nomor_wa']) ?></td>
                    <td class="py-2 px-4">
                        <a href="?page=produk&edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="?page=produk&hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')" class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
