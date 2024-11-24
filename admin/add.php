<?php
ob_start();
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-control">
    Libellé<input type="text" name="libelle" class="form-control"></br>
    Prix<input type="text" name="prix" class="form-control"></br>
    Quantité en stock<input type="text" class="form-control" name="qte"></br>
    Description<textarea name="desc" class="form-control"></textarea></br>
    Image<input type="text" name="img" class="form-control"></br>
    En Promo<input type="text" class="form-control" name="promo"></br>
    <input type="submit" value="Ajouter" name="ok" class="btn btn-primary btn">
</form>

<?php
if (isset($_POST['ok'])) {
    require_once "../classes/CRUD_produit.php";
    require_once "../classes/produit.php";
    $crud = new CRUD_Produit();
    $produit = new produit(null, $_POST['libelle'], +$_POST['prix'], +$_POST['qte'], $_POST['desc'], $_POST['img'], $_POST['promo']);
    $res = $crud->add($produit);
    if ($res) {
        header("location:all.php");
        exit;
    }
}
$contenu = ob_get_clean();
$titre = "Ajout d'un produit";
include "layout.php";
?>