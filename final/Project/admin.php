<?php
	session_start();

# work on it later
	if(isset($_SESSION['user'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your User Account For Login Into Admin Panel'); 
            </script>";
        echo"<script>
                window.location = 'profile.php';
            </script>";
		}

if(isset($_SESSION['delivery_email'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Deliveryman Account For Login Into Admin Panel'); 
            </script>";
        echo"<script>
                window.location = 'deliveryman_page.php';
            </script>";
		}

if(isset($_SESSION['admin_id'])){
			header("location:adminpage.php");
		}

if(isset($_POST['submit'])){
    
        
        function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    } # function
        
        $uname = validate($_POST['admin_id']);
        $pass = validate($_POST['admin_pass']);
        
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

        }else{
            
            $conn = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($conn, "onlinefoodshop");

        $sql = "SELECT * FROM admin WHERE id='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['id'] === $uname && $row['password'] === $pass) {
                
                $_SESSION['admin_sl'] = $row['sl'];
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_pass'] = $row['password'];
                
                
                
                header("Location:adminpage.php");

                #exit();
            }else{            
                echo "<script> alert('Incorect User name or password'); </script>";
            }

        }else{           
            echo "<script> alert('Incorect User name or password'); </script>";
        }
    }
  
}# isset($_POST['submit'])

?>



<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href = "/final/project/css/style_admin.css" >
        
        <body>
            <?php include('navi.php');?>
            
            <div class="loginbox">
                <img src="/final/Project/images/pageImage/download.png" class="avatar">
                <h1>Admin Login</h1>
                <form action="admin.php" method="post">
                    <p>UserName</p>
                    <input type="text" name="admin_id" placeholder="Enter User Name">
                    
                    <p>Password</p>
                    <input type="password" name="admin_pass" placeholder="Enter Password">
                    
                    <input type="submit" name="submit" value="Login">
                    
                    <a href="#">Lost Your Password</a><br>
                    <a href="#">Don't have an account?</a>
                </form>
                
            </div>
            
        
        </body>
        
     
    </head>

</html>


<?php #include('foot.php');?>
