<h3> Tahun Penilaian </h3>
<a href="?menu=tambahtahun"><span class="btn btn-inverse btn-small fa fa-plus">   Tambah Tahun Penilaian</span></a></p>
	<table align="center" class="table table-striped table-bordered table-highlight">
    <thead>
      <tr>
        <th width="5%"  >No.</th>
        <th >Tahun Penilaian</th>
         <th >Status</th>
        <th width="20%" style="text-align:center;">Menu</th>
        </tr>
    </thead>
   <tbody>
<?php  
  $s="select * from `tbl_tahun` order by `id_tahun` asc";
  $q=mysql_query($s);
  $jum=mysql_num_rows($q);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
			$batas   = 10;
			$page = $_GET['page'];
			if(empty($page)){$posawal  = 0;$page = 1;}
			else{$posawal = ($page-1) * $batas;}

			$s2 = $s." LIMIT $posawal,$batas";
			$q2  = mysql_query($s2);
			$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
			while($d=mysql_fetch_array($q2)){
				$id_tahun = $d["id_tahun"];							
				$tahun_penilaian=$d["tahun"];
				$status=$d["status"];
				if($status==0){ $terpilih="<strong><p class='text-error'>Non Aktif</p></strong>";}
				else{ $terpilih="<strong><p class='text-success'>Aktif</p></strong>";}		
				echo"<tr>
					<td>$no</td>
					<td>$tahun_penilaian</td>
					<td>$terpilih</td>
					<td><center>
					<a href='?menu=edittahun&id=$id_tahun'>
					<span class='btn btn-warning btn-small fa fa-edit' >  Ubah</span></a>
					
					<a href='?menu=tahun&pro=hapus&id=$id_tahun' 
					onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>
					<span class='btn btn-danger btn-small fa fa-times' >  Hapus</span></a>
					</td></center>
				</tr>";  
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center><B>Tahun Penilaian Belum Terisi</B></center></td></tr>";}
?>
</tbody>
</table>
<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idpos=$_GET["id"];
		$s="delete from tbl_tahun where id_tahun='$idpos' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=tahun';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=tahun';</script>";
		}
	}
?>