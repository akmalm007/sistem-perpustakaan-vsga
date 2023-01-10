<?php
include '../koneksi.php';
$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$status = $_POST['status'];
	
$query_buku = mysqli_query($db, "INSERT INTO buku (id_buku, judul_buku, kategori, pengarang, penerbit, status)
                        value ('$id_buku','$judul_buku','$kategori','$pengarang','$penerbit','$status')");

if ($query_buku) {
    header("location:../index.php?p=buku");
} else {
    echo 'Gagal tersimpan';
}
?>