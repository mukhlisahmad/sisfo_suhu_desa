<section class="content-header">

    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                form tambah user
            </a>
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div class="card card-primary">
<div class="card-body">
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah User</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                    <div class="form-group">
                            <label for="nama_pengguna">Nama</label>
                            <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor HP</label>
                            <input type="text" name="nomor" id="nomor" class="form-control"
                                placeholder="Nomor HP">
                        </div>
                        <div class="form-group">
                            <label for="kk">Nomor KK</label>
                            <input type="text" name="kk" id="kk" class="form-control"
                                placeholder="Nomor kk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputusia1">usia</label>
                            <input type="text" name="usia" id="usia" class="form-control"
                                placeholder="usia">
                        </div>
                        <input type="hidden" name="level" value="user">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                        </div>

                    </div>
                    <!-- /.box-body -->
<br>
                    <div class="box-footer">

                        <button class="btn btn-primary me-3 waves-effect waves-light" type="submit" name="Simpan" value="Simpan" >Simpan</button>
                        <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
            </div>
            </div>
</section>

<?php

if (isset($_POST['Simpan'])) {
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,nomor,kk,kl,usia,password,level) VALUES (
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['username'] . "',
        '" . $_POST['nomor'] . "',
        '" . $_POST['kk'] . "',
        '" . $_POST['kl'] . "',
        '" . $_POST['usia'] . "',
        '" . $_POST['password'] . "',
        '" . $_POST['level'] . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah User Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = ' $base_url ?page=MyApp/data_pengguna';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah User Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
        window.location = ' $base_url ?page=MyApp/add_pengguna';
        }
      })</script>";
    }
    //selesai proses simpan data
}
