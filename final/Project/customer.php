<?php include('navi.php');?>

<html>


<body style="background-color:#ABEBC6;">
    <?php
    
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
    <!DOCTYPE html>

    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/final/project/css/style_regC.css">
    </head>

    <body>
        <div class="box">

            <h1>Registration </h1>
            <td width="1%">&nbsp</td>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div>

                    <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
                    <span style="color:red"><?php echo $firstNameErr; ?></span>
                </div>
                <div class="input-box">
                    <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
                    <span style="color:red"><?php echo $lastNameErr; ?></span>
                </div>
                <label id="l4">Gender :</label>
                <input type="radio" id="male" name="gender" value="male">
                <label style="color:white" for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label style="color:white" for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label style="color:white" for="other">Other </label>
                <span style="color:red"><?php echo $genderErr ; ?></span>

                <div>
                    <input type="text" name="phonenum" id="phonenum" placeholder="Phone Number">
                    <span style="color:red"><?php echo $phoneNumErr; ?></span>
                </div>
                <div>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                    <span style="color:red"><?php echo $emailErr; ?></span>
                </div>
                <div>
                    <label style="color:white">Date of Birth : </label>
                    <input type="date" id="dob" name="dob" placeholder="Date of birth">
                    <span style="color:red"><?php echo $dobNErr; ?></span>
                </div>
                <div>
                    <input type="text" name="username" id="username" placeholder="user Name">
                    <span style="color:red"><?php echo $userNameErr; ?></span>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder=" Password">
                    <span style="color:red"><?php echo $passwordErr; ?></span>
                </div>
                <div>
                    <input type="file" style="color:white" name="file1" placeholder="Select your photo"> <br>
                </div>
                <div>
                    <br>
                    <input type="checkbox">
                    <label id="l4">I accept all terms & condition </label>
                </div>
                <div>
                    <input type="submit" name="submit" value="Register Now">
                </div>
                <div class="text">
                    <label id="l4">Login ? </label>
                    <a id="l1" href="login.php">Click Here</a>
                </div>

                <p style="color:green;"><?php echo $successfulMessage; ?></p>
                <p style="color:red;"><?php echo $errorMessage; ?></p>
            </form>
        </div>
    </body>
    <?php  # for upload data to file and database
if(isset($_POST["submit"])){
    
    
    $a = $_POST["firstname"];
    $b = $_POST["lastname"];
    
    $ab = $a." ".$b;
    
    $c = $_POST["gender"];
    $d = $_POST["phonenum"];
    $e = $_POST["email"];
    $g = $_POST["dob"];
    $h = $_POST["username"];
    $i = $_POST["password"];
    $j = $_FILES['file1']['name'];

    
    $myfile = fopen("info.txt","a") or die ("Unable to open file!");
    
    $txt = $a." - ".$b . " - ".$c." - ".$d." - ".$e." - ".$g." - ".$h." - ".$i." - ".$j."\n";
fwrite($myfile,$txt);
  
fclose($myfile);
    
    if (!empty($_POST["firstname"])){
        
        $server_name = "localhost";
        $user_name = "root";
        $pass = "";
        $dbname = "OnlineFoodShop";
        
        $con = new mysqli($server_name, $user_name, $pass, $dbname);

if ($con->connect_error) {
    die("Connection failed : ".$con->connect_error);
}

$sql = "INSERT INTO customer (name, gender, phone, email, dob, uname, pass, img) VALUES ('$ab', '$c', '$d', '$e', '$g', '$h', '$i', '$j')";

if ($con->query($sql) === TRUE) {
    
    echo '<script>
        alert("Registration Successfully");
        window.location = "customer.php";
    </script>' ;
}
else {
    echo '<script>
        alert("Failed To Registration");
        window.location = "customer.php";
    </script>';
}

$con->close();
}

//        
//        
//        
//        
//    }

}
    
?>


    <?php  # for upload image
    if(isset($_POST["submit"])){
    $fileName = $_FILES['file1']['name'];
$fileType = $_FILES['file1']['type'];
$fileSize = $_FILES['file1']['size'];
$fileTmpLoc = $_FILES['file1']['tmp_name'];
$targetLoc = "photosFile/";
    
if(!empty($fileName)){
    
    # 5 mb = 5242880 bytes
    if(($fileType == "image/jpeg" || $fileType == "image/png"|| $fileType == "image/jpg")){
//        if($fileName <= 5242880){
            move_uploaded_file($fileTmpLoc , $targetLoc.$fileName); 
//            echo "Uploaded Successfully"."<br>";
//            echo "File Name : ".$fileName."<br>";
//            echo "File Type : ".$fileType."<br>";
//            echo "File Size (in bytes) : ".$fileSize."<br>";
//            echo "File Size (in mb) : ".$fileSize * 0.000001 ."<br>";
//            echo "File Location : ".$fileTmpLoc."<br>";
////        }else{
//            echo "Select small file";
//        }
 
    }
}
else{
    echo "Select File";
}
}

?>

    </html>
    <?php 
    
    for ($x = 0; $x <= 32; $x++) {
        
        echo "<br> <br>";
        }
    
    include('foot.php');
    ?>
