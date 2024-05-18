
<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <center>
                <h4>Data Berita</h4>
            </center>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Lihat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$no = 1;
$upload_dir = './dist/down/';
$sql = $koneksi->query("SELECT * FROM berita");

while ($data = $sql->fetch_assoc()) {
    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>



                                    <td>
                                    <img src="<?php echo $data['gambar']; ?>" alt="Foto Tim" style="max-width: 200px; margin-top: 10px;">
                                    </td>

                                    <td><?php echo $data['judul']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="<?php echo $base_url ?>?page=v_berita">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>

                                    <a class="btn btn-google-plus" href="?page=edit_berita&kode=<?php echo $data['id']; ?>">Ubah</a>
                                    <a class="btn btn-google-plus" href="?page=delet_berita&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Hapus</a>

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

<section class="content">
    <div class="card card-primary">
    <div class="card-header">
        <h3>Form Tambah Konten Tim</h3>
    </div>
        <div class="card-body">

        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id">
        <div class="form-group">
            <label for="judul">judul:</label>
            <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="form-group">
        <label for="gambar">Foto:</label>
        <input class="form-control"type="file" id="gambar" name="gambar"onchange="updateFileName(this)">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" cols="50"></textarea>
        </div>

        <br>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="Simpan" value="Simpan">Simpan</button>
        </div>
    </form>
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

if (isset($_POST['Simpan'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $upload_dir = './dist/down/';
    $file_path = $upload_dir . $gambar;

    if (move_uploaded_file($gambar_tmp, $file_path)) {

        $sql_simpan = "INSERT INTO berita (judul, deskripsi, gambar) VALUES (
            '$judul',
            '$deskripsi',
            '$file_path'

        )";

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            echo "<script>
                Swal.fire({
                    title: 'Tambah Data Berhasil',
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
                    title: 'Tambah Data Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value){
                        window.location = '$base_url?page=berita';
                    }
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan saat mengupload gambar',
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

<script>
    function updateFileName(input) {
        var gambar = input.files[0].name;
        document.getElementById('gambar').value = gambar;
    }
</script>
