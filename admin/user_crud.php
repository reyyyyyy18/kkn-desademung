<?php
include '../koneksi.php';
// Handle tambah, edit, hapus user
if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $sql = "INSERT INTO user (username, password, nama) VALUES ('$username', '$password', '$nama')";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=user');
    exit();
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM user WHERE id=$id");
    header('Location: dashboard.php?page=user');
    exit();
}
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $sql = "UPDATE user SET username='$username', password='$password', nama='$nama' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: dashboard.php?page=user');
    exit();
}
$user = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
?>

<!-- Tailwind CDN (letakkan di <head> layout utama jika belum ada) -->
<!-- <script src="https://cdn.tailwindcss.com"></script> -->

<div class="max-w-6xl mx-auto mt-8">
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Form User -->
        <div>
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-green-700 border-b pb-2">
                    <?= $edit ? 'Edit User' : 'Tambah User' ?>
                </h2>
                <form method="post" class="space-y-4">
                    <?php if ($edit): ?>
                        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                    <?php endif; ?>
                    <div>
                        <label class="block text-gray-700 mb-1">Username</label>
                        <input type="text" name="username" class="w-full border rounded px-3 py-2 focus:outline-blue-400" required value="<?= $edit ? htmlspecialchars($edit['username']) : '' ?>">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Password</label>
                        <input type="text" name="password" class="w-full border rounded px-3 py-2 focus:outline-blue-400" required value="<?= $edit ? htmlspecialchars($edit['password']) : '' ?>">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" class="w-full border rounded px-3 py-2 focus:outline-blue-400" required value="<?= $edit ? htmlspecialchars($edit['nama']) : '' ?>">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" name="<?= $edit ? 'update' : 'tambah' ?>" class="bg-green-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                            <?= $edit ? 'Update' : 'Tambah' ?>
                        </button>
                        <?php if ($edit): ?>
                            <a href="dashboard.php?page=user" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded shadow">Batal</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
        <!-- Tabel User -->
        <div>
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-green-700 border-b pb-2">Daftar User</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-3 border">No</th>
                                <th class="py-2 px-3 border">Username</th>
                                <th class="py-2 px-3 border">Nama</th>
                                <th class="py-2 px-3 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($user as $row): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-3 border text-center"><?= $no++ ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['username']) ?></td>
                                <td class="py-2 px-3 border"><?= htmlspecialchars($row['nama']) ?></td>
                                <td class="py-2 px-3 border text-center">
                                    <a href="dashboard.php?page=user&edit=<?= $row['id'] ?>" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs mr-1">Edit</a>
                                    <a href="dashboard.php?page=user&hapus=<?= $row['id'] ?>" class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs" onclick="return confirm('Hapus user ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php if (mysqli_num_rows($user) == 0): ?>
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-400">Belum ada user.</td>
                            </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>