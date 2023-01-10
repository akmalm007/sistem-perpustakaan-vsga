<div id="label-page"><h3>Tampil Data Transaksi</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=transaksi-input" class="tombol">Transaksi Peminjaman</a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
			<th id="label-opsi">Opsi</th>
		</tr>
		

		
		<?php
		$batas = 5;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi LIKE '%$pencarian%'
						OR id_anggota LIKE '%$pencarian%'
						OR id_buku LIKE '%$pencarian%''";
						
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbtransaksi";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT 
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
			ON tbtransaksi.id_buku = buku.id_buku LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbtransaksi";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_transaksi = mysqli_query($db, $query);

		if(mysqli_num_rows($q_tampil_transaksi)>0)
		{
		while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_transaksi['id_transaksi']; ?></td>
			<td><?php echo $r_tampil_transaksi['id_anggota']; ?></td>
			<td><?php echo $r_tampil_transaksi['nama_anggota']; ?></td>
			<td><?php echo $r_tampil_transaksi['id_buku']; ?></td>
			<td><?php echo $r_tampil_transaksi['judul_buku']; ?></td>
			<td><?php echo $r_tampil_transaksi['tgl_pinjam']; ?></td>
			<td>
				<div class="tombol-opsi-container"><a target="_blank" href="pages/cetak-nota.php?id=<?php echo $r_tampil_transaksi['id_transaksi'];?>" class="tombol">Cetak Nota</a></div>
			</td>			
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>			
		</div>		
		<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=transaksi-peminjaman&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
		</div>
	<?php
	}
	?>
</div>