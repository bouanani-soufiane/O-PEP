<?php
include "../includes/dbh.inc.php";


$idPivot = $_GET['id'];
$idPanier = $_GET['idPanier'];
$numCommande = mt_rand(100, 10000);
$sql = "insert into commande (numCommande , idPivotfk) values (?,?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/cart.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "ii", $numCommande, $idPivot);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $sql = 'DELETE FROM panierplante WHERE idPivot =' . $idPivot . ';';



    $sql = 'UPDATE panierplante SET status = 0 WHERE  idPivot  = ? ';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../pages/cart.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $idPivot);
        mysqli_stmt_execute($stmt);
        header("Location: ../pages/cart.php?success=updated");
        exit();
    }



    echo "<script>alert('Commande passée avec succès!');</script>";

    header("Location: ../pages/cart.php?success=commander");
    exit();
}
