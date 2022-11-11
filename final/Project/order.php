<?php include('navi.php');?>
<?php
session_start();
if(isset($_SESSION['admin_id'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Admin Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'adminpage.php';
            </script>";
		}

if(isset($_SESSION['delivery_email'])){
			# header("location:profile.php");
        echo"<script>
                alert('Please Logout Your Deliveryman Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'deliveryman_page.php';
            </script>";
		}
?>


<html>
<style>
    body {
        margin: 0;
        padding: 0;
        /*        background: url('/final/Project/images/pageImage/wall.jpg');*/
        font-family: sans-serif;
    }

    table {
        font-size: 14px;
    }

    #lp {
        width: 50px;
    }

    #lp1 {
        text-align: left;
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
    #btn {
        box-sizing: border-box;
        font-size: 20px;
        background-color: black;
        color: white;
        border: 1px solid #3498db;
        padding: 2px 15px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    #btn:hover {
        background-color: #3498db;
        color: black;
    }

</style>

<title>Cart</title>


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    <h2 align="center" class="glow"><i class="fas fa-shopping-cart"></i> Cart</h2><br>

    <form action="order.php" method="post">
        <input type="submit" style="float:right" id="btn" name="empty" value="Empty Cart">
        <br><br>
    </form>

    <table class="table" style="font-size: 17px;">
        <thead class="thead-dark">
            <tr style="background:black; color:white;">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">amount</th>
                <th scope="col">Picture</th>
                <th scope="col">Price</th>
                <!--                quatity code (2)-->
                <th scope="col">Operation</th>
            </tr>
        </thead>


        <?php
error_reporting(0);
        
        

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "onlinefoodshop");
    
    if($_SESSION['user']){
        
        echo "<tbody>";

        for ($row = 0; $row < count($_SESSION['order_array']); $row++){
            
            echo "<tr>";
            echo '<th scope="row">'.$row+1 .'</th>';
//            str_repeat('&nbsp;', 10)
//            echo  "Order list ".$row +1 ."<br>" ;
            
            echo "<td>".$_SESSION['order_array'][$row][0]."</td>";
            
            echo "<td>".$_SESSION['order_array'][$row][1]."</td>";
            
            echo "<td>".'<img src="/final/Project/images/ProductImage/'.$_SESSION['order_array'][$row][2].'" width="" height="70"> '."</td>"; 
            
            echo "<td>".$_SESSION['order_array'][$row][3]."</td>";
            
            
            //quantity code (1)
            

            
            echo"<td id='lp1'><a href='delete_item_order_page.php?arr=$row' onclick='return checkDelete()'><i class='fas fa-times'></i></a></td>";
            
            echo "</tr>";
            
//            $total_price = $total_price + $_SESSION['order_array'][$row][3];
            
        }
        
        
        
        echo "</tbody>";
        
    

    }else{
        echo"<script>
                alert('Please Login Your User Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'login.php';
            </script>";
    }



?>


    </table>

    <hr>



    <?php
    $total_price=0;
    $order_name="";
    
    //if(isset($_POST['st'])){
        for ($row = 0; $row < count($_SESSION['order_array']); $row++){
            
//            $total_price = $total_price + ($_SESSION['order_array'][$row][3]                              $_POST['quantity']);
//            
            $order_name = $order_name ." , ".$_SESSION['order_array'][$row][0];
            
            $total_price = $total_price + $_SESSION['order_array'][$row][3];
        }
        
    //}
    ?>

    <h2 style="float:right">Total : <?php echo $total_price; ?> </h2>
    <br><br><br><br><br><br>

    <form action="order.php" method="post">

        <h3>Delivery Location :
            <input type="text" name="add1" placeholder="# House No, Road No, Area">
        </h3>

        <input type="submit" style="float:right" id="btn" name="st" value="Confirm"><br>
        <br><br><br><br><br><br>

    </form>


    <!--    <h2 >Total : <?php #echo $order_name; ?> </h2>-->

    <script>
        function checkDelete() {

            return confirm('Are You Sure? For Delete This Item ?');

        }

    </script>

    <?php // random deliveryman id genarate
    if(isset($_POST['st'])){
        if(empty($_POST['add1'])){
            
            echo "<script>
            alert('Enter Enter delivery Location');
            </script>";
            
        }
        else if(empty($_SESSION['order_array'])){
            echo "<script>
            alert('Add Food To Card First For place Order');
            </script>";
        }else{
             $a=array();

            $con = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($con, "onlinefoodshop");
            
        $query = "SELECT * FROM deliveryman";
        $data = mysqli_query($con, $query);
        $total = mysqli_num_rows($data);

if($total != 0){
    
    while($result = mysqli_fetch_assoc($data)){
        
        array_push($a,$result['sl']);
        
        
    }
}
shuffle($a);
              
            
$random_deliveryman_id = $a[0];
            //session_start();
 
        }
    }
    ?>

    <?php
            $con1 = mysqli_connect("localhost", "root", "");
            $db1 = mysqli_select_db($con, "onlinefoodshop");
    
               if(isset($_POST['st'])){
                   if(!empty($_POST['add1']) && !empty($_SESSION['order_array'])){
                       
           $b = $_SESSION['sl']; // customer id
           $c = $order_name; //order name
           $d = $total_price; //total price
           $e =  $a[0]; //delivery mamn id
           $f = $_POST['add1'];//address
           $g = $_SESSION['phn'];
           $h = "pending";
            
//           echo "<script> 
//           alert('".$random_deliveryman_id + 10 ."');
//           window.location = 'order.php';
//            </script>";
//               

    $server_name = "localhost";
        $user_name = "root";
        $pass = "";
        $dbname = "OnlineFoodShop";
        
        $con = new mysqli($server_name, $user_name, $pass, $dbname);

if ($con->connect_error) {
    die("Connection failed : ".$con->connect_error);
}

$sql = "INSERT INTO foodorder (customerid, ordername, totalprice, deliverymanid, address, customerphone, status) VALUES ('$b', '$c', '$d', '$e', '$f', '$g', '$h')";

if ($con->query($sql) === TRUE) {
    
    echo '<script>
        alert("Order Confirm");        
    </script>' ;
    
    unset($_SESSION['order_array']);
    $_SESSION['order_array'] = array();
    
    
    echo '<script>
        window.location = "order.php";     
    </script>' ;
}
else {
    echo '<script>
        alert("Failed To order");
        window.location = "order.php";
    </script>';
}

$con->close();
                       
                   }
           
               }
    ?>

    <?php
    if(isset($_POST['empty'])){
        unset($_SESSION['order_array']);
        $_SESSION['order_array'] = array();
        echo"<script>            
                window.location = 'order.php';
            </script>";
        
    }
    ?>


</body>

</html>
