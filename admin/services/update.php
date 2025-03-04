<?php require '../../config.php';  ?>

<?php require BASE_LINK_ADMIN.'inc/header.php';  ?>
<?php require BASE_LINK.'functions/validate.php';  ?>



    <?php 

        if(isset($_POST['submit']))
        {
            $serv_id = $_POST['serv_id'];
            $name = cleardata($_POST['name']);
            $notEmpty = isEmpty($name);
          
            if($notEmpty)
            {
                $less = checkLengthCity($name,3);
                if($less)
                {
                    $sql = "UPDATE services SET `serv_name`='$name' WHERE `serv_id`='$serv_id' ";
                    $success_message = Update($sql);
                    header( "refresh:2;url=".BASE_URL_ADMIN."services");
                }
                else 
                {
                    $error_message = "Please Type Correct Service";
                }
            }
            else 
            {
                $error_message = "Please Type Service Name";
            }

            require BASE_LINK.'functions/error.php';
        }


    ?>





<?php require BASE_LINK_ADMIN.'inc/footer.php';  ?>


