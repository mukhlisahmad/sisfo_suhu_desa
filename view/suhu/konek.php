<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bumdes";

$koneksi = new mysqli($servername, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
date_default_timezone_set('Asia/Jakarta');
$seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];
$tgl_sekarang = date("ymd");
$jam_sekarang = date("H:i:s");

function displayTemperatureData($koneksi)
{
    $query = "SELECT * FROM logs";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['no'] . "</td>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>" . $row['hari'] . "</td>";
            echo "<td>" . $row['waktu'] . "</td>";
            echo "<td>" . $row['suhu'] . "</td>";
            echo "<td>" . $row['kelembapan'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data suhu</td></tr>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    displayTemperatureData($koneksi);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['status1']) && !empty($_POST['status2']) && !empty($_POST['pelanggan'])) {
        $status1 = $_POST['status1'];
        $status2 = $_POST['status2'];
        $pelanggan = $_POST['pelanggan'];

        $sql = "INSERT INTO logs (tanggal, hari, waktu, pelanggan, suhu, kelembapan)
                VALUES ('" . $tgl_sekarang . "',  '" . $hari_ini . "', '" . $jam_sekarang . "', '" . $pelanggan . "', '" . $status1 . "','" . $status2 . "')";

        if ($koneksi->query($sql) === true) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "Data tidak lengkap";
    }
}

$koneksi->close();
