




<?php
    include_once "Database.php";
    $sql    = "SELECT * FROM test WHERE Parent_ID is NULL or Parent_ID = 2 or Parent_ID = 3";
    $result = $pdo->query($sql);  //a valid MySQL database adapter with a 
                                 //"query" method which returns the full result set.
    $arr = array();
    foreach($result as $row) {
       $sql = "SELECT * FROM test WHERE Parent_ID = {$row['SI_No']}";
       $result2 = $pdo->query($sql);
       $row["Title"] = $result2;
       $arr[] = $row;
    }
    echo "<pre>";
    var_dump($arr);
    echo "</pre>";
   // echo json_encode($arr);
?>
