<?php
ob_start();
require_once '../../../config.php'; 
require_once (BASE_LINK_ADMIN.'inc/header.php'); 
require_once (BASE_LINK.'function/messages.php'); 


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    deleteFromRow('cities', 'city_id', $id);
    $_SESSION['success_message'] = "City deleted successfully";
    header("Location: " . BASE_URL_ADMIN . "admins/cities/view.php"); 
    exit();  
} else {
    echo "Invalid ID";
}

require_once (BASE_LINK_ADMIN.'inc/footer.php');
ob_end_flush();
?>
