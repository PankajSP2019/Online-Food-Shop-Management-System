<?php 

echo "<script>confirm('Press a button!');</script>";

session_start();
session_unset();
session_destroy();

// for destroy specfic session
unset($_SESSION['admin_id']);
unset($_SESSION['admin_pass']);

header('location:admin.php')

?>
<?php //include('navi.php');
//echo"<hr>";
//header('location:login.php'); ?>