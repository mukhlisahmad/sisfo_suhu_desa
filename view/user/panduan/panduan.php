<section class="content">
    <div class="card card-primary">
        <div class="card-body">
<div class="row">
        <?php
$sql = "SELECT * FROM panduan";
$result = mysqli_query($koneksi, $sql);

// Periksa apakah query berhasil dieksekusi
if (mysqli_num_rows($result) > 0) {
    // Loop melalui setiap baris data
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-md-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                <p class="card-text"><?php echo $row['isi']; ?></p>
                                <p class="card-text"><small class="text-muted"> <?php echo $row['date']; ?></small></p>
                            </div>
                        </div>
                    </div>
                    <?php
}
} else {
    echo "Tidak ada data panduan.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
        </div>

        </div>
    </div>
</section>
