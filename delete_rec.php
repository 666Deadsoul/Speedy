<?php

$con = mysqli_connect("localhost", "root", "", "project2");
$res_id = $_GET["r_id"];

$sql = "DELETE FROM result WHERE result_id = '$res_id'";

if (mysqli_query($con, $sql)) {
    header("location:result.php"); 
} else {
    echo "<script>alert('Failed to delete the record.');</script>"; 
}
?>
