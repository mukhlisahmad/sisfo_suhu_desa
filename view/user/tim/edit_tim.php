<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tim WHERE id='" . $_GET['kode'] . "'";
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
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $cek['nama']; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi"><?php echo $cek['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sosmed_ig">Instagram</label>
                            <input type="text" class="form-control" id="sosmed_ig" name="sosmed_ig" value="<?php echo $cek['sosmed_ig']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="sosmed_fb">Facebook</label>
                            <input type="text" class="form-control" id="sosmed_fb" name="sosmed_fb" value="<?php echo $cek['sosmed_fb']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="sosmed_wa">WhatsApp</label>
                            <input type="text" class="form-control" id="sosmed_wa" name="sosmed_wa" value="<?php echo $cek['sosmed_wa']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="sosmed_ln">LinkedIn</label>
                            <input type="text" class="form-control" id="sosmed_ln" name="sosmed_ln" value="<?php echo $cek['sosmed_ln']; ?>" />
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
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $sosmed_ig = $_POST['sosmed_ig'];
    $sosmed_wa = $_POST['sosmed_wa'];
    $sosmed_fb = $_POST['sosmed_fb'];
    $sosmed_ln = $_POST['sosmed_ln'];

    if ($_FILES['gambar']['name']) {

        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $upload_dir = './dist/down/';
        $file_path = $upload_dir . $gambar;
        move_uploaded_file($gambar_tmp, $file_path);

        $sql_update_gambar = "UPDATE tim SET gambar = '$file_path' WHERE id = '$id'";
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
                        window.location = '$base_url?page=tim';
                    }
                });
            </script>";
            exit;
        }
    }

    $sql_ubah = "UPDATE tim SET
        nama = '$nama',
        deskripsi = '$deskripsi',
        sosmed_ig = '$sosmed_ig',
        sosmed_wa = '$sosmed_wa',
        sosmed_fb = '$sosmed_fb',
        sosmed_ln = '$sosmed_ln'
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
                    window.location = '$base_url?page=tim';
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
                    window.location = '$base_url?page=tim';
                }
            });
        </script>";
    }

    mysqli_close($koneksi);
}
?>
