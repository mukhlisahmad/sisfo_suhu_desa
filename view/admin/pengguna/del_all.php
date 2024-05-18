<?php

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['ids']) && is_array($data['ids']) && !empty($data['ids'])) {
    $deletedIds = $data['ids'];
    $deletedIdsStr = implode(',', $deletedIds);

    $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna IN ($deletedIdsStr)";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        // Mengirimkan respons JSON bahwa penghapusan berhasil
        echo json_encode(['success' => true, 'message' => 'Data berhasil dihapus.']);
        exit;
    } else {
        // Mengirimkan respons JSON bahwa penghapusan gagal
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus data.']);
        exit;
    }
} else {
    // Mengirimkan respons JSON bahwa tidak ada data yang dipilih
    echo json_encode(['success' => false, 'message' => 'Tidak ada data yang dipilih untuk dihapus.']);
    exit;
}
