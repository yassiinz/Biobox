<?php

include_once '../config.php';

class CategorieC
{

    public function listeCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCategorie($id)
    {
        $sql = "DELETE FROM categorie WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addCategorie($categorie){
        $db = config::getConnexion();
        try{
            $query = $db->prepare("INSERT INTO categorie 
            VALUES (:id ,:nom,:image)");
            $query->execute([
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom(),
                'image'=>  $categorie->getImage()             
            ]);			
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }			
    }
    function updateCategorie($categorie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                
                    nom = :nom ,
                    image = :image

                WHERE id =:id'
            );
            $query->execute([
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom(),
                'image' => $categorie->getImage()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showCategorie($id)
    {
        $sql = "SELECT * from categorie where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
