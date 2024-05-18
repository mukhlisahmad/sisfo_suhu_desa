<?php

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$tanggal = $_POST['tanggal'];

$sql = "INSERT INTO nama_tabel (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')";

if ($conn->query($sql) === true) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
