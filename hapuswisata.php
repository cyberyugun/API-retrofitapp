<?php 
require_once('config.php');
$id=$_POST['idwisata'];
$response=array();
$sql="DELETE FROM tbl_wisata WHERE id_wisata='$id'";
if(mysqli_query($conn,$sql)){
	$response["value"]=1;
	$response["message"]="Berhasil Dihapus";
	echo json_encode($response);
}else {
	$response["value"]=0;
	$response["message"]="Gagal Dihapus";
	echo json_encode($response);
	}

mysqli_close($conn);

 ?>