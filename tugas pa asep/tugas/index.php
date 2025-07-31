<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'select_db.php'; ?>
    <meta charset="UTF-8">
    <title>Kelola User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <img src="placeholder.png" alt="Admin">
            <h2>Admin</h2>
            <button>Kelola User</button>
            <button>Kelola Laporan</button>
            <button>Logout</button>
        </div>
        <div class="main">
            <h1>Kelola User</h1>
            <div class="form-kotak">
                <form method="post" action="tambah_data.php">
                    <label for="tipe">Tipe</label>
                    <input type="text" name="tipe" required placeholder="Masukkan tipe user">

                    <label for="Nama">Nama</label>
                    <input type="text" name="Nama" required placeholder="Masukkan nama">

                    <label for="Alamat">jumlah</label>
                    <input type="text" name="Alamat" required placeholder="Masukkan jumlah">

                    <label for="Telepon">Telepon</label>
                    <input type="text" name="Telepon" required placeholder="Masukkan nomor telepon">

                    <button type="submit" name="submit_btn">Tambah</button>
                </form>
            </div>

            <div class="table-kotak">
                <table>
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Tipe User</th>
                            <th>Nama</th>
                            <th>jumlah</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= ($row['ID']) ?></td>
                                <td><?= ($row['TIPE']) ?></td>
                                <td><?= ($row['NAMA']) ?></td>
                                <td><?= ($row['ALAMAT']) ?></td>
                                <td><?= ($row['TELEPON']) ?></td>
                                <td>
                                    <form method="post" class="delete-form" action="delate_data.php">
                                        <input type="hidden" name="delete_id" value="<?= $row['ID'] ?>">
                                        <button type="button" class="delete-btn">Hapus</button>
                                    </form>
                                    <form method="post" action="edit_data.php">
                                        <input type="hidden" name="edit_id" value="<?= $row['ID'] ?>">
                                        <button type="sumbit" class="btn_edit">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data akan hilang secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        <?php if (isset($_GET['added'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil ditambahkan!',
                showConfirmButton: false,
                timer: 1500
            });
        <?php elseif (isset($_GET['deleted'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Data dihapus!',
                text: 'Data berhasil dihapus dari database!',
                showConfirmButton: false,
                timer: 1500
            });
            <?php elseif (isset($_GET['updated'])): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Diedit!',
                    text: 'Data berhasil diperbarui!',
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php endif; ?>
    </script>
</body>

</html>