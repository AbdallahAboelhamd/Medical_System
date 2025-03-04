<?php require '../../config.php';  ?>

<?php require BASE_LINK_ADMIN.'inc/header.php';  ?>
<?php require BASE_LINK.'functions/validate.php';  ?>


    <?php 

        if(isset($_POST['submit']))
        {
            $name = cleardata($_POST['name']);
            $password = cleardata($_POST['password']);
            $email = cleardata($_POST['email']);
            
          
            if(isEmpty($name) AND checkLengthCity($name,3))
            {
                if(validateEmail($email))
                {
                    if(isEmpty($password) AND checkLengthCity($password,6))
                    {
                        $check = chekRow('admins','admin_email',$email);
                        if(!$check)
                        {
                            $password = password_hash($password,PASSWORD_DEFAULT);
                            $sql = "INSERT INTO admins (`admin_name`,`admin_email`,`admin_password`)
                            VALUES ('$name','$email','$password') ";
                            $success_message = Insert($sql);
                        }
                        else 
                        {
                            $error_message = "This Email Already Exist";
                        }
                    }
                    else 
                    {
                        $error_message = "Pleas Type Correct Password - Password Must Be Grater Than 6 Chars";
                    }

                    
                    
                }
                else 
                {
                    $error_message = "Please Type Correct Email";
                }
                
            }
            else 
            {
                $error_message = "Please Type Admin Name";
            }

            require BASE_LINK.'functions/error.php';
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


<?php require BASE_LINK_ADMIN.'inc/footer.php';  ?>

