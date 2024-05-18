<section class="content-header">

    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Data Akun User</b>
            </a>
        </li>
    </ol>
</section>
<style>
    .hide-admin {
        display: none;
    }
</style>
<!-- Main content -->
<section class="content">
<div class="card card-primary">
        <div class="card-body">
            <div class="box-header">
                <a href="?page=MyApp/add_pengguna" class="btn btn-primary">
                    <i class="glyphicon glyphicon-plus"></i> Tambah Data Akun</a>
                    <button id="checkAllButton" class="btn btn-danger">Hapus yang Dipilih</button>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                        <th ><input type="checkbox" id="checkAll"></th>

                            <th>Nama </th>
                            <th>Email</th>
                            <th>Nomor</th>
                            <th>KK</th>

                            <th>Jumlah Keluarga</th>
                            <th>usia</th>
                            <th>Setatus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$no = 1;
$sql = $koneksi->query("select * from tb_pengguna");

while ($data = $sql->fetch_assoc()) {

    if ($data['level'] !== 'admin') {
        ?>

                        <tr>
                        <td>
                                <input type="checkbox" class="checkItem" value="<?php echo $data['id_pengguna']; ?>">
                            </td>
                            <td>
                                <?php echo $data['nama_pengguna']; ?>
                            </td>
                            <td>
                                <?php echo $data['username']; ?>
                            </td>
                            <td>
                                <?php echo $data['nomor']; ?>
                            </td>
                            <td>
                                <?php echo $data['kk']; ?>
                            </td>
                            <td>
                                <?php echo $data['kl']; ?>
                            </td>
                            <td>
                                <?php echo $data['usia']; ?>
                            </td>
                            <td>
                                <?php if ($data['setatus'] != 'sudah di konfirmasi'): ?>
                                    <form action="?page=status" method="post">
                                        <input type="hidden" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>">
                                        <button type="submit" class="btn btn-danger btn-xs">Belum di Konfirmasi</button>
                                    </form>
                                <?php else: ?>
                                    <button type="button" class="btn btn-success btn-xs" disabled>Sudah di Konfirmasi</button>
                                <?php endif;?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>">Ubah</a>
                                        </li>
                                        <li><a class="dropdown-item" href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
                                                onclick="return confirm('Apakah anda yakin hapus data ini ?')">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                        <?php
}
}
?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    document.getElementById('checkAll').addEventListener('change', function () {
    var checkboxes = document.getElementsByClassName('checkItem');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }
});


document.getElementById('checkAllButton').addEventListener('click', function () {
    var checkboxes = document.getElementsByClassName('checkItem');
    var checkedIds = [];
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkedIds.push(checkboxes[i].value);
        }
    }
    if (checkedIds.length > 0) {
        if (confirm('Apakah Anda yakin ingin menghapus item yang dipilih?')) {
            fetch('<?php echo $base_url ?> ?page=MyApp/del_all', {
                method: 'POST',
                body: JSON.stringify({ ids: checkedIds }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(() => {
                // Hapus berhasil, tampilkan pesan SweetAlert
                Swal.fire({
                    title: 'Hapus Data Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Auto reload halaman setelah penghapusan berhasil
                        location.reload();
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
                // Tampilkan pesan SweetAlert untuk kesalahan
                Swal.fire({
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal menghapus data. Silakan coba lagi.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    } else {
        alert('Pilih setidaknya satu item untuk dihapus.');
    }
});


function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('file-name').value = fileName;
    }
</script>



