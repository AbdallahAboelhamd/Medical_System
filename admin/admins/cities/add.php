<?php require_once '../../../config.php';?>
<?php require_once (BASE_LINK_ADMIN.'inc/header.php');?>
<?php require_once (BASE_LINK." ../../function/validate.php")?>

<?php 
  if(isset($_POST['submit'])){
    $nameOfCity = $_POST['nameOfCity'];
  if(!isEmpty($nameOfCity) && checkLengthCity($nameOfCity)){
    $sql = "INSERT INTO cities(city_name)
            VALUES('$nameOfCity')";
            Insert($sql);
            $success_message = "Added sucessfully";
  }else{
    $error_message = "Set the City";
  }
}
  require BASE_LINK."function/messages.php";

?>

<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New City</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name Of City</label>
                <input type="text" name="nameOfCity" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>


<?php require_once(BASE_LINK_ADMIN . "inc/footer.php");?>
