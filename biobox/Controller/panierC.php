<?php

include '../config.php';

class panierC
{

    public function listePanier()
    {
        $sql = "SELECT * FROM panier ORDER BY nom_article ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletePanier($id)
    {
        $sql = "DELETE FROM panier WHERE id_panier = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addPanier($panier){
        $db = config::getConnexion();
        try{
            $query = $db->prepare('INSERT INTO panier (id_panier,nom_article,quantite)
            VALUES (:id_panier,:nom_article,:quantite)');
            $query->execute([
                'id_panier' => $panier->getid_panier(),
                'nom_article' => $panier->getnom_article(),
                'quantite' => $panier->getquantite()
               
            ]);			
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }			
    }
    function update_panier($panier,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE panier SET 
                
                nom_article = :nom_article,
                    quantite = :quantite

                WHERE id_panier =:id_panier '
            );
            $query->execute([
                'id_panier' => $id,
                'nom_article' => $panier->getnom_article(),
                'quantite' => $panier->getquantite()
            ]);
            echo $query->rowCount() . " records UPdate_panierD successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showPanier($id)
    {
        $sql = "SELECT * from panier where id_panier = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $panier = $query->fetch();
            return $panier;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
