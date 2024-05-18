<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM panduan WHERE id='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $cek = mysqli_fetch_assoc($query_cek);
}
?>

<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Form ubah User</b>
            </a>
        </li>
    </ol>
</section>

<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah User Akun</h3>
                </div>

                <form action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <input type='hidden' class="form-control" name="id" value="<?php echo $cek['id']; ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input class="form-control" name="judul" value="<?php echo $cek['judul']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Isi</label>
                            <textarea id="isi" class="form-control" name="isi"><?php echo $cek['isi']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="date" value="<?php echo $cek['date']; ?>" />
                        </div>
                    </div>
<br>
                    <div class="box-footer">
                        <button class="btn btn-primary me-3 waves-effect waves-light" type="submit" name="Ubah" value="Ubah">Ubah</button>
                        <a href="?page=edit_cara" title="Kembali" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    ClassicEditor
        .create(document.querySelector('#isi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<?php

if (isset($_POST['Ubah'])) {
    //mulai proses ubah
    $sql_ubah = "UPDATE panduan SET
        judul='" . $_POST['judul'] . "',
        isi='" . $_POST['isi'] . "',
        date='" . $_POST['date'] . "'
        WHERE id='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
            Swal.fire({title: 'Ubah User Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = '$base_url?page=edit_cara';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah User Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = '$base_url?page=edit_cara';
                }
            });
        </script>";
    }
}

?>
