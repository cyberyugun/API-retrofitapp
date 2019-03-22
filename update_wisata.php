<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$response=array();
	//mendapatkan data
	$nis=$_POST['idwisata'];
	$nama=$_POST['namawisata'];
	$tempat=$_POST['tempatwisata'];
	$tanggal=$_POST['deskripsi'];
	$harga=$_POST['harga'];

	require_once('config.php');
	$sql="UPDATE tbl_wisata set id_wisata='$nis',nama_wisata='$nama',tempat_wisata='$tempat',deskripsi='$tanggal',harga='$harga' WHERE id_wisata='$nis'";
	if (mysqli_query($conn,$sql)) {
		$response["value"]=1;
		$response["message"]="Berhasil Diubah";
		echo json_encode($response);
	}else{
		$response["value"]=0;
		$response["message"]="oops! Gagal Merubah!";
		echo json_encode($response);
	}
	mysqli_close($conn);
}
 ?>