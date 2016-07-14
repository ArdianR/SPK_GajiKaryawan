<div class="content">
<h3> Data Karyawan </h3>
	<table align="center" class="table table-striped table-bordered table-highlight">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th >Nama Karyawan</th>
        <th width="35%" style="text-align:center;">Menu</th>
        </tr>
    </thead>
   <tbody>
<?php  
  $s="select * from `tbl_karyawan` order by `id_karyawan` asc";
  $q=mysql_query($s);
  $jum=mysql_num_rows($q);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
			$batas   = 10;
			$page = $_GET['page'];
			if(empty($page)){$posawal  = 0;$page = 1;}
			else{$posawal = ($page-1) * $batas;}

			$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
			while($d=mysql_fetch_array($q)){
				$id_karyawan = $d["id_karyawan"];							
				$nama_posisi=$d["nama_karyawan"];
				
				$sql="select * from tbl_penilaian where id_karyawan='$id_karyawan'";
					  $query=mysql_query($sql);
					  $jumlah=mysql_num_rows($query);
				
			  if($jumlah==0 ){ 
			   $btngap = "
			   <a href='?menu=inputskor&id=$id_karyawan'>
			   <button type='button' class='btn btn-danger btn-small'>Input Nilai Karyawan</button></a>
			   
			   ";
			  }
			  else{ 
			   $btngap="
			   <a href='?menu=dataskor&id=$id_karyawan'>
			   <button type='button' class='btn btn-success btn-small'>Nilai Karyawan</button></a>
			   "; 
			  }	
							
				echo"<tr>
					<td>$no</td>
					<td>$nama_posisi</td>
					<td><center>
					$btngap
					<a href='?menu=daftarkaryawan&pro=hapus&id=$id_karyawan' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'><button type='button' class='btn btn-danger btn-small'>Hapus</button></a>
					</td></center>
				</tr>";  
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center><B>Data Posisi Belum Terisi</B></center></td></tr>";}
?>
</tbody>
</table>
</div>
<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idpos=$_GET["id"];
		$s="delete from tbl_karyawan where id_karyawan='$idpos' ";
		$snilai="delete from tbl_penilaian where id_karyawan='$idpos' ";
		$delete=mysql_query($s);
		$deletenilai=mysql_query($snilai);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=daftarkaryawan';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=daftarkaryawan';</script>";
		}
		if($deletenilai){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=daftarkaryawan';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?mnu=daftarkaryawan';</script>";
		}
	}
?>