<?php
ob_start();
$id = $_GET['id'];
require_once "../classes/crud_produit.php";
$crud = new CRUD_Produit();
$res = $crud->find($id);
$prod = $res[0];
?>

<div class="col">
    <div class="card">
        <img src="<?= $prod['image'] ?>" class="img-fluid" alt="la photo du produit">
        <div class="card-body">
            <h1 class="card-title"><?= $prod['libelle'] ?></h1>
            <p class="card-text"><?= $prod['description'] ?>
                <hr>
                Prix : <?= $prod['prix'] ?> dt<br>
                Quantité en stock : <?= $prod['qte'] ?><br>Article <?php echo $prod['promo'] ? "en promo" : "pas en promo" ?>
            </p>

        </div>
    </div>
</div>
<?php
$contenu = ob_get_clean();
$titre = "Details produit";
include "layout.php";
?>