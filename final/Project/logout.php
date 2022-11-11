<?php 

echo "<script>confirm('Press a button!');</script>";

session_start();
session_unset();
session_destroy();

header('location:login.php')

?>
<?php //include('navi.php');
//echo"<hr>";
//header('location:login.php'); ?>



