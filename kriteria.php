<h3> Kriteria penilaian</h3><br />
<a href="?menu=tambahkriteria"><input type="button" value="Tambah Kriteria" class="btn btn-success" /></a></br></p>
<table class='table table-bordered table-hover table-striped' align="center">
  <thead>
      <tr>
          <th width="2%">No</th>
          <th>Nama Kriteria</th>
          <th width="25%" style="text-align:center">Aksi</th>
      </tr>
  </thead>
  <tbody>
  <?php
  $no=1;
  $q_tampil=mysql_query("select * from tbl_kriteria order by id_kriteria");
  while($data=mysql_fetch_array($q_tampil))
  {
      echo "<tr>
      <td>$no</td>
      <td>$data[nama_kriteria]</td>
      <td>
	  <center>
            <a class='btn btn-sm btn-warning'  href='?menu=editkriteria&id=$data[id_kriteria]'>Edit</a>
      <a href='?menu=kriteria&pro=hapus&id=$data[id_kriteria]' onClick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'><button type='button' class='btn btn-danger btn-small'>Hapus</button></a>
	  </center>
      </td>
      </tr>
      ";	
      $no++;
  }
  ?>
  </tbody>
  </table>
<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$idpos=$_GET["id"];
		$s="delete from tbl_kriteria where id_kriteria='$idpos' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('Data Berhasil Dihapus');document.location.href='?menu=kriteria';</script>";
		}
		else{
			echo"<script>alert('Data Gagal Dihapus !');document.location.href='?menu=kriteria';</script>";
		}
	}
?>