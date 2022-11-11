<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: darkcyan;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: 1px solid #bbb;
        }

        li a {
            display: inline-block;
            color: black;
            text-align: right;
            padding: 20px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: green;
        }

        .active {
            background-color: #04AA6D;
        }

    </style>
</head>

<body>

    <ul>
        <li><a href="Index.php">Home</a></li>
        <li><a href="admin.php">Admin Panel</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="deliveryman_log_reg.php">DeliveryMan</a></li>
        <li><a href="order.php">Cart</a></li>
<!--        <li><a href="login.php">Login</a></li>-->
        
        <?php
        #logout button
        # when user login ,then the logout button will work
        
        error_reporting(0);
        
       session_start();
	    if(isset($_SESSION['user'])){
			echo '<li style="float:right"><a id="" onclick="myFunction()">Logout</a></li>';
		}else{
            echo '<li style="float:right"><a>Logout</a></li>';
        }

        ?>

        <li style="float:right"><a href="login.php">Login</a></li>
    </ul>
    
    <script>
function myFunction() {
    // when a user login ,if he/she want to logout then a confirmation massage will appera and a alert message will appera
    
  var r = confirm("Sure About Logout ?\nPress Ok For Yes");
  if (r == true) {
      alert("SuccessFully Logout");
      window.location = "logout.php";
  } else {
    window.location = "login.php";
  }
}
</script>

</body>

</html>