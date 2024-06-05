<?php

require '../config.php';

class ReclamationC
{

    public function listReclamations()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReclamation($ide)
    {
        $sql = "DELETE FROM reclamation WHERE idReclamation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL,:n,:e,:r)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $reclamation->getnom(),
                'e' => $reclamation->getemail(),
                'r' => $reclamation->getReclamation() 
            ]);
            echo "ok";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showReclamation($id)
    {
        $sql = "SELECT * FROM reclamation WHERE idReclamation = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    nom = :nom, 
                    email = :email, 
                    Reclamation = :Reclamation 
                    
                WHERE idReclamation= :idReclamation'
            );
            $query->execute([
                'idReclamation' => $id,
                'nom' => $reclamation->getnom(),
                'email' => $reclamation->getemail(),
                'Reclamation' => $reclamation->getReclamation()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
