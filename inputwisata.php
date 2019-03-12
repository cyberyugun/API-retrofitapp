<?php 
require_once 'DB_Function.php';
$db = new DB_Function();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['namawisata']) && isset($_POST['tempatwisata']) && isset($_POST['deskripsi'])&& isset($_POST['harga'])) {
 
    // menerima parameter POST ( nama, email, password )
    $namawisata = $_POST['namawisata'];
    $tempatwisata = $_POST['tempatwisata'];
    $deskripsi = $_POST['deskripsi'];
    $harga=$_POST['harga'];
 

 // $namawisata = "jam";
 //    $tempatwisata = $_POST['tempatwisata'];
 //    $deskripsi = $_POST['deskripsi'];
 //    $harga=$_POST['harga'];
 //    // Cek jika user ada dengan email yang sama
    if ($db->isWisataExisted($namawisata)) {
        // user telah ada
        $response["error"] = TRUE;
        $response["error_msg"] = "User telah ada dengan namawisata " . $username;
        echo json_encode($response);
    } else {
        // buat user baru
        $user = $db->simpanDataWisata($namawisata, $tempatwisata, $deskripsi,$harga);
        if ($user) {
            // simpan user berhasil
            $response["error"] = FALSE;
            $response["user"]["namawisata"] = $user["nama_wisata"];
            $response["user"]["tempatwisata"] = $user["tempat_wisata"];
             $response["user"]["deskripsi"] = $user["deskripsi"];
              $response["user"]["harga"] = $user["harga"];
            echo json_encode($response);
        } else {
            // gagal menyimpan user
            $response["error"] = TRUE;
            $response["error_msg"] = "Terjadi kesalahan saat melakukan Penambahan Data";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (namawisata, tempatwisata,deskripsi atau harga) ada yang kurang";
    echo json_encode($response);
}
 ?>