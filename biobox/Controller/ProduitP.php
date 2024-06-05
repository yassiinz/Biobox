<?php

include_once '../config.php';

class ProduitP
{

    public function listProduit()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listProduitsale()
    {
        $sql = "SELECT * FROM produit WHERE type='sale'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listProduitb()
    {
        $sql = "SELECT * FROM produit WHERE type='boisson'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listProduits()
    {
        $sql = "SELECT * FROM produit WHERE type='sucre'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteprod($id)
    {
        $sql = "DELETE FROM produit WHERE id_produit = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addprod($produit){
        $db = config::getConnexion();
        try{
            $query = $db->prepare('INSERT INTO produit 
            VALUES (:id_produit ,:nom_produit, :desc_produit, :prix_produit  )');
            $query->execute([
                'id_produit' => $produit->getid(),
                'nom_produit' => $produit->getnom_produit(),
                'desc_produit' => $produit->getdescription_prod(),
                'prix_produit' => $produit->getprix_produit()
        
               
            ]);			
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }			
    }
    function update($produit, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                
                    nom_produit = :nom_produit, 
                    desc_produit = :desc_produit, 
                    prix_produit = :prix_produit
                   

                WHERE id_produit =:id_produit '
            );
            $query->execute([
                'id_produit' => $produit->getid(),
                'nom_produit' => $produit->getnom_produit(),
                'desc_produit' => $produit->getdescription_prod(),
                'prix_produit' => $produit->getprix_produit()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showproduit($id)
    {
        $sql = "SELECT * from produit where id_produit = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}