
<?php
session_start();

# work on it later
	if(isset($_SESSION['user'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your User Account For Login as Deliveryman'); 
            </script>";
        echo"<script>
                window.location = 'profile.php';
            </script>";
		}

if(isset($_SESSION['admin_id'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Admin Account For Login as Deliveryman'); 
            </script>";
        echo"<script>
                window.location = 'adminpage.php';
            </script>";
		}


if(isset($_SESSION['delivery_email'])){
			header("location:deliveryman_page.php");
		}
?>


<html>


<head>

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


        function validateForm() {

            let email = document.forms["Form1"]["EMAIL"].value;
            let pass = document.forms["Form1"]["PASS"].value;


            if (email == "") {
                alert("Please enter your email");

                return false;
            }

            if (pass == "") {
                alert("Please enter your password.");

                return false;
            }
        }

    </script>

    <title>Delivery Man</title>
    <link rel="stylesheet" href="/final/project/css/style_delivery_log_reg.css">
</head>

<body>
    <?php include('navi.php');?>
    <div class="container">
        

        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>DELIVERYMAN LOGIN</h2>
                    <form name="Form1" action="deliveryman_log_reg.php" onsubmit="return validateForm()" method="post">
                        <input type="email" name="EMAIL" class="input-box" placeholder="Your email">
                        <input type="password" name="PASS" class="input-box" placeholder="Your password">
                        <button type="submit" name="login" id="btn1" class="submit-btn">LOGIN</button>
                    </form>

                    <button type="button" class="btn" id="btn2" onclick="openRegister()">I am new here</button>
                </div>
                <div class="card-back">

                    <h2>DELIVERYMAN REGISTRATION</h2>
                    <form name="Form2" action="deliveryman_log_reg.php" onsubmit="return validateForm2()" method="post">
                        <input type="text" name="phone" class="input-box" placeholder="Your Phone">
                        <input type="text" name="NAME" class="input-box" placeholder="Your name">
                        <input type="email" name="EMAILL" class="input-box" placeholder="Your email">
                        <input type="password" name="PASSWORD" class="input-box" placeholder="Your password">
                        <button type="submit" name="register" id="btn3" class="submit-btn">REGISTER</button>


                    </form>

                    <button type="button" id="btn4" class="btn" onclick="openLogin()">I have an account</button>



                </div>
            </div>
        </div>
    </div>



    <script>
        var card = document.getElementById("card");

        function openRegister() {
            card.style.transform = "rotateY(-180deg)";
        }

        function openLogin() {
            card.style.transform = "rotateY(0deg)";
        }

    </script>






</body>

</html>


<?php  # for upload data to file and database

$a="";

if(isset($_POST["register"])){
    
    if(strlen($_POST["phone"])>11 or strlen($_POST["phone"])<11 or !preg_match("/^[0-9]{11}$/", $_POST["phone"]) ){
        echo '<script>alert("Invalid Phone number")</script>';
    }else{
        $a = $_POST["phone"];
    }
    
//    $a = $_POST["phone"];
    $b = $_POST["NAME"];    
    $c = $_POST["EMAILL"];
    $d = $_POST["PASSWORD"];
    
    
        
        $server_name = "localhost";
        $user_name = "root";
        $pass = "";
        $dbname = "OnlineFoodShop";
        
        $con = new mysqli($server_name, $user_name, $pass, $dbname);

if ($con->connect_error) {
    die("Connection failed : ".$con->connect_error);
}

$sql = "INSERT INTO deliveryman (phone, name, email, password) VALUES ('$a', '$b', '$c', '$d')";

if(!empty($a)){
    if ($con->query($sql) === TRUE) {
    
    echo '<script>
        alert("Deliveryman Registration Successfully");
        window.location = "deliveryman_log_reg.php";
    </script>' ;
}
else {
    echo '<script>
        alert("Failed To Deliveryman Registration");
        window.location = "deliveryman_log_reg.php";
    </script>';
}
}

$con->close();


}
    
?>


<?php #login
if(isset($_POST['login'])){
    
        
        function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    } # function
        
        $d_email = validate($_POST['EMAIL']);
        $d_pass = validate($_POST['PASS']);
        
        
            
            $conn = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($conn, "onlinefoodshop");

        $sql = "SELECT * FROM deliveryman WHERE email='$d_email' AND password='$d_pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $d_email && $row['password'] === $d_pass) {
                
                $_SESSION['name'] = $row['name'];
                $_SESSION['delivery_email'] = $row['email'];
                $_SESSION['delivery_pass'] = $row['password'];
                $_SESSION['delivery_sl'] = $row['sl'];
                
                echo '<script>
                        alert("Deliveryman Login Successful");
                        window.location = "deliveryman_page.php";
                    </script>' ;

                #exit();
            }else{            
                echo "<script> alert('Incorect User name or password'); </script>";
            }

        }else{           
            echo "<script> alert('Incorect User name or password'); </script>";
        }
    
  
}

?>
