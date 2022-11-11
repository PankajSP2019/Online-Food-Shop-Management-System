<?php #include('../navi.php');?>


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







<html>
<title>Update Costomer Info</title>


<?php
    
    error_reporting(0);
    
    $firstName =$lastName =$gender = $dobN = $phoneNum = $email = $userName = $password = "";
    
  $firstNameErr = $lastNameErr = $genderErr = $dobNErr = $phoneNumErr = $emailErr = $userNameErr = $passwordErr = "";

	$successfulMessage = $errorMessage = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["firstname"])) {
            $firstNameErr = "Name Requried";
        } else {
            $firstName = check_input($_POST["firstname"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
                $firstNameErr = "Only letters and white space allowed";
            }
        }
        if(empty($_POST["lastname"])) {
            $lastNameErr = "Name Requried";
        } else {
            $lastName = check_input($_POST["lastname"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                $lastNameErr = "Only letters and white space allowed";
            }
        }
                
    if (empty($_POST["gender"])) {
    $genderErr= "Gender Required";
  } else {
    $gender = check_input($_POST["gender"]);
  }
        # agree
      if (empty($_POST["agree"])) {
    $agree_error = "Must click on checkbox ";
  } else {
    $agree = check_input($_POST["agree"]);
  }
        # agree
      if (empty($_POST["agree"])) {
    $agree_error = "Must click on checkbox ";
  } else {
    $agree = check_input($_POST["agree"]);
  }
       if (empty($_POST["email"])) {
           $emailErr = "Email Required";
       } else {
           $email = check_input($_POST["email"]);
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
       }
        
        if(empty($_POST["phonenum"])) {
            $phoneNumErr = "Phone Number Requried";
        } else {
            $phoneNum = check_input($_POST["phonenum"]);
            if(strlen($phoneNum)<11||strlen($phoneNum)>11||!preg_match("/^[0-9]{11}$/", $phoneNum))
            {
                $phoneNumErr="Invalid Number";       
            }
        }
         if(empty($_POST["username"])) {
            $userNameErr = "Name Requried";
        } else {
            $userName = check_input($_POST["username"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$userName)) {
                $userNameErr = "Only letters and white space allowed";
            }
        }
        if(empty($_POST["password"])) {
            $passwordErr = "Password Requried";
        }
        
      
} #main
    
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        //$data = htmlspecialchars($data);
        return $data;
}
 ?>


<?php
error_reporting(0);

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "onlinefoodshop");

$sl = $_GET['rn'];
$name = $_GET['nm'];
$gender = $_GET['gn'];
$phone = $_GET['phn'];
$email = $_GET['em'];
$dob = $_GET['db'];
$user_name = $_GET['un'];
$pass = $_GET['ps'];
$img = $_GET['img'];

?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final/project/css/style_regC.css">
</head>

<body>
    <div class="box">

        <img src="/final/Project/images/pageImage/download.png" class="avatar">
        <h1>Update</h1>
        <td width="1%">&nbsp</td>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" enctype="multipart/form-data">
            <div>


                <input type="text" name="sl" id="sl1" value="<?php echo $sl;?>" readonly>

                <input type="text" name="name" value="<?php echo $name;?>" id="firstname" required>
                <span style="color:red"><?php echo $firstNameErr; ?></span>

                <input type="text" name="phonenum" id="phonenum" required value="<?php echo $phone;?>">
                <span style="color:red"><?php echo $phoneNumErr; ?></span>
            </div>
            <div>
                <input type="text" id="email" name="email" value="<?php echo $email;?>" required>
                <span style="color:red"><?php echo $emailErr; ?></span>
            </div>
            <div>
                <label style="color:white">Date of Birth : </label>
                <input type="date" id="dob" name="dob" value="<?php echo $dob;?>" required>
                <span style="color:red"><?php echo $dobNErr; ?></span>
            </div>
            <div>
                <input type="text" name="username" id="username" value="<?php echo $user_name;?>" required>
                <span style="color:red"><?php echo $userNameErr;?></span>
            </div>
            <div>
                <input type="text" name="password" value="<?php echo $pass;?>" required>
                <span style="color:red"><?php echo $passwordErr; ?></span>
            </div>


            <div>
                <input type="submit" name="update" value="Update">
            </div>

        </form>
    </div>


</body>

</html>

<?php 
        
        # for upload data to file and database
    
    if($_GET['update']){
        
        $serial = $_GET['sl'];
        $name = $_GET['name'];
//        $gender = $_GET['gender'];
        $phone = $_GET['phonenum'];
        $email = $_GET['email'];
        $dob = $_GET['dob'];
        $uname = $_GET['username'];
        $pass = $_GET['password'];
        
        $query = "UPDATE customer SET name ='$name',phone='$phone',email='$email', dob='$dob',uname='$uname',pass='$pass' WHERE sl='$serial' ";
        
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


<?php  # for upload image
//    if(isset($_POST["submit"])){
//        $fileName = $_FILES['file1']['name'];
//        $fileType = $_FILES['file1']['type'];
//        $fileSize = $_FILES['file1']['size'];
//        $fileTmpLoc = $_FILES['file1']['tmp_name'];
//        $targetLoc = "photosFile/"; # have to chnage this location
//    
//        if(!empty($fileName)){
//    
//            # 5 mb = 5242880 bytes
//            if(($fileType == "image/jpeg" || $fileType == "image/png"|| $fileType == "image/jpg")){
////        if($fileName <= 5242880){
//                move_uploaded_file($fileTmpLoc , $targetLoc.$fileName); 
////            echo "Uploaded Successfully"."<br>";
////            echo "File Name : ".$fileName."<br>";
////            echo "File Type : ".$fileType."<br>";
////            echo "File Size (in bytes) : ".$fileSize."<br>";
////            echo "File Size (in mb) : ".$fileSize * 0.000001 ."<br>";
////            echo "File Location : ".$fileTmpLoc."<br>";
//////        }else{
////            echo "Select small file";
////        }
// 
//    }
//}
//else{
//    echo "Select File";
//    }
//}

?>


<?php 
     #for down the footer
    
    for ($x = 0; $x <= 32; $x++) {
        
        echo "<br> <br>";
        }
    
    include('../foot.php');
    echo "<br> ";
    ?>
