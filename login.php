<?php 

require_once 'DB_Function.php';
$db = new DB_Function();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // menerima parameter POST ( email dan password )
  $username = $_POST['username'];
  $password = $_POST['password'];
  
 
    // get the user by email and password
    // get user berdasarkan email dan password
    $user = $db->getUserByEmailAndPassword($username, $password);
 
    if ($user != false) {
        // user ditemukan
        $response["error"] = FALSE;
        $response["uid"] = $user["unique_id"];
        $response["user"]["nama"] = $user["nama"];
        $response["user"]["username"] = $user["username"];
        echo json_encode($response);
    } else {
        // user tidak ditemukan password/email salah
        $response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Password/username salah";
        echo json_encode($response);
    }
} else {
  $response["error"] = TRUE;
   $response["error_msg"] = "Parameter (username atau password) ada yang kurang";
     echo json_encode($response);
}




 ?>

