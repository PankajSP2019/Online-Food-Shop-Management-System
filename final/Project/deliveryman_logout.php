<?php 

echo "<script>confirm('Press a button!');</script>";

session_start();
session_unset();
session_destroy();

// for destroy specfic session
unset($_SESSION['delivery_email']);
unset($_SESSION['delivery_pass']);

header('location:deliveryman_log_reg.php')

?>
<?php //include('navi.php');
//echo"<hr>";
//header('location:login.php'); ?>