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
                    <button id="checkAllButton" class="btn btn-danger">Hapus yang Dipilih</button>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                        <th ><input type="checkbox" id="checkAll"></th>
                            <th>tanggal </th>
                            <th>hari</th>
                            <th>waktu</th>
                            <th>suhu</th>
                            <th> kelembapan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$no = 1;
$sql = $koneksi->query("select * from logs");

while ($data = $sql->fetch_assoc()) {

    ?>

                        <tr>
                        <td>
                                <input type="checkbox" class="checkItem" value="<?php echo $data['no']; ?>">
                            </td>

                            <td>
                                <?php echo $data['tanggal']; ?>
                            </td>
                            <td>
                                <?php echo $data['hari']; ?>
                            </td>
                            <td>
                                <?php echo $data['waktu']; ?>
                            </td>
                            <td>
                                <?php echo $data['suhu']; ?>
                            </td>
                            <td>
                                <?php echo $data['kelembapan']; ?>
                            </td>

                        </tr>
                        <?php
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
            fetch('<?php echo $base_url ?> ?page=MyApp/delete_suhu', {
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



