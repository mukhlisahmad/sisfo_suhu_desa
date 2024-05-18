<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <center>
                <h4>Edit data panduan</h4>
            </center>
        </div>
    </div>
</section>

<section class="content">
    <div class="card card-primary">
        <div class="card-body">

        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id">
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="form-group">
            <label for="isi">Isi:</label>
            <textarea class="form-control" id="isi" name="isi" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="Simpan" value="Simpan">Simpan</button>
        </div>
    </form>


        </div>
    </div>
</section>
<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <center>
                <h4>Data Panduan</h4>
            </center>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Lihat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$no = 1;
$sql = $koneksi->query("SELECT * FROM panduan");

while ($data = $sql->fetch_assoc()) {
    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['date']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="<?php echo $base_url ?>?page=cara">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                    <a class="btn btn-google-plus" href="?page=edit&kode=<?php echo $data['id']; ?>">Ubah</a>
                                    <br>
                                    <a class="btn btn-google-plus" href="?page=delet_panduan&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')">Hapus</a>
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
if (isset($_POST['Simpan'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

    $isi = saveImagesFromContent($isi);

    $sql_simpan = "INSERT INTO panduan (id, judul, isi, date) VALUES (
        '$id',
        '$judul',
        '$isi',
        '$tanggal'
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
                    window.location = ' $base_url ?page=edit_cara';
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
                    window.location = ' $base_url ?page=edit_cara';
                }
            });
        </script>";
    }

    // Tutup koneksi
    $koneksi->close();
}

function saveImagesFromContent($content)
{

    preg_match_all('/<img[^>]+src="([^"]+)"[^>]*>/', $content, $matches);
    foreach ($matches[1] as $image_url) {
        $image_name = basename($image_url);
        // Simpan gambar ke direktori 'uploads' (pastikan direktori ini sudah ada)
        $image_path = 'dist/img/' . $image_name;
        file_put_contents($image_path, file_get_contents($image_url));
        // Ganti referensi gambar dalam konten dengan URL yang valid
        $content = str_replace($image_url, $image_path, $content);
    }
    return $content;
}
?>
