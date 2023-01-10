<?php
	include "../koneksi.php";
    $id_transaksi=$_GET['id'];
    $query_join = $query = "SELECT 
    tbtransaksi.id_transaksi,
    tbtransaksi.id_anggota,
    tbanggota.nama_anggota,
    tbtransaksi.id_buku,
    buku.judul_buku,
    tbtransaksi.tgl_pinjam,
    tbtransaksi.tgl_kembali
FROM tbtransaksi
JOIN tbanggota
    ON tbtransaksi.id_anggota = tbanggota.id_anggota
JOIN buku
    ON tbtransaksi.id_buku = buku.id_buku
WHERE id_transaksi = '$id_transaksi'";
	$q_tampil_transaksi=mysqli_query($db, $query_join);
	$r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi);
?>
<div id="label-page"><h3>Nota Peminjaman Buku</h3></div>
<div id="content">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Transaksi</td>
			<td class="isian-formulir"><?php echo $r_tampil_transaksi['id_transaksi']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir"><?php echo $r_tampil_transaksi['nama_anggota']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><?php echo $r_tampil_transaksi['judul_buku']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Peminjaman</td>
			<td class="isian-formulir"><?php echo $r_tampil_transaksi['tgl_pinjam']; ?></td>
		</tr>
	</table>
</div>