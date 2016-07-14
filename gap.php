<?php
$getKaryawan = $_GET['id'];
?>
<h4>Perhitungan GAP Karyawan</h4>
<?php
	
	echo"
	<table class='table table-bordered table-striped'>
	<tr>
	<td>No.</td>
	<td>Nama Karyawan</td>";
		$qkriteria=mysql_query("select * from tbl_kriteria order by id_kriteria");
		while($data=mysql_fetch_array($qkriteria)){
			echo "<td>$data[id_kriteria]</td>";
		}
		echo "</tr>";
			$no1 = 1;
			$qkaryawan=mysql_query("select * from tbl_karyawan order by id_karyawan");
			while($dtkaryawan=mysql_fetch_array($qkaryawan)){
				echo "
				<tr>
				  <td>$no1</td>
				  <td>$dtkaryawan[nama_karyawan]</td>";
				  $qkrit1=mysql_query("select * from tbl_kriteria order by id_kriteria");
				  while($dkrit1=mysql_fetch_array($qkrit1)){
						$qpn=mysql_query("select * from tbl_penilaian where id_kriteria='$dkrit1[id_kriteria]' and id_karyawan='$dtkaryawan[id_karyawan]' 
						order by id_kriteria");
				  		$dpn=mysql_fetch_array($qpn); 
						echo"<td>$dpn[nilai]</td>";
				  }
				  $no1++;
			}
			echo"<tr  class='info'><td colspan='2'>Target Perusahaan</td>";
			$qkriteria2=mysql_query("select * from tbl_kriteria order by id_kriteria");
			while($data2=mysql_fetch_array($qkriteria2)){
				$qtarget=mysql_query("select * from tbl_target where id_kriteria='$data2[id_kriteria]'");
				while($dt2=mysql_fetch_array($qtarget)){
				echo "<td>$dt2[nilai]</td>";
				}
			}
			$no2 = 1;
			$qkaryawan2=mysql_query("select * from tbl_karyawan order by id_karyawan");
			while($dtkaryawan2=mysql_fetch_array($qkaryawan2)){
				echo "
				<tr>
				  <td>$no2</td>
				  <td>$dtkaryawan2[nama_karyawan]</td>";
				  $qkrit2=mysql_query("select * from tbl_kriteria order by id_kriteria");
				  while($dkrit2=mysql_fetch_array($qkrit2)){
						$qpn2=mysql_query("select * from tbl_penilaian where id_kriteria='$dkrit2[id_kriteria]' and id_karyawan='$dtkaryawan2[id_karyawan]' 
						order by id_kriteria");
				  		$dpn2=mysql_fetch_array($qpn2);
						    $qt=mysql_query("select * from tbl_target where id_kriteria='$dpn2[id_kriteria]' order by id_kriteria");
							$dtr=mysql_fetch_array($qt);
							#=== Rumus GAP==============
							$gap = $dpn2['nilai'] - $dtr['nilai']; 
						echo"<td>$gap</td>";
				  }
				  $no2++;
				}
	
	echo"</table>";	
?>