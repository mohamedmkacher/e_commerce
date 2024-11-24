    <?php
    ob_start();
    require_once "../classes/CRUD_Produit.php";
    $crud = new CRUD_Produit();
    $LesProduits = $crud->findAll();
    ?>
    <a href="add.php" class="btn btn-dark btn-sm">Ajouter un produit</a>
    <table class="table">
        <tr>
            <th>Identifiant</th>
            <th>Libellé</th>
            <th>Prix (DT)</th>
            <th>Quantité</th>
            <th colspan=3>Action</th>
        </tr>
        <?php
        foreach ($LesProduits as  $Produit) {
        ?>
            <tr>
                <td><?= $Produit[0] ?></td>
                <td><?= $Produit[1] ?></td>
                <td><?= $Produit[2] ?></td>
                <td><?= $Produit[3] ?></td>
                <td><a href="detail.php?id=<?= $Produit[0] ?>" class="btn btn-info btn-sm">Voir détail</a></td>
                <td><a href="delete.php?id=<?= $Produit[0] ?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                <td><a href="update.php?id=<?= $Produit[0] ?>" class="btn btn-dark btn-sm">Editer</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
    <?php
    $contenu = ob_get_clean();
    $titre = "Liste des produits";
    include "layout.php";
    ?>