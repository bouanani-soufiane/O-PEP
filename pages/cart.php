<?php
require "../includes/dbh.inc.php";
require "./header.php";
session_start();

?>
<!DOCTYPE html>

<style>
    .cart-container {
        max-width: 800px;
        margin: 220px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }

    .item-image {
        flex: 0 0 80px;
        margin-right: 10px;
    }

    .item-image img {
        width: 100%;
        border-radius: 4px;
    }

    .item-details {
        flex: 1;
    }

    .item-title {
        font-size: 1.2em;
        font-weight: bold;
    }

    .item-price {
        color: #ff5722;
        font-size: 1.2em;
    }

    .item-quantity {
        font-size: 1em;
        color: #666;
    }

    .total {
        text-align: right;
        margin-top: 20px;
        font-size: 1.2em;
    }

    .checkout-btn {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1.2em;

    }
</style>




<div class="cart-container">
    <?php
    $idUser = $_SESSION["idUser"] ;
    $sql = "SELECT * from panierplante,panier,plante where panierplante.plante_id = plante.idPlante and panierplante.panier_id = panier.idPanier and panier.idUser =   $idUser ;";
    $request = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_row($request)) {

        ?>
        <div class="cart-item">

            <div class="item-image">
                <img src="../uploads/<?= $row[8] ?>" alt="Product 1">
            </div>
            <div class="item-details">
                <div class="item-title"><?= $row[6] ?></div>
                <div class="item-price">price : <?= $row[7] ?> $</div>
                <div class="item-quantity">quantity : <?= $row[2] ?></div>

            </div>
            <button class="checkout-btn">Proceed to Checkout</button>

        </div>
        <?php
    }
    ?>

    <div class="total">Total: $69.97</div>

    <button class="checkout-btn">Proceed to Checkout</button>
</div>
</body>

</html>