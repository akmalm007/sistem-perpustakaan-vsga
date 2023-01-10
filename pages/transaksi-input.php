<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "dbpus";

$db = mysqli_connect($server, $user, $password, $nama_database);
$sqlanggota = "SELECT * FROM tbanggota";
$sqlbuku = "SELECT * from buku";
$sqltransaksi = "SELECT * FROM tbtransaksi";
$anggota_select = mysqli_query($db, $sqlanggota);
$buku_select = mysqli_query($db,$sqlbuku);
$transaksi_select = mysqli_query($db,$sqltransaksi);

?>

<div id="label-page"><h3>Input Data Transaksi</h3></div>
<div id="content">
	<form action="proses/transaksi-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Transaksi</td>
			<td class="isian-formulir"><input type="text" name="id_transaksi" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Anggota</td>
            <td class="isian-formulir">
                <select name = "nama_anggota">
                <option>Pilih Data Anggota</option>

                <?php

                    while ($r_anggota = mysqli_fetch_array($anggota_select,MYSQLI_ASSOC)):;
                    
                ?>
                <option value="<?php echo $r_anggota['id_anggota'];?>"><?php echo $r_anggota['id_anggota'];?><p>( <?php echo $r_anggota['nama_anggota'];?> ) </p>
                <?php

                endwhile;

                ?>
                </select>
            </td>
        </tr>
		<tr>
			<td class="label-formulir">Buku</td>
            <td class="isian-formulir">
                <select name = "judul_buku">
                <option>Pilih Data Buku</option>

                <?php

                    while ($r_buku = mysqli_fetch_array($buku_select,MYSQLI_ASSOC)):;
                    
                ?>
                <option value="<?php echo $r_buku['id_buku'];?>"><?php echo $r_buku['id_buku'];?><p>( <?php echo $r_buku['judul_buku'];?> ) </p></option>
                <?php

                endwhile;
                
                ?>
                </select>
            </td>
        </tr>
		<tr>
			<td class="label-formulir">Tanggal Pinjam</td>
			<td class="isian-formulir"><input type="date" name="tgl_pinjam" class="isian-formulir isian-formulir-border"></td>
        </tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>