<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">

    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Form ubah User</b>
            </a>
        </li>
    </ol>
</section>

<section class="content">
<div class="card card-primary">
<div class="card-body">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah User Akun</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="form-group">
                            <input type='hidden' class="form-control" name="id_pengguna"
                                value="<?php echo $data_cek['id_pengguna']; ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input class="form-control" name="nama_pengguna"
                                value="<?php echo $data_cek['nama_pengguna']; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="username" value="<?php echo $data_cek['username']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input class="form-control" name="nomor" value="<?php echo $data_cek['nomor']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Nomor KK</label>
                            <input class="form-control" name="kk" value="<?php echo $data_cek['kk']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Jumlah Keluarga</label>
                            <input class="form-control" name="kl" value="<?php echo $data_cek['kl']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Usia</label>
                            <input class="form-control" name="usia" value="<?php echo $data_cek['usia']; ?>" />
                        </div>

                        <input type="hidden" name="level" value="user">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="pass"
                                value="<?php echo $data_cek['password']; ?>" />
                            <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat
                            Password
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                    <button class="btn btn-primary me-3 waves-effect waves-light" type="submit" name="Ubah" value="Ubah" >Ubah</button>

                        <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
            </div>
            </div>
            <!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='" . $_POST['nama_pengguna'] . "',
        username='" . $_POST['username'] . "',
        nomor='" . $_POST['nomor'] . "',
        kk='" . $_POST['kk'] . "',
        kl='" . $_POST['kl'] . "',
        password='" . $_POST['password'] . "',
        usia='" . $_POST['usia'] . "',
        level='" . $_POST['level'] . "'
        WHERE id_pengguna='" . $_POST['id_pengguna'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah User Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = '$base_url?page=MyApp/data_pengguna';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah User Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = '$base_url?page=MyApp/data_pengguna';
          }
      })</script>";
    }

    //selesai proses ubah
}

?>

<script type="text/javascript">
function change() {
    var x = document.getElementById('pass').type;

    if (x == 'password') {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    } else {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
}
</script>