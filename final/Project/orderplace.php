<!--orderplace.php-->

<?php

session_start();
 if($_SESSION['user']){
     
     $name = $_GET['product_name'];
        $amount = $_GET['product_amount'];
        $image = $_GET['product_Image'];
        $price = $_GET['product_price'];
        
    
        $a=array($name,$amount,$image,$price);
        
        
        array_push($_SESSION['order_array'], $a);
     
        echo"<script>
                window.location = 'order.php';
            </script>";
        
 }else{
    echo"<script>
                alert('Please Login Your User Account First!! For Order Food'); 
            </script>";
        echo"<script>
                window.location = 'login.php';
            </script>";
 }
        

?>