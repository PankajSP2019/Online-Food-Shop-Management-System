<?php
session_start();
if(isset($_SESSION['admin_id'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Admin Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'adminpage.php';
            </script>";
		}

if(isset($_SESSION['delivery_email'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Deliveryman Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'deliveryman_page.php';
            </script>";
		}
?>


<?php
error_reporting(0);

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "onlinefoodshop");

if($_SESSION['user']){
    $Osl = $_GET['arr'];
    unset($_SESSION['order_array'][$Osl]); 
    $_SESSION['order_array']=array_values($_SESSION['order_array']);
   
    echo"<script>
                window.location = 'order.php';
            </script>";
}
else{
        echo"<script>
                alert('Please Login Your User Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'login.php';
            </script>";
    }





?>