<?php
$sql = "SELECT * FROM dr";
$query = mysqli_query($koneksi, $sql);
?>

<section class="content-header">
    <h1>Kontak Darurat</h1>
</section>
<style>
    .btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    color: #fff;
    border: none;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
<section class="content">
        <div class="card card-primary">
            <div class="card-body">
        <?php
while ($row = mysqli_fetch_assoc($query)) {
    ?>
                <div class="card card-primary">
                    <div class="card-body">
                        <div style="border-radius:20px;padding:20px;" class="kn">
                        <img src="dist/img/wa.png" alt="Foto wa" style="width: 100%; height: auto;">
                        <center>
                        <h4>Kontak WhatsApp Darurat</h4>
                        <a class="btn btn-danger" target="_blank"href="https://wa.me/<?php echo $row['pl']; ?>">Polisi </a>
                        <br>
                        <a class="btn btn-danger" target="_blank"href="https://wa.me/<?php echo $row['pk']; ?>">Pemadam Kebakaran </a>
                        <br>
                        <a class="btn btn-danger" target="_blank"href="https://wa.me/<?php echo $row['rs']; ?>">Rumah Sakit </a>
                        <br>
                        <a class="btn btn-danger" target="_blank"href="https://wa.me/<?php echo $row['kd']; ?>">Kepala Desa </a>
                        </center>
                        </div>
                    </div>
                </div>
        <?php
}?>
    </div>
    </div>
</section>

