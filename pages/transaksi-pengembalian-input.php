<?php
	include 'koneksi.php';
    $id_transaksi=$_GET['id'];
    $query_join  = "SELECT 
    tbtransaksi.id_transaksi,
    tbtransaksi.id_anggota,
    tbanggota.nama_anggota,
    tbtransaksi.id_buku,
    buku.judul_buku,
    tbtransaksi.tgl_pinjam,
    tbtransaksi.tgl_kembali,
	tbanggota.status
FROM tbtransaksi
JOIN tbanggota
    ON tbtransaksi.id_anggota = tbanggota.id_anggota
JOIN buku
    ON tbtransaksi.id_buku = buku.id_buku
WHERE id_transaksi = '$id_transaksi'";
	$q_tampil_transaksi=mysqli_query($db, $query_join);
	$r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi);
?>
<div id="label-page"><h3>Pengembalian Buku</h3></div>
<div id="content">
	<form action="proses/transaksi-pengembalian-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Transaksi</td>
			<td class="isian-formulir"><input type="text" name="id_transaksi" value="<?php echo $r_tampil_transaksi['id_transaksi']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir"><input type="text" name="nama_anggota" value="<?php echo $r_tampil_transaksi['nama_anggota']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
        <tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><input type="text" name="judul_buku" value="<?php echo $r_tampil_transaksi['judul_buku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Pinjam</td>
			<td class="isian-formulir"><input type="date" name="tgl_pinjam" value="<?php echo $r_tampil_transaksi['tgl_pinjam']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
        <tr>
			<td class="label-formulir">Tanggal Kembali</td>
			<td class="isian-formulir"><input type="date" name="tgl_kembali" value="<?php echo $r_tampil_transaksi['tgl_kembali']; ?>" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div>