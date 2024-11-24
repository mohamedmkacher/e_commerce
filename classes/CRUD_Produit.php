<?php
require_once "produit.php";
require_once "../connexion.php";
class CRUD_Produit
{
    private $pdo; // objet PDO
    function __construct()
    {
        $connexion = new connexion();
        $this->pdo = $connexion->getConnexion();
    }
    function findAll()
    {
        $sql = "select * from produit";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }
    function find($id)
    {
        $sql = "select * from produit where id=$id";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function delete($id)
    {
        $sql = "delete from produit where id=$id";
        $res = $this->pdo->exec($sql);
        return  $res;
    }
    function add(Produit $produit)
    {
        $lib = $produit->getLibelle();
        $pu = $produit->getPrix();
        $qte = $produit->getQte();
        $des = $produit->getDesc();
        $img = $produit->getImage();
        $pro = $produit->getPromo();
        $sql = "insert into produit values(NULL,'$lib',$pu,$qte,
        '$des','$img',$pro)";
        $res = $this->pdo->exec($sql);
        return $res;
    }
    function edit(Produit $produit, $id)
    {
        $lib = $produit->getLibelle();
        $pu = $produit->getPrix();
        $qte = $produit->getQte();
        $des = $produit->getDesc();
        $img = $produit->getImage();
        $pro = $produit->getPromo();
        $sql = "update produit set libelle='$lib',prix=$pu,qte=$qte,description='$des',image='$img',promo=$pro where id=$id";
        $res = $this->pdo->exec($sql);
        return $res;
    }
}
