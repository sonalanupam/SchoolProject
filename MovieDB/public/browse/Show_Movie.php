<?php require_once('../../private/initialize.php') ?>

<?php
$id = isset($_GET['id']) ? $_GET['id]'] : '1';

$sql = "SELECT * from Movies ";
$sql = "WHERE id= '". $id ."'";
$result = mysqli_query($db,$sql);

confirm_result_set($result);
 
$movie = mysqli_fetch_assoc($result);

mysqli_free_result($result);

?>




