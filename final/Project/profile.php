<?php include('navi.php');?>

<?php

session_start(); //start the session


if(empty($_SESSION['user'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Login Your User Account '); 
            </script>";
        echo"<script>
                window.location = 'login.php';
            </script>";
		}
?>


<html>

<head>
    <title>Coustomer Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            width: 50;

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

    <style>
        #flip,
        #flip1 {

            width: 200px;
            padding: 5px;
            text-align: center;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
            /*            margin-left: auto;*/
            margin-right: auto;
            border-radius: 20px;

        }

        #panel,
        #panel1 {

            padding: 20px;
            display: none;

        }

    </style>



    <script>
        $(document).ready(function() {
            $("#flip1").click(function() {
                $("#panel1").slideToggle(3000);
            });
        });

    </script>

    <link rel="stylesheet" type="text/css" href="/final/project/css/style_profile_C.css">
</head>

<body style="background-color: #1c2833;">

    <h2 align="center" class="glow">User Profile</h2><br>
    <hr>


    <center>
        <div style="float:right" class="box">
            <img style="float:center" src="/final/Project/photosFile/<?php echo $_SESSION['image']; ?>">

            <label>Name : <?php echo $_SESSION['name']?> </label><br><br>
            <label>User Name : <?php echo  $_SESSION['user'] ?> </label><br><br>
            <label>Email : <?php echo $_SESSION['email'] ?> </label><br><br>

        </div>
    </center>


    <h2>Your Panding Orders</h2>
    <div>
        <table id="tb2" class="center">
            <tr>
                <td>Order Id</td>
                <td>Order Name</td>
                <td>Total Price</td>
                <td>Oparetions</td>
            </tr>


            <?php
    
            $aa = "pending";
            $bb = $_SESSION['sl'];
    
            $con = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($con, "onlinefoodshop");
            
        $query = "SELECT * FROM foodorder WHERE status='$aa' AND customerid = '$bb' ";
        $data = mysqli_query($con, $query);
        $total = mysqli_num_rows($data);
        
        if($total != 0){
            
            while($result = mysqli_fetch_assoc($data)){
                
                echo "<tr>
            <td>".$result['orderid']."</td>
            <td>".$result['ordername']."</td>
            <td>".$result['totalprice']."</td>


            
            <td><a href='/final/project/model/confirmOrder.php? osl=$result[orderid]' onclick='return checkDelete()'><i class='fas fa-check'></i></a></td>
            
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

        <br><br><br><br><br>

        <div id="flip1" style="color:black;">Your Order History</div>
        <div id="panel1">
            <table id="tb2" class="center">
                <tr>
                    <td>Order Id</td>
                    <td>Order Name</td>
                    <td>Total Price</td>
                    <td>Date</td>
                </tr>


                <?php
    
            $aa = "pending";
            $cc = "done";
            $bb = $_SESSION['sl'];
    
            $con = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($con, "onlinefoodshop");
            
        $query = "SELECT * FROM foodorder WHERE status='$cc' AND customerid = '$bb' ";
        $data = mysqli_query($con, $query);
        $total = mysqli_num_rows($data);
        
        if($total != 0){
            
            while($result = mysqli_fetch_assoc($data)){
                
                echo "<tr>
            <td>".$result['orderid']."</td>
            <td>".$result['ordername']."</td>
            <td>".$result['totalprice']."</td>
            <td>".$result['date']."</td>
            
            </tr>";
                
            }
            
        }else{
            echo"<script>
                alert('No Record Found'); 
            </script>";
        }
            
            mysqli_close($con);
            
        ?>


            </table>

        </div>

        <br><br><br><br><br><br><br><br>

        <script>
            function checkDelete() {

                return confirm('Press Ok If You Receive Your Food..');

            }

        </script>


    </div>




</body>

</html>



<?php #include('foot.php');?>
