<?php
$host="localhost";
$user="root";
$password="123456";
$database="gaji_karyawan";

$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
//cek koneksi
if($koneksi){
	//echo "berhasil koneksi";
}else{
	echo "gagal koneksi";
}

?>