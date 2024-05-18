<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM dr WHERE id='" . $_GET['kode'] . "'";
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
                            <label>No Polisi</label>
                            <input type="text"class="form-control" name="pl" value="<?php echo $cek['pl']; ?>" />
                        </div>

                        <div class="form-group">
                            <label> No Rumah Sakit</label>
                            <input type="text"class="form-control" name="rs" value="<?php echo $cek['rs']; ?>"/>
                        </div>

                        <div class="form-group">
                            <label>No Pemadam Kebakaran</label>
                            <input type="text" class="form-control" name="pk" value="<?php echo $cek['pk']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>No Kepala Desa</label>
                            <input type="text" class="form-control" name="kd" value="<?php echo $cek['kd']; ?>" />
                        </div>
                    </div>
<br>
                    <div class="box-footer">
                        <button class="btn btn-primary me-3 waves-effect waves-light" type="submit" name="Ubah" value="Ubah">Ubah</button>
                        <a href="?page=darurat" title="Kembali" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php

if (isset($_POST['Ubah'])) {
    //mulai proses ubah
    $sql_ubah = "UPDATE dr SET
        pl='" . $_POST['pl'] . "',
        rs='" . $_POST['rs'] . "',
        kd='" . $_POST['kd'] . "',
        pk='" . $_POST['pk'] . "'
        WHERE id='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
            Swal.fire({title: 'Ubah User Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = '$base_url?page=darurat';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah User Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = '$base_url?page=darurat';
                }
            });
        </script>";
    }
}

?>
