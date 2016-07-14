<?php
  include "koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
	<title>SPK Kenaikan Gaji Karyawan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link rel="shortcut icon" href="favicon.gif" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
  </head>
  <body>
 <div class="container">
	<div class="row-fluid">
		<img src="images/header.jpg" />
	</div>
        <div class="navbar navbar-inverse"> 
        <div class="navbar-inner">
					<ul class="nav">
                   <li><a href="?menu=home">Home</a></li>
            	   <li><a href="?menu=inputkaryawan">Input Karyawan</a></li>
                   <li><a href="?menu=daftarkaryawan">Nilai Karyawan</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp; Data Utama &nbsp;<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                     	 <li><a href="?menu=kriteria">Kriteria</a></li>
                         <li><a href="?menu=tahun">Tahun Seleksi Karyawan</a></li>
                         <li><a href="?menu=target">Target Ketentuan Perusahaan </a></li>
                     </ul>
                     </li>
                     <?php 
					  $sql="select * from tbl_karyawan";
					  $query=mysql_query($sql);
					  $jumlah=mysql_num_rows($query);
					  if($jumlah<2){ ?>
                     &nbsp;
                     <?php } else { ?>
                      <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp; Profile Matching &nbsp;<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                     	 <li><a href="?menu=gap">GAP Karyawan</a></li>
                         <li><a href="?menu=bobotnilaigap">Bobot Nilai GAP</a></li>
                         <li><a href="?menu=coresecondfactor">Core & Secondary Factor </a></li>
                         <li><a href="?menu=totalhasilakhir">Total & Hasil Akhir</a></li>
                     </ul>
                     </li>
                     <?php } ?>
					</ul>
                    </div>
				</div>
                 
	 	<div class="row-fluid"><div class="isihalaman">
        <!-- END LOGIN FORM -->
        <?php $menu=$_GET["menu"]; 
		if ($menu==""){ include"home.php";}
		else if($menu=="home"){include"home.php";}
		else if($menu=="inputkaryawan"){include"input_karyawan.php";}
		else if($menu=="kriteria"){include"kriteria.php";}
		else if($menu=="editkriteria"){include"edit_kriteria.php";}
		else if($menu=="tambahkriteria"){include"tambah_kriteria.php";}
		else if($menu=="skor"){include"skor.php";}
		else if($menu=="tahun"){include"data_tahun.php";}
		else if($menu=="tambahtahun"){include"tambah_tahun.php";}
		else if($menu=="edittahun"){include"edit_tahun.php";}
		else if($menu=="target"){include"data_target.php";}
		else if($menu=="inputtarget"){include"input_target.php";}
		else if($menu=="edittarget"){include"edit_target.php";}
		else if($menu=="daftarkaryawan"){include"daftar_karyawan.php";}
		else if($menu=="inputskor"){include"input_skorkaryawan.php";}
		else if($menu=="dataskor"){include"data_skor.php";}
		else if($menu=="gap"){include"gap.php";}
		else if($menu=="bobotnilaigap"){include"bobotnilaigap.php";}
		else if($menu=="coresecondfactor"){include"coresecondfactor.php";}
		else if($menu=="totalhasilakhir"){include"totalhasilakhir.php";}
		?>
     
			<!--- Isi Content -->
	</div></div>
	<div class="footerweb">
        </br> 
        <p align="center">
        &copy; 2014  -  SPK Kenaikan Gaji Karyawan  |  Chriestan Dwi Kurniawan</p>
        </div>
  </div>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap-dropdown.js"></script>
      <script language='javascript' src='js/FusionCharts.js'></script>
  </body>
</html>




