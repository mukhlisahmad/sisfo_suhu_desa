<section class="content-header">

    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>data user </b>
            </a>
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div class="card card-primary">
        <div class="card-body">

        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered ">
                    <thead >
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Lihat</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$no = 1;
$sql = $koneksi->query("select * from tb_pengguna");
while ($data = $sql->fetch_assoc()) {

    if ($data['level'] !== 'admin') {
        ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_pengguna']; ?>
                            </td>

                            <td>
                                <?php echo $data['username']; ?>
                            </td>

                            <td>

                                <form action="<?php echo ($data['id_pengguna']) ? '?page=warga' : '?page=warga'; ?>" method="post">
                                    <input type="hidden" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>">
                                    <button type="submit" class="btn btn-primary" title="Lihat">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </form>


                            </td>
                        </tr>
                        <?php
}
}
?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    </div>
</section>

