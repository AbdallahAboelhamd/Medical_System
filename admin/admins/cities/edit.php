<?php ob_start(); ?>
<?php require_once '../../../config.php'; ?>
<?php require_once (BASE_LINK_ADMIN.'inc/header.php'); ?>
<?php require_once (BASE_LINK."function/database.php"); ?>

<?php
$city_id = null;
$row = null;

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $city_id = $_GET['id'];
    $row = isValueInDatabase('cities', 'city_id', $city_id);
    if (!$row) {
        echo "City not found in database!";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['city_id']) && is_numeric($_POST['city_id'])) {
    $city_id = $_POST['city_id'];
    $nameOfCity = $_POST['nameOfCity'];

    if (!empty($nameOfCity)) {
        $sql = "UPDATE cities SET city_name = '$nameOfCity' WHERE city_id = '$city_id'";
        if (Update($sql)) {
            echo "City updated successfully!";
            header("refresh:2;url=" . BASE_URL_ADMIN . "cities");
            exit;
        } else {
            echo "Failed to update city.";
        }
    } else {
        echo "City name cannot be empty!";
    }
} else {
    echo "Invalid request!";
    exit;
}
?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name Of City</label>
            <input type="text" name="nameOfCity" class="form-control" value="<?php echo isset($row['city_name']) ? htmlspecialchars($row['city_name']) : ''; ?>" required>
            <input type="hidden" name="city_id" value="<?php echo htmlspecialchars($city_id); ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>
</div>

<?php require_once(BASE_LINK_ADMIN . "inc/footer.php"); ?>
<?php ob_end_flush(); ?>

