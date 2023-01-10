<?php

include '../koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$id_anggota = $_POST['nama_anggota'];
$id_buku = $_POST['judul_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = '-';
$status = $_POST['status'];
	
$query_buku = mysqli_query($db, "INSERT INTO tbtransaksi (id_transaksi, id_anggota, id_buku, tgl_pinjam, tgl_kembali)
                        value ('$id_transaksi','$id_anggota','$id_buku', '$tgl_pinjam', '$tgl_kembali')");
                        
$query_status = mysqli_query($db,
                                "UPDATE tbanggota
                                    SET status = '$status'
                                    WHERE id_anggota = '$id_anggota'"
);

if ($query_buku) {
    header("location:../index.php?p=transaksi-peminjaman");
} else {
    echo 'Gagal tersimpan';
}
