<?php
include "../includes/dbh.inc.php";
if (isset($_GET['id'])) {
    session_start();
    $id = $_GET['id'];
    $idPanier = $_SESSION["panierId"];

    $sql = "insert into panierplante (plante_id , panier_id, quantite) values (?,?,1)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../pages/index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ii", $id, $idPanier);
        mysqli_stmt_execute($stmt);
        header("Location: ../pages/index.php?success=addedtopanier");
        exit();
    }
};
?>

     <?php
        // session_start();
        // echo $_SESSION["client"] . "<br>";
        // echo $_SESSION["userId"] . "<br>";
        // echo $_SESSION["useremail"] . "<br>";
        // echo $_SESSION["panierId"] . "<br>";
        ?>