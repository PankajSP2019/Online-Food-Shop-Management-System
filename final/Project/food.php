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
    
    $item_error =  $order_error = $ordernumber_error = $review_error = $agree_error = "";
    
    $item =  $order = $ordernumber = $review = $agree ="";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["item"])) {
            $name_error = "Name Requried";
        } else {
            $item = check_input($_POST["item"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $name_error = "Only letters and white space allowed";
            }
        }
    
        if(empty($_POST["order"])) {
            $phone_error = "phone number Requried";
        } else {
            $order = check_input($_POST["order"]);
            if(strlen($phone)<11||strlen($phone)>11||!preg_match("/^[0-9]{11}$/", $phone))
            {
                $phone_error="Invalid Number";       
            }
        }
         
        if (empty($_POST["order number"])) {
            $ordernumber = "";
        } else {
            $ordernumber = check_input($_POST["order number"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $website_error = "Invalid URL";
    }
        }
    
    # review
    if (empty($_POST["review"])) {
    $review = "";
  } else {
    $review = check_input($_POST["review"]);
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

    <h1>food</h1>
    <p><span class="error">* Required Field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <lable>item of food : </lable>
        <input type="text" name="item">
        <span class="error">* <?php echo $item_error;?> </span>
        <br><br>

        <lable>order of food : </lable>
        <input type="text" name="order">
        <span class="error">* <?php echo $order_error;?></span>
        <br><br>

        <label>order number : </label>
        <input type="text" name="order number">
        <span class="error"><?php echo $ordernumber_error;?></span>
        <br><br>

        <lable>review : </lable>
        <textarea name="review" rows="5" cols="40"></textarea>
        <br><br>

        <label>Agree To Terms Of Conditions : </label>
        <input type="checkbox" name="agree">
        <span class="error">* <?php echo $agree_error;?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">

    </form>

    <?php
    if (isset($_POST["submit"])) {
        echo "<h1>Your Input : </h2>";
        echo "item : ". $item . "<br>";
        echo "order : ". $order . "<br>";
        echo "order number : ". $ordernumber . "<br>";
        echo "review : ". $review . "<br>";
        echo "Agree To Terms Of Conditions :  : ". $agree . "<br>";
    }
    
    
    ?>


</body>

</html>
