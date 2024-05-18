<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM berita WHERE id='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $cek = mysqli_fetch_assoc($query_cek);
}
?>

<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Form Ubah User</b>
            </a>
        </li>
    </ol>
</section>

<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Data Tim</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $cek['id']; ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label for="gambar">Foto</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" />
                            <img src="<?php echo $cek['gambar']; ?>" alt="Foto Tim" style="max-width: 200px; margin-top: 10px;">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $cek['judul']; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi"><?php echo $cek['deskripsi']; ?></textarea>
                        </div>

                    </div>
                    <br>
                    <div class="box-footer">
                        <button class="btn btn-primary me-3 waves-effect waves-light" type="submit" name="Ubah" value="Ubah">Ubah</button>
                        <a href="?page=tim" title="Kembali" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<?php
if (isset($_POST['Ubah'])) {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    if ($_FILES['gambar']['name']) {

        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $upload_dir = './dist/down/';
        $file_path = $upload_dir . $gambar;

        move_uploaded_file($gambar_tmp, $file_path);

        $sql_update_gambar = "UPDATE berita SET gambar = '$file_path' WHERE id = '$id'";
        $query_update_gambar = mysqli_query($koneksi, $sql_update_gambar);

        if (!$query_update_gambar) {
            echo "<script>
                Swal.fire({
                    title: 'Ubah Data Gagal',
                    text: 'Error: Gagal mengubah gambar',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value){
                        window.location = '$base_url?page=berita';
                    }
                });
            </script>";
            exit; // Keluar
        }
    }

    $sql_ubah = "UPDATE berita SET
        judul = '$judul',
        deskripsi = '$deskripsi',

        WHERE id = '$id'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = '$base_url?page=berita';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Gagal',
                text: 'Error: " . mysqli_error($koneksi) . "',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = '$base_url?page=berita';
                }
            });
        </script>";
    }

    mysqli_close($koneksi);
}
?>
