<?php
    
session_start();

if(empty($_SESSION['user'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Login Into Your User Account First For Check Order'); 
            </script>";
        echo"<script>
                window.location = '../login.php';
            </script>";
		}

?>

<?php

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "onlinefoodshop");

$sl = $_GET['osl'];
$dd = "done";

$query = "UPDATE foodorder SET status ='$dd' WHERE orderid ='$sl' ";

$data = mysqli_query($con, $query);

if($data){
    echo "<script> alert('Thanks For Being With Us..Enjoy Your Food') </script>"; 
    
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/final/Project/profile.php ">
<?php
    
}else{
    echo "<script> alert('Something Went Wrong') </script>"; 
    
 ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/final/Project/profile.php ">
<?php

}
