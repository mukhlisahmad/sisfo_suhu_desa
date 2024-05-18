<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <center>
                <h4>Data Kontak Darurat</h4>
            </center>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Polisi</th>
                                <th>Rumah Sakit</th>
                                <th>Pemadam Kebakaran</th>
                                <th>Kepala Desa</th>
                                <th>Cek</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$no = 1;
$sql = $koneksi->query("SELECT * FROM dr");

while ($data = $sql->fetch_assoc()) {
    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['pl']; ?></td>
                                    <td><?php echo $data['rs']; ?></td>
                                    <td> <?php echo $data['pk']; ?> </td>
                                    <td><?php echo $data['kd']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="<?php echo $base_url ?>?page=v_darurat">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                    <a class="btn btn-google-plus" href="?page=edit_darurat&kode=<?php echo $data['id']; ?>">Ubah</a>
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