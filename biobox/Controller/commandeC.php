<?php

include '../config.php';

class commandeC
{

    public function listeCommande()
    {
        $sql = "SELECT * FROM commande ORDER BY date_commande ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function mycommands($mail)
    {
        $sql="SELECT * FROM commande WHERE nom LIKE '%$mail%'";
        $db = config::getConnexion();
        
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE id_commande = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addcommande($commande){
        $db = config::getConnexion();
        try{
            $query = $db->prepare('INSERT INTO commande (nom,totale,adresse,date_commande,liste)
            VALUES (:nom, :totale, :adresse, :date_commande, :liste)');
            $query->execute([
                'nom' => $commande->getnom(),
                'totale' => $commande->gettotale(),
                'adresse' => $commande->getadresse(),
                'date_commande' => $commande->getdate_commande(),
                'liste' => $commande->getliste()
               
            ]);			
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }			
    }
    function update_commande($commande,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                
                    nom = :nom, 
                    totale = :totale, 
                    adresse = :adresse, 
                    date_commande = :date_commande,
                    liste = :liste

                WHERE id_commande =:id_commande '
            );
            $query->execute([
                'id_commande' =>$id,
                'nom' => $commande->getnom(),
                'totale' => $commande->gettotale(),
                'adresse' => $commande->getadresse(),
                'date_commande' => $commande->getdate_commande(),
                'liste' => $commande->getliste()
            ]);
            echo $query->rowCount() . " records UPdate_commandeD successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showcommande($id)
    {
        $sql = "SELECT * from commande where id_commande = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function recherche($key)
    {
        $sql = "SELECT * FROM commande WHERE nom LIKE '%$key%' ";
        $db = config::getConnexion() ;
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}