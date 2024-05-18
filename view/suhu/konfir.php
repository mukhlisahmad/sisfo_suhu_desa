
<?php
include "./inc/koneksi.php";
if (isset($_POST['id_pengguna'])) {

    $id_pengguna = $_POST['id_pengguna'];

    $sql_update_status = "UPDATE tb_pengguna SET setatus = 'sudah di konfirmasi' WHERE id_pengguna = '$id_pengguna'";

    if ($koneksi->query($sql_update_status) === true) {
        echo "<script>
        Swal.fire({title: 'Update Konfirmasi Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '$base_url?page=MyApp/data_pengguna';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Update Konfirmasi Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '$base_url?page=MyApp/data_pengguna';
            }
        })</script>";
    }

    $koneksi->close();

} else {
    echo "<script>
    Swal.fire({title: 'id user tidak di temukan ',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
            window.location = '$base_url?page=MyApp/data_pengguna';
        }
    })</script>";
}
?>
