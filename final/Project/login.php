<?php
	session_start();

if(isset($_SESSION['admin_id'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Admin Account First!! For Login As a Customer'); 
            </script>";
        echo"<script>
                window.location = 'adminpage.php';
            </script>";
		}
if(isset($_SESSION['delivery_email'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Deliveryman Account First!! For Login As a Customer'); 
            </script>";
        echo"<script>
                window.location = 'deliveryman_page.php';
            </script>";
		}

	if(isset($_SESSION['user'])){
			header("location:profile.php");
		}

if(isset($_POST['submit'])){
    
   # if (isset($_POST['uname']) && isset($_POST['password'])){
        
        function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    } # function
        
        $uname = validate($_POST['name']);
        $pass = validate($_POST['pass']);
        
        if (empty($uname)){

         # header("Location: index.php?error=User Name is required");
            echo "<script>
            alert('Enter Valid User Name !!!! User Name Should not  Be Empty');
            </script>";

        

        }else if(empty($pass)){

         # header("Location: index.php?error=Password is required");
             echo "<script>
            alert('Enter Valid Password !!!! Password Should not  Be Empty');
            </script>";


        # exit();

        }else{
            
            $conn = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($conn, "onlinefoodshop");

        $sql = "SELECT * FROM customer WHERE uname='$uname' AND pass='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['uname'] === $uname && $row['pass'] === $pass) {

               # echo "Logged in!";
                
                 $_SESSION['sl'] = $row['sl'];
                 
                $_SESSION['phn'] = $row['phone'];
                
                $_SESSION['name'] = $row['name'];

                $_SESSION['user'] = $row['uname'];
                
                $_SESSION['email'] = $row['email'];

                $_SESSION['pass'] = $row['pass'];
                
                $_SESSION['image'] = $row['img']; 
                
                $_SESSION['order_array'] = array(); // for order array
                
                

                # $_SESSION['id'] = $row['id'];

                header("Location: profile.php");

                exit();

            }else{

                #header("Location: index.php?error=Incorect User name or password");
                
                echo "<script> alert('Incorect User name or password'); </script>";
            
            

                #exit();

            }

        }else{

            # header("Location: index.php?error=Incorect User name or password");
            
            echo "<script> alert('Incorect User name or password'); </script>";

            # exit();

        }

    }
       
        
    # }#(isset($_POST['uname']) && isset($_POST['password']))
    
}# isset($_POST['submit'])

/* # pervious code
	if(isset($_POST['submit'])){
		$user = $_POST['name'];// save username to user variable 
		$pass = $_POST['pass'];// save password to pass variable 

		//session_start();
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;

		//echo "Hi ". $_SESSION['user'];
		header("location:profile.php");
	} */
?>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Customer Login</title>
    <link rel="stylesheet" type="text/css" href="/final/project/css/style_loginC.css">
</head>

<body>
    <?php include('navi.php');?>
    <form class="box" action="login.php" method="post">
        <img src="/final/Project/images/pageImage/download.png" class="avatar">
        <h1>Customer Login</h1>
        <input type="text" name="name" placeholder="User Name">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="submit" value="Login">
        <label id="l4">Create new Account ? </label>
        <a id="l1" href="customer.php">Click Here</a>

    </form>
    <?php
    
    # for the footer set in the of the page
    
    for($i = 0;$i<28;$i++){
        echo "<br>";
        
    }
    
    
    ?>
    <?php include('foot.php');?>
    <br>
</body>


</html>
