
<?php
require_once "../connexion.php";

$connexion = new connexion();
$pdo = $connexion->getConnexion();
$sql = "delete from produit";
$pdo->exec($sql);

$sql = "";
for ($i = 1; $i < 100; $i++) {
    $lib = "Produit n°" . $i;
    $pu = random_int(2, 5000);
    $qte = random_int(1, 1000);
    $des = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat saepe cumque soluta tempora illum veritatis a rem vel 
   illo temporibus adipisci distinctio ut aut, magnam facilis molestias! Vero, aut quae?";
    $img = "https://picsum.photos/images/400/?random=$i";
    $pro = random_int(0, 1);
    $sql .=  "INSERT INTO  produit
     VALUES (NULL, '$lib',$pu,$qte, '$des','$img', $pro);";
}
$pdo->exec($sql);
