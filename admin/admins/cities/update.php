<?php 
  require_once '../../../config.php';
  require_once (BASE_LINK_ADMIN.'inc/header.php');
  require_once (BASE_LINK."function/validate.php");
  require_once (BASE_LINK."function/database.php");



  if(isset($_POST['submit'])){
    $city_id = $_POST['city_id'];
    $nameOfCity = $_POST['nameOfCity']; 

    if(!isEmpty($nameOfCity) && checkLengthCity($nameOfCity)){
        $row = isValueInDatabase('cities','city_id',$city_id);
        if($row){
            $sql = "UPDATE cities SET city_name = '$nameOfCity' WHERE city_id = '$city_id'";
            $success_message = Update($sql);
        } else {
            $error_message = "City not found!";
        }
    } else {
        $error_message = "Please set the city name correctly!";
    }
  }

  require BASE_LINK."function/messages.php";
?>

<?php require_once (BASE_LINK_ADMIN.'inc/footer.php');?>
