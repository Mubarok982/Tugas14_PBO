<?php
include 'database.php'; 
$db = new Database();

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        if ($db->hapus_data($id)) {
            echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>window.location.href = 'tampil.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data!');</script>";
            echo "<script>window.location.href = 'tampil.php';</script>";
        }
    } else {
        echo "<script>alert('ID tidak valid!');</script>";
        echo "<script>window.location.href = 'tampil.php';</script>";
    }
}
?>
