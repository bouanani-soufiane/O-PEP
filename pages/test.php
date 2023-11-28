<?php
$userid = 'asdsadasdasd@dijasd.com';
require "../includes/dbh.inc.php";

$sql = "SELECT * FROM utilisateur
        JOIN panier ON utilisateur.idUser = panier.idUser
        WHERE utilisateur.email = ?";

$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $idP = $row['idPanier'];
    echo $idP;
    session_start();

    // echo $_SESSION['username'];
    echo $_SESSION['useremail'];

} 
