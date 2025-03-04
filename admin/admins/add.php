<?php require_once '../../config.php';?>
<?php require_once (BASE_LINK_ADMIN.'inc/header.php');?>
<?php require_once (BASE_LINK." ../../function/validate.php")?>
<?php require_once(BASE_LINK."/function/database.php") ?>
<?php require_once(BASE_LINK."function/messages.php") ?>
<?php

 $name = $email = $password = '';  
    if(isset($_POST['submit'])){
         $name = cleardata($_POST['name']);
         $email = cleardata($_POST['email']);
         $password = cleardata($_POST['password']);
    }
    if(!isEmpty($name) && !isEmpty($email) && !isEmpty($password)){
        if(validateEmail($email)) {
            $newpassword = password_hash($password,PASSWORD_ARGON2ID);

            $sql = "INSERT INTO admins(admin_name,admin_email,admin_password)
                    VALUES('$name', '$email', '$newpassword')";
                   $success_message = Insert($sql);
        }
        else {
            require_once(BASE_LINK.'function/messages.php');
        }
    } 
  
?>

  <div class="col-sm-6 offset-sm-3 border p-3">
   <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label >Name </label>
        <input type="text" name="name" class="form-control" >
    </div>

    <div class="form-group">
        <label >Email </label>
        <input type="email" name="email" class="form-control" >
    </div>

    <div class="form-group">
        <label >Password </label>
        <input type="password" name="password" class="form-control" >
    </div>

    
    <button type="submit" name="submit" class="btn btn-success">Save</button>
</form>

</div>


<?php require_once(BASE_LINK_ADMIN . "inc/footer.php"); ?>


