<?php require '../../config.php';  ?>

<?php require BASE_LINK_ADMIN.'inc/header.php';  ?>
<?php require BASE_LINK.'functions/validate.php';  ?>


<?php  
if(isset($_GET['id']) && is_numeric($_GET['id']))
{ 
    $row = isValueInDatabase('serv_id',$_GET['id'],'services');
    if(!$row){ header("location:".BASE_URL); }

    $serv_id = $row['serv_id'];
}
else
{
    header("location:".BASE_URL_ADMIN);
}



?>





    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Edit Service</h3>
        <form method="post" action="<?php echo BASE_URL_ADMIN.'services/update.php'; ?>" >
            <div class="form-group">
                <label >Name Of Service</label>
                <input type="text" name="name" value="<?php echo $row['serv_name']; ?>" class="form-control" >
                <input type="hidden" name="serv_id" value="<?php echo $serv_id; ?>" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>


<?php require BASE_LINK_ADMIN.'inc/footer.php';  ?>

