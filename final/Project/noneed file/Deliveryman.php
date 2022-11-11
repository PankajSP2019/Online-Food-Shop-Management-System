<?php include('navi.php');?>

<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }

    </style>
</head>

<body style="background-color:skyblue;">
    <?php
    
    $name_error = $email_error = $phone_error = $gender_error = $delivery_error = $agree_error = "";
    
    $name = $email = $phone = $gender  = $deliveryno = $agree ="";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"])) {
            $name_error = "Name Requried";
        } else {
            $name = check_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $name_error = "Only letters and white space allowed";
            }
        }
       if (empty($_POST["email"])) {
           $email_error = "Email Required";
       } else {
           $email = check_input($_POST["email"]);
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
       }
        
        if(empty($_POST["phone"])) {
            $phone_error = "Phone Number Requried";
        } else {
            $phone = check_input($_POST["phone"]);
            if(strlen($phone)<11||strlen($phone)>11||!preg_match("/^[0-9]{11}$/", $phone))
            {
                $phone_error="Invalid Number";       
            }
        }
         
        if (empty($_POST["deliveryno"])) {
            $deliveryno= "";
        } else {
            $deliveryno = check_input($_POST["deliveryno"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$deliveryno)) {
      $delivery_error = "Invalid URL";
    }
        }
    
    
    
        # gender
    if (empty($_POST["gender"])) {
    $gender_error = "Gender Required";
  } else {
    $gender = check_input($_POST["gender"]);
  }
        # agree
      if (empty($_POST["agree"])) {
    $agree_error = "Must click on checkbox ";
  } else {
    $agree = check_input($_POST["agree"]);
  }
      
} #main
    
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
 ?>

    <h1>
        <p style="color:blue;">DELIVERYMAN</p>
    </h1>
    <p><span class="error">* Required Field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <fieldset>
            <legend>Create Acount: :</legend>
            <lable>Deliveryman Name : </lable>
            <input type="text" name="name">
            <span class="error">* <?php echo $name_error;?> </span>
            <br><br>

            <lable>E-mail of deliveryman : </lable>
            <input type="text" name="email">
            <span class="error">* <?php echo $email_error;?></span>
            <br><br>

            <lable> Deliveryman Phone:</lable>
            <input type="text" name="phone">
            <span class="error">* <?php echo $phone_error;?></span>
            <br><br>

            <label>Delivery NO : </label>
            <input type="text" name="deliveryno">
            <span class="error"><?php echo $delivery_error;?></span>
            <br><br>



            <label>Gender : </label>
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="other">Other
            <span class="error">* <?php echo $gender_error;?></span>
            <br><br>

            <label>Agree To Terms Of Conditions : </label>
            <input type="checkbox" name="agree">
            <span class="error">* <?php echo $agree_error;?></span>
            <br><br>

            <input type="submit" name="submit" value="Submit">

        </fieldset>

    </form>

    <?php
    if (isset($_POST["submit"])) {
        echo "<h1>Your Input : </h2>";
        echo "Name : ". $name . "<br>";
        echo "E-mail : ". $email . "<br>";
        echo "Phone : ". $phone . "<br>";
        echo "Delivery No : ". $deliveryno . "<br>";
        
        echo "Gender : ". $gender . "<br>";
        echo "Agree To Terms Of Conditions :  : ". $agree . "<br>";
    }
    
    
    ?>


</body>

</html>
