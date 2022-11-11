<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
/*    background: linear-gradient(120deg, #2980b9, #8e44ad);*/
    
}

</style>

</html>

<?php
    class Product{
        public $pid;
        public $name;
        public $amount;
        public $pImage;
        public $price;

        function __construct($pid, $name, $amount, $pImage, $price){
            $this->pid = $pid;
            $this->name = $name;
            $this->amount = $amount;
            $this->pImage = $pImage;
            $this->price = $price;
           

            echo '<fieldset>
                    <center>
                        <table>
                            <tr height="200">
                                <td>
                                    <img src="/final/Project/images/ProductImage/'.$pImage.'" width="220" height="220">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    '.$name.'
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    '.$amount.'
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price : '.$price.' ৳
                                </td>
                            </tr>
                            <tr>
                                <td><center>
                                <form action="" method="POST">
                                
                                    <a href="orderplace.php?product_name='.$name.' &product_amount='.$amount.' &product_Image='.$pImage.' &product_price='.$price.'  "><i class="fas fa-shopping-cart"></i></a> &nbsp                                       
                                       
                                </form>
                                </center></td>
                            </tr>
                        </table>
                    </center>
                </fieldset><br>';
        }
    }
?>
