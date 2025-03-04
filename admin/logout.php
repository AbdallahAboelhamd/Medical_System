<?php require_once '../config.php';?>
<?php if(isset($_SESSION['admin_name'])){
     session_destroy();
     header("location: ".BASE_URL_ADMIN."login.php");
}else{
    header("location: ".BASE_URL);

}

?>