<?php
include("../includes/dbh.inc.php");

$input = $_POST['search_input'];

if (empty($input)) {
    $query = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie;";
} else {
    $query = "SELECT plante.*, categorie.nomCateorie FROM plante JOIN categorie ON plante.idCategorie = categorie.idCategorie WHERE plante.nom LIKE '{$input}%';";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the HTML for each result
?>
        <div class="product">
            <div class="title pt-4 pb-1"><?php echo $row['nom']; ?></div>
            <img src="../uploads/<?php echo $row['image']; ?>" alt="images">
            <div class="title pt-4 pb-1"><?php echo $row['nomCateorie']; ?></div>
            <div class="price"><?php echo $row['prix']; ?> $</div>
            <button class="button"><a href="../includes/ajouterAuPanier.inc.php?id=<?php echo $row['idPlante']; ?>">ajouter au panier</a></button>
        </div>
<?php
    }
} else {
    echo "<h6>no data</h6>";
}
?>