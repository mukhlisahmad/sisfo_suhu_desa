<?php

if (isset($_POST['id_pengguna'])) {

    $id_pengguna = $_POST['id_pengguna'];

    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }

    $sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
    if ($sql->num_rows > 0) {

        while ($data = $sql->fetch_assoc()) {
            ?>
<section class="content">
    <div class="card card-primary">
        <div class="card-body">
                  <div class="user-profile-header-banner">
                        <img src="plugins/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                      </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                      <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"src="dist/img/<?php echo $data['foto']; ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                      </div>
                      <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4><?php echo $data['nama_pengguna']; ?></h4>
                            <p><?php echo $data['username']; ?></p>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-outline-success waves-effect waves-light">
                          <i class="ti ti-check me-1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <a href="?page=list" class="btn btn-primary">
                        <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
                    <!-- <a href="./report/cetak-tabungan.php?nis=<?php echo $nis ?>" target="_blank" class="btn btn-default">
                        <i class="glyphicon glyphicon-print"></i> Cetak</a> -->

<hr>
                    <i class="icon fa fa-info"></i> Informasi User
<hr>
                <div class="table-responsive">
                <table id="example1" class="w-100 table" >
                   <tr>
                   <th>Nama</th>
                   <th>:</th>
                   <td><?php echo $data['nama_pengguna']; ?></td>
                   </tr>
                   <tr>
                   <th>Email</th>
                   <th>:</th>
                   <td><?php echo $data['username']; ?></td>
                   </tr>
                   <tr>
                   <th>Nomor HP</th>
                   <th>:</th>
                   <td><?php echo $data['nomor']; ?></td>
                   </tr>
                   <tr>
                   <th>Nomor KK</th>
                   <th>:</th>
                   <td><?php echo $data['kk']; ?></td>
                   </tr>
                   <tr>
                   <th>Jumlah Keluarga</th>
                   <th>:</th>
                   <td><?php echo $data['kl']; ?></td>
                   </tr>
                   <tr>
                   <th>Usia</th>
                   <th>:</th>
                   <td><?php echo $data['usia']; ?></td>
                   </tr>
                </table>
                </div>
        </div>
    </div>
</section>
            <?php
}

        ?>

        <?php
} else {

        echo '<div class="alert alert-danger">Data pengguna tidak ditemukan.</div>';
    }
}
?>
