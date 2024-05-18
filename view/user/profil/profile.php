<?php
include "./inc/koneksi.php";
include "./inc/url.php";
if (isset($_SESSION["ses_username"]) == "") {
    header("location: login.php");
    exit();
}
$base_url = "x";
$data_id = $_SESSION["ses_id"];
$data_nama = $_SESSION["ses_nama"];
$data_user = $_SESSION["ses_username"];
$data_nomor = $_SESSION["ses_nomor"];
$data_kk = $_SESSION["ses_kk"];
$data_kl = $_SESSION["ses_kl"];
$data_level = $_SESSION["ses_level"];
$data_password = $_SESSION["ses_password"];
$data_foto = $_SESSION["ses_foto"];

if (isset($_POST['Ubah'])) {

    $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna ='" . $_POST['nama_pengguna'] . "',
        username ='" . $_POST['username'] . "',
        nomor ='" . $_POST['nomor'] . "',
        kk ='" . $_POST['kk'] . "',
        kl ='" . $_POST['kl'] . "',
        password ='" . $_POST['password'] . "'";

    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'dist/img/';
        $uploadFile = $uploadDir . basename($_FILES['foto']['name']);
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
            $sql_ubah .= ", foto='" . basename($_FILES['foto']['name']) . "'";
            $_SESSION["ses_foto"] = basename($_FILES['foto']['name']);
            $data_foto = $_SESSION["ses_foto"];
        } else {
            echo "<script>
            Swal.fire({title: 'unggah foto gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = '$base_url?page=profil';
                }
            })</script>";
            exit();
        }
    }

    $sql_ubah .= " WHERE id_pengguna='" . $_POST['id_pengguna'] . "'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        $_SESSION["ses_nama"] = $_POST['nama_pengguna'];
        $_SESSION["ses_username"] = $_POST['username'];
        $_SESSION["ses_nomor"] = $_POST['nomor'];
        $_SESSION["ses_kk"] = $_POST['kk'];
        $_SESSION["ses_kl"] = $_POST['kl'];
        $_SESSION["ses_password"] = $_POST['password'];
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    // Redirect ke halaman profil
                    window.location = '$base_url?page=profil';
                }
            });
         </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Ubah Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    // Redirect ke halaman profil
                    window.location = '$base_url?page=profil';
                }
            });
         </script>";
    }
    if (!$query_ubah) {
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }
}
?>
<style>
    input[type="file"] {
        color: blueviolet;
    }
</style>
<section class="content">
        <div class="card card-primary">
            <div class="card-body">
                    <div class="user-profile-header-banner">
                      <img src="plugins/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                      <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"src="dist/img/<?php echo $data_foto; ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                      </div>
                      <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4><?php echo $data_nama; ?></h4>
                            <p><?php echo $data_user; ?></p>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-outline-success waves-effect waves-light">
                            <i class="ti ti-check me-1"></i><?php echo $data_level; ?>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
            <div class="text-center">
                <p>Isi data Profile</p>
            </div>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pengguna" value="<?php echo $data_id; ?>">
                <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna"
                        value="<?php echo $data_nama; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" class="form-control" id="username" name="username"
                        value="<?php echo $data_user; ?>">
                </div>
                <div class="mb-3">

                    <input type="hidden" class="form-control" id="level" name="level"
                        value="<?php echo $data_level; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor" name="nomor"
                        value="<?php echo $data_nomor; ?>">
                </div>
                <div class="mb-3">
                    <label for="kk" class="form-label">KK</label>
                    <input type="text" class="form-control" id="kk" name="kk"
                        value="<?php echo $data_kk; ?>">
                </div>
                <div class="mb-3">
                    <label for="kl" class="form-label">Jumlah Keluarga</label>
                    <input type="number" class="form-control" id="kl" name="kl"
                        value="<?php echo $data_kl; ?>">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Profile</label>

                    <img  width="50px"class="profile-user-img img-fluid img-circle mx-auto d-block"
                        src="dist/img/<?php echo $data_foto; ?>" alt="User profile picture">
                    <br>
                    <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $data_foto; ?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password"
                        value="<?php echo $data_password; ?>">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="mybutton" onclick="change()">
                        <label class="form-check-label" for="mybutton">Lihat Password</label>
                    </div>
                </div>
                <div class="box-footer">
                <button class="btn btn-primary me-3 waves-effect waves-light" type="submit" name="Ubah" value="Ubah" >Ubah</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- /.card -->
</section>


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
 <!-- <input type="submit" name="Ubah" value="Ubah" class="btn btn-success"> -->