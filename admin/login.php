<?php require_once("../config.php") ?>
<?php if(isset($_SESSION['admin_name'])){
      header("location: ".BASE_URL_ADMIN."index.php");
  }?>
<?php require_once(BASE_LINK."function/validate.php") ?>
<?php require_once(BASE_LINK."function/messages.php") ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo BASE_URL_ASSETS; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL_ASSETS; ?>/css/style.css" >

    <title>Dashboard | Login</title>
  </head>
  <body>
    <?php 
       if(isset($_POST['submit'])){
          $email = $_POST['email'];
          $password = $_POST['password'];
          if(!isEmpty($email) &&  !isEmpty($password)){
              if(validateEmail($email)){
                 $checkdata = isValueInDatabase("admins","admin_email",$email);
                 $checkpassword = password_verify($password, $checkdata['admin_password']);
                  if($checkpassword){
                    $_SESSION['admin_name'] = $checkdata['admin_name']; 
                    $_SESSION['admin_email'] = $checkdata['admin_email'];
                    $_SESSION['admin_id'] = $checkdata['admin_id']; 
                    header("Location: ".BASE_URL_ADMIN."index.php"); 
                    exit();

                   }else{
                    $error_message = "Not matched password";
                  }
                }
              else{
                $error_message = "Not valid email!";
              }
          }else{
            $error_message = "This Field is requierd";
          }
       }
    ?>

        <div class="cont-login d-flex align-items-center justify-content-around">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5" >
                <div class="row">
                    
                    <?php  require BASE_LINK.'function/messages.php'; ?>
                    <div class="col-sm-12  ">
                        <h3 class="text-center p-3 text-white">Login</h3>
                    </div>
                    <div class="col-sm-6 offset-sm-3 ">
                        <div class="form-group">
                            <label >Email </label>
                            <input type="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label >Password </label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        <div class="form-group">
                           
                            <input type="submit" name="submit" class="form-control btn btn-success"   >
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

    <script src="<?php echo BASE_URL_ASSETS; ?>/js/jquery-3.4.1.min.js" ></script>
    <script src="<?php echo BASE_URL_ASSETS; ?>/js/popper.min.js" ></script>
    <script src="<?php echo BASE_URL_ASSETS; ?>/js/bootstrap.min.js" ></script>



  </body>
</html>
