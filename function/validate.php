<?php
function cleardata($string) {
    $string = trim($string); 
    $string = stripslashes($string);
    $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8'); 
    return $string;
}


function isEmpty($data){
  if(empty($data)){
    return true;
  }
  return false;
}


function validateEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        return false;
    }

$string = '/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/';  
    if(!preg_match($string,$email))
       {
          return false;
       }
       else
       {
          return true;
       }
}

function checkLengthCity($str){
  return trim(strlen($str)) > 3;
}

function chekRow($table, $column, $value) {
  global $connect; 
  
  $sql = "SELECT COUNT(*) FROM $table WHERE $column = :value";
  $stmt = $connect->prepare($sql);
  $stmt->bindParam(':value', $value, PDO::PARAM_STR);
  $stmt->execute();
  
  return $stmt->fetchColumn() > 0; 
}

?>