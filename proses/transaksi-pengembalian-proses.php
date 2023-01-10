<?php
include '../koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$id_anggota = $_POST['nama_anggota'];
$tgl_kembali = $_POST['tgl_kembali'];
$status = $_POST['status'];

$query = mysqli_query($db,
	"UPDATE tbtransaksi
		SET tgl_kembali = '$tgl_kembali'
			WHERE id_transaksi='$id_transaksi'"
	);
$query_status = mysqli_query($db,
	"UPDATE tbanggota
		SET status = '$status'
			WHERE id_anggota = '$id_anggota'"
);
	if($query) {
		header("location:../index.php?p=transaksi-pengembalian");
	} else {
		echo 'Data gagal diupdate';
	}
    

