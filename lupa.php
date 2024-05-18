<?php
include "inc/koneksi.php";
include "inc/url.php";
$base_url = "x";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lupa</title>
    <link rel="icon" href="dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<style>
.login-page {
    background: #fff;
    /* background: -webkit-linear-gradient(left, #00ea00, #ffff, #b984ff); */
}

.login-box {
    background: #fff;
    color: #000;
}

.login-logo h3 {
    color: #000;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
}

.login-box-msg {
    color: #000;
    text-align: center;
}
button
{
    gap: -10px;
}
</style>

<body class="hold-transition login-page">
    <div class="login-box" style="background-color:#fff;border-radius: 50px 10px;">
        <div class="login-logo">
            <br>

            <a href="#">
                <img style="filter: drop-shadow(0 0 0.75rem  #3333);" src="plugins/assets/img/sipitunglogo.png" width="195px">
            </a>
        </div>
        <!-- /.login-logo -->

        <div style="border-radius: 50px 10px;"class="login-box-body">
            <div class="login-header text-center">
                <div style="box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;border-radius:20px;"class="btn-group" role="group" aria-label="Tombol Masuk dan Register">
                    <a style="border-radius:20px;" href="register" class="btn btn-light">Daftar</a>
                    <a style="border-radius:20px;" href="login" class="btn btn-light">Masuk</a>
                </div>
            </div>
        </div>
        <?php
$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE id_pengguna = 1");

if ($sql->num_rows > 0) {
    $data = $sql->fetch_assoc();
    ?>
    <center>
    <p>
        Lupa Password WhatsApp Admin
    </p>
    <a class="btn btn-danger" target="_blank" href="https://wa.me/<?php echo $data['nomor']; ?>"> <i class="fa fa-whatsapp"></i> WhatsApp Admin </a>
    </center>
    <?php
} else {
    echo "Data tidak ditemukan";
}
?>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- sweet alert -->
</body>

</html>
