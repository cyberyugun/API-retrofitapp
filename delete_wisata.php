<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$response=array();
	//mendapatkan data
	$nis=$_POST['idwisata'];


	require_once('config.php');
	$sql="DELETE FROM tbl_wisata WHERE id_wisata='$nis'";
	if (mysqli_query($conn,$sql)) {
		$response["value"]=1;
		$response["message"]="Berhasil Dihapus";
		echo json_encode($response);
	}else{
		$response["value"]=0;
		$response["message"]="oops! Gagal Dihapus!";
		echo json_encode($response);
	}
	mysqli_close($conn);
}
 ?>