<?php
	$id_buku=$_GET['id'];
	$q_tampil_buku=mysqli_query($db,"SELECT * FROM buku WHERE id_buku='$id_buku'");
	$r_tampil_buku=mysqli_fetch_array($q_tampil_buku);
?>
<div id="label-page"><h3>Edit Data Buku</h3></div>
<div id="content">
	<form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_tampil_buku['id_buku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><input type="text" name="judul_buku" value="<?php echo $r_tampil_buku['judul_buku']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
        <tr>
			<td class="label-formulir">Kategori</td>
			<td class="isian-formulir"><input type="text" name="kategori" value="<?php echo $r_tampil_buku['kategori']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Pengarang</td>
			<td class="isian-formulir"><input type="text" name="pengarang" value="<?php echo $r_tampil_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
        <tr>
			<td class="label-formulir">Penerbit</td>
			<td class="isian-formulir"><input type="text" name="penerbit" value="<?php echo $r_tampil_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
        <tr>
			<td class="label-formulir">Status</td>			
			<?php
			if($r_tampil_buku['status']=="Tersedia")
			{
				echo "<td class='isian-formulir'><input type='radio' name='status' value='Tersedia' checked>Tersedia</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='status' value='Tiada'>Tiada</td>";
			}
			elseif($r_tampil_buku['status']=="Tiada")
			{
				echo "<td class='isian-formulir'><input type='radio' name='status' value='Tersedia'>Tersedia</label></td>
					</tr>
		<tr>
			<td class='label-formulir'></td>
			<td class='isian-formulir'><input type='radio' name='status' value='Tiada' checked>Tiada</td>";
			}
			?>
			<input type="text" name="status" value="<?php echo $r_tampil_buku['status']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div>