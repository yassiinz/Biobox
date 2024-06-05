<?php

include_once '../config.php';

class menuM
{

    public function listmenu()
    {
        $sql = "SELECT * FROM menu";
        $db = config::getConnexion();
        try {
            $listmenu = $db->query($sql);
            return $listmenu;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletemenu($id_menu)
    {
        $sql = "DELETE FROM menu WHERE id_menu = :id_menu";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_menu', $id_menu);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addmenu($menu){
        $db = config::getConnexion();
        try{
            $query = $db->prepare('INSERT INTO menu (id_menu ,nom_menu , prix ,produit)
            VALUES (:id_menu ,:nom_menu, :prix ,:produit )');
            $query->execute([
                'id_menu' => $menu->getid_menu(),
                'nom_menu' => $menu->getnom_menu(),
               
                'prix' => $menu->getprix(),
                'produit' => $menu->getproduit()

        
               
            ]);			
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }			
    }
    function updatemenu($menu, $id_menu)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE menu SET 
                
                    nom_menu = :nom_menu, 
                    prix = :prix,
                    produit = :produit
                   

                WHERE id_menu =:id_menu '
            );
            $query->execute([
                'id_menu' => $menu->getid_menu(),
                'nom_menu' => $menu->getnom_menu(),
            
                'prix' => $menu->getprix(),
                'produit' => $menu->getproduit()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showmenu($id_menu)
    {
        $sql = "SELECT * from menu where id_menu = $id_menu";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}