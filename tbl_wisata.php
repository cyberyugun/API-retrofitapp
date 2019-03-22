<?php 
require_once('config.php');
if(isset($_GET['key'])){
$key=$_GET['key'];
$sql="SELECT * FROM tbl_wisata where nama_wisata LIKE '%$key%'";
$res=mysqli_query($conn,$sql);
$result=array();
while ($row=mysqli_fetch_assoc($res)) {
	array_push($result, array(
	'idwisata'=>$row['id_wisata'],
	'namawisata'=>$row['nama_wisata'],
	'tempatwisata'=>$row['tempat_wisata'],
	'deskripsi'=>$row['deskripsi'],
	'harga'=>$row['harga']));

}

echo  json_encode($result);
}else{
$sql="SELECT * FROM tbl_wisata";
$res=mysqli_query($conn,$sql);
$result=array();
while ($row=mysqli_fetch_assoc($res)) {
array_push($result, array(
	'idwisata'=>$row['id_wisata'],
	'namawisata'=>$row['nama_wisata'],
	'tempatwisata'=>$row['tempat_wisata'],
	'deskripsi'=>$row['deskripsi'],
	'harga'=>$row['harga']));
}
echo json_encode($result);
}
mysqli_close($conn);
 ?>

