<?php include "navi.php"; ?>
<?php include "productTemplate.php"; ?>


<html>
    <title>Online Food Shop</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

</style>

<body>
    <table style="width:100%">
        <tr>
            <td width="16%">
                <?php $product1 = new Product("1", "Burger", "1 piece", "burger.jpg", "150");?>
                <?php $product2 = new Product("2", "Chap", "4 piece", "chap.jpg", "120");?>
                <?php $product3 = new Product("3", "Cold Coffee", "150ml", "coffee.jpg", "150");?>
                <?php $product4 = new Product("4", "Chicken Fry", "6 piece", "fry.jpg", "350");?>
            </td>

            <td width="16%">
                <?php $product1 = new Product("1", "Hot Chocolate Coffee", "250 ml", "hot choclate.jpg", "150");?>
                <?php $product2 = new Product("2", "Nachos", "15-20 piece", "nachos.jpg", "200");?>
                <?php $product3 = new Product("3", "Naga Wings", "10 piece", "naga.jpg", "550");?>
                <?php $product4 = new Product("4", "Pizza", "1 piece", "pizzajpg.jpg", "250");?>
            </td>

            <td width="16%">
                <?php $product1 = new Product("1", "Roll", "4 piece", "roll.jpg", "300");?>
                <?php $product2 = new Product("2", "Shawrma", "1 piece", "shawrma.jpg", "250 ৳");?>
                <?php $product3 = new Product("3", "Chowmin", "For 1 Person", "chowmin.jpg", "300");?>
                <?php $product4 = new Product("4", "Orange Juice", "500 ml", "juice.jpg", "150");?>
            </td>

            <td width="16%">
                <?php $product1 = new Product("1", "Lemon Juice", "500 ml", "lemon.jpg", "150");?>
                <?php $product2 = new Product("2", "Chocolate MilkShake", "500 ml", "milkshake.jpg", "200");?>
                <?php $product3 = new Product("3", "Ramen", "For 1 person", "ramen.jpg", "350");?>
                <?php $product4 = new Product("4", "Tacos", "2 piece", "tacos.jpg", "250");?>
            </td>

            <td width="16%">
                <?php $product1 = new Product("1", "Vanila", "500 ml", "vanila.jpg", "150");?>
                <?php $product2 = new Product("2", "Fried Rice", "For 1 Person", "friedrice.jpg", "250");?>
                <?php $product3 = new Product("3", "Ice-Cream", "250ml", "icecream.jpg", "150");?>
                <?php $product4 = new Product("4", "Kabab", "4 piece", "kebab.jpg", "300");?>
            </td>

        </tr>

    </table>




</body>


</html>

<?php include "foot.php"; ?>
