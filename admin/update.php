<?php
ob_start();
$id = $_GET['id'];
require_once "../classes/crud_produit.php";
$crud = new CRUD_Produit();
$res = $crud->find($id);
$prod = $res[0];
?>
<form action="<?= $_SERVER['PHP_SELF'] . "?id=$id" ?>" method="post" class="form-control">
    Libellé<input type="text" name="libelle" class="form-control" value="<?= $prod['libelle'] ?>"></br>
    Prix<input type="text" name="prix" class="form-control" value="<?= $prod['prix'] ?>"></br>
    Quantité en stock<input type="text" class="form-control" name="qte" value="<?= $prod['qte'] ?>"></br>
    Description<textarea name="desc" class="form-control"><?= $prod['description'] ?></textarea></br>
    Image<input type="text" name="img" class="form-control" value="<?= $prod['image'] ?>"></br>
    En Promo<input type="text" class="form-control" name="promo" value="<?= $prod['promo'] ?>"></br>
    <input type="submit" value="Metter à jour" name="ok" class="btn btn-primary btn">
</form>

<?php
if (isset($_POST['ok'])) {
    require_once "../classes/CRUD_produit.php";
    require_once "../classes/produit.php";
    $crud = new CRUD_Produit();
    $produit = new produit(null, $_POST['libelle'], +$_POST['prix'], +$_POST['qte'], $_POST['desc'], $_POST['img'], $_POST['promo']);
    $res = $crud->edit($produit, $id);
    if ($res) {
        header("location:all.php");
        exit;
    }
}
$contenu = ob_get_clean();
$titre = "Ajout d'un produit";
include "layout.php";
?>