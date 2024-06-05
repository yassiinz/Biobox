<?php

include_once '../config.php';

class restoC
{

    public function listeresto()
    {
        $sql = "SELECT * FROM resto";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteresto($id)
    {
        $sql = "DELETE FROM resto WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addresto($resto){
        $db = config::getConnexion();
        try{
            $query = $db->prepare('INSERT INTO resto (nameresto, adresseresto, email, num, image,id_cat)
            VALUES (:nameresto, :adresseresto, :email , :num,:image,:id_cat)');
            $query->execute([
                'nameresto' => $resto->getnameresto(),
                'adresseresto' => $resto->getadresse(),
                'email' => $resto->getemail(),
                'num' => $resto->getnum(),
                'image' =>$resto->getImage(),
                'id_cat' => $resto->getIdcat(),
               
               
            ]);			
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }			
    }
    function updateresto($resto, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE resto SET 
                nameresto = :nameresto, 
                adresseresto = :adresseresto, 
                email = :email, 
                num = :num,
                image=:image,
                id_cat =:id_cat
                WHERE id =:id '
            );
            
            $query->execute([
                'nameresto' => $resto->getnameresto(),
                'adresseresto' => $resto->getadresse(),
                'email' => $resto->getemail(),
                'num' => $resto->getnum(),
                'image' => $resto->getImage(),
                'id_cat' => $resto->getIdcat(),
                'id' => $id,
               
            ]);
         
            echo $query->rowCount() . " records UPDATED successfully <br>";
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showresto($id)
    {
        $sql = "SELECT * from resto where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $resto = $query->fetch();
            return $resto;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getRestoByIdcat($id_cat) {

        $sql = "SELECT * from resto where id_cat = $id_cat";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $resto = $query->fetchAll();
            return $resto;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
