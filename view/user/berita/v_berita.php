<?php
$sql = "SELECT * FROM berita";
$query = mysqli_query($koneksi, $sql);
?>

<section class="content-header">
    <h1>Tim Kami</h1>
</section>
<style>
    .team {
    border: 2px solid #ddd;
    padding: 20px;
    text-align: center;
}

.team img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-bottom: 20px;
}

.team h4 {
    font-size: 20px;
    margin-bottom: 15px;
}

.team a {
    color: #555;
    margin-right: 10px;
    font-size: 24px;
    transition: color 0.3s;
}

.team a:hover {
    color: #007bff;
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
                        <div style="border-radius:20px;padding:20px;" class="team">
                        <img src="<?php echo $row['gambar']; ?>" alt="Foto Tim" style="width: 100%; height: auto;">
                        <h3 class="card-title"><?php echo $row['judul']; ?></h3>
                        <h4><?php echo $row['deskripsi']; ?></h4>

                        </div>
                    </div>
                </div>
        <?php
}?>
    </div>
    </div>
</section>

