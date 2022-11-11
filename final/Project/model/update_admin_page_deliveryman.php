<!--<h1>update_admin_page_deliveryman.php</h1>-->

<?php
    
session_start();

if(empty($_SESSION['admin_id'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Login Into Your Admin Account First For Update Information'); 
            </script>";
        echo"<script>
                window.location = '../admin.php';
            </script>";
		}

?>

<?php
error_reporting(0);

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "onlinefoodshop");

$dsl = $_GET['dl'];
$dphn = $_GET['dphn'];
$dnm = $_GET['dnm'];
$dmail = $_GET['dmail'];
$dpass = $_GET['dpass'];

?>



<html>


<head>
    <style>
        #sub1 {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid black;
            padding: 14px 40px;
            outline: none;
            color: black;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
            font-size: 17px;
        }

        #sub1:hover {
            background: #2ecc71;
        }

    </style>

    <script>
        function validateForm2() {
            let phone2 = document.forms["Form2"]["phone"].value;
            let name2 = document.forms["Form2"]["NAME"].value;
            let email2 = document.forms["Form2"]["EMAILL"].value;
            let pass2 = document.forms["Form2"]["PASSWORD"].value;


            if (phone2 == "") {
                alert("Please enter your phone number.");

                return false;
            }
            if (name2 == "") {
                alert("Please enter your name.");

                return false;
            }
            if (email2 == "") {
                alert("Please enter your email");

                return false;
            }

            if (pass2 == "") {
                alert("Please enter your password");

                return false;
            }
        }

    </script>

    <title>Delivery Man Information Update</title>
    <link rel="stylesheet" href="/final/project/css/style_delivery_log_reg.css">
</head>

<body>
    <?php #include('navi.php');?>
    <div class="container">


        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>DELIVERYMAN REGISTRATION</h2>
                    <form name="Form2" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm2()" method="get">


                        <input type="text" name="sl" style="color:black; font-size:17px;" value="<?php echo $dsl;?>" class="input-box" readonly>

                        <input type="text" name="phone" style="color:black; font-size:17px;" value="<?php echo $dphn;?>" class="input-box">

                        <input type="text" name="NAME" style="color:black; font-size:17px;" value="<?php echo $dnm;?>" class="input-box">

                        <input type="email" name="EMAILL" style="color:black; font-size:17px;" value="<?php echo $dmail;?>" class="input-box">

                        <input type="text" name="PASSWORD" style="color:black; font-size:17px;" value="<?php echo $dpass;?>" class="input-box">

                        <input type="submit" name="update1" id="sub1" value="Update">



                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>


<?php 
        
        # for upload data to file and database
    
    if($_GET['update1']){
        
        $serial = $_GET['sl'];
        $phone = $_GET['phone'];
        $name = $_GET['NAME'];
        $email = $_GET['EMAILL'];
        $pass = $_GET['PASSWORD'];
        
        $query = "UPDATE deliveryman SET phone ='$phone',name='$name',email='$email', password='$pass' WHERE sl='$serial' ";
        
        $data = mysqli_query($con, $query);
        
        if($data){
            echo "<script>alert('Record Updated')</script>";
            
            ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/final/Project/adminpage.php ">
<?php
            
        }else{
             echo "<script>alert('Failed To Update Record')</script>";
            
            ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/final/Project/adminpage.php ">
<?php
            
        }
        
        
    }

    
?>
