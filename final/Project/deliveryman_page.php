<?php
    
session_start();

if(empty($_SESSION['delivery_email'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Login Into Your Deliveryman Account First'); 
            </script>";
        echo"<script>
                window.location = 'deliveryman_log_reg.php';
            </script>";
		}

?>

<html>
<title>Deliveryman Page</title>

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            color: white;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            border="1";
            border-color: black;
/*            width: 50;*/
            

        }

        /*
        table.center {
            margin-left: auto;
            margin-right: auto;

        }
*/


        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        #tb1:nth-child(odd) {
            background-color: white;
            color: black;
        }

        #tb2:nth-child(odd) {
            background-color: white;
            color: black;
        }

    </style>

    <style>
        .box {


            box-sizing: border-box;
            width: 150px;
            height: 150px;
            border: 2px solid #3498db;
            box-shadow: -3px -3px 7px #ffffff73,
                3px 3px 5px rgba(94, 104, 121, 0.288);
            border-radius: 50%;
            background-color: black;
            margin-top: 50px;
            overflow: hidden;
            transition: all 1s;
        }

        img {

            box-sizing: border-box;
            width: 149px;
            height: 149px;
            border-radius: 50%;
            margin: 0;
            border: 5px solid #0082e6;
            padding: 3px;
            background-color: white;
            transition: all 1s;
        }


        button {

            border: 1px solid #3498db;
            background-color: black;
            color: white;
            height: 30px;
            width: 100px;
            border-radius: 5px;
            margin: 0px;
            transition: all 0.3s;
        }

        button:hover {

            transform: scale(1.1);

        }

        input[type="file"] {
            display: none;
        }

        label {
            box-sizing: border-box;
            font-size: 20px;
            background-color: black;
            color: white;
            border: 1px solid #3498db;
            padding: 2px 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        label:hover {
            background-color: #3498db;
            color: black;
        }

        .box:hover {
            width: 300px;
            height: 300px;
            border-radius: 5px;
        }

        .box:hover img {

            width: 100px;
            height: 100px;
            margin: 20px 31%;

        }

    </style>

    <style>
        .glow {
            font-size: 60px;
            color: linear-gradient(120deg, #2980b9, #8e44ad);
            /*    color: white;*/
            text-align: center;
            /*    background: linear-gradient(120deg, #2980b9, #8e44ad);*/
            animation: glow 1s ease-in-out infinite alternate;
            font-family: cursive;
        }

        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
            }

            to {
                text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
            }
        }

    </style>

</head>

<body style="background-color: #1c2833;">
    <?php include('navi.php');?>
    <h2 align="center" class="glow">DeliveryMan Profile</h2><br>
    <hr>


    <center>
        <div style="float:right" class="box">
            <img style="float:center" src="/final/Project/images/pageImage/food-delivery.png">

            <label>Name : <?php echo $_SESSION['name']?> </label><br><br>
            <label>User Name : <?php echo  $_SESSION['delivery_email'] ?> </label><br><br>
            <label>ID: <?php echo  $_SESSION['delivery_sl'] ?> </label><br><br>
            <button onclick="myFunction()">logout</button>

        </div>
    </center>
    
    <br><br>
        <h2>Your Panding Orders</h2>
    <div>
        <table id="tb2" class="center">
            <tr>
                <td>Order Id</td>
                <td>Order Name</td>
                <td>Total Price</td>
                <td>Customer Phone</td>
                <td>Customer Address</td>
                <td>Date</td>
            </tr>


            <?php
    
            $aa = "pending";
            $bb = $_SESSION['delivery_sl'];
    
            $con = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($con, "onlinefoodshop");
            
        $query = "SELECT * FROM foodorder WHERE status='$aa' AND deliverymanid = '$bb' ";
        $data = mysqli_query($con, $query);
        $total = mysqli_num_rows($data);
        
        if($total != 0){
            
            while($result = mysqli_fetch_assoc($data)){
                
                echo "<tr>
            <td>".$result['orderid']."</td>
            <td>".$result['ordername']."</td>
            <td>".$result['totalprice']."</td>
            <td>".$result['customerphone']."</td>
            <td>".$result['address']."</td>
            <td>".$result['date']."</td>


            
            </tr>";
                
            }
            
        }else{
            echo"<script>
                alert('No Pending Order'); 
            </script>";
        }
            
            mysqli_close($con);
            
        ?>

        </table>
        
        <br><br><br><br><br><br><br>

    <script>
        function myFunction() {
            // when a user login ,if he/she want to logout then a confirmation massage will appera and a alert message will appera

            var r = confirm("Sure About Logout ?\nPress Ok For Yes");
            if (r == true) {
                alert("SuccessFully Logout");
                window.location = "deliveryman_logout.php";
            } else {
                window.location = "deliveryman_page.php";
            }
        }

    </script>

</body>

</html>
