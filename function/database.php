<?php require_once(BASE_LINK."function/messages.php") ?>
<?php 

$dns = "mysql:host=localhost;dbname=medical_services";
$username = "root";
$password = "newpassword";
try{
$connect = new PDO($dns,$username,$password);
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}


function Insert($sql) {
    global $connect;
    
    $result = $connect->exec($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
function Update($sql) {
    global $connect;
    
    $result = $connect->exec($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
function isValueInDatabase($table, $field, $value){
    global $connect;

    $sql = "SELECT * FROM $table WHERE $field = :value"; 
    $stmt = $connect->prepare($sql);

    $stmt->bindParam(':value', $value, PDO::PARAM_STR);

    $stmt->execute();
    if($stmt->rowCount() > 0){
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } 
    return false;
}


function getRows($table) {
    global $connect;

    $sql = "SELECT * FROM $table"; 
    $stmt = $connect->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 
    return []; 
}

function deleteFromRow($table, $column, $value) {
    global $connect;
    $sql = "DELETE FROM $table WHERE $column = :value"; 
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':value', $value, PDO::PARAM_INT); 
    $stmt->execute();
}

function count_table($table) {
    global $connect; 
    
    $sql = "SELECT COUNT(*) FROM $table";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchColumn(); 
}

?>