<?php

require '../config.php';

class CommentC
{

    public function listComments()
    {
        $sql = "SELECT * FROM comment";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteComment($ide)
    {
        $sql = "DELETE FROM comment WHERE idComment = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addComment($comment)
    {
        $sql = "INSERT INTO comment  
        VALUES (NULL,:n,:e,:c)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $comment->getnom(),
                'e' => $comment->getemail(),
                'c' => $comment->getComment() 
            ]);
            echo "ok";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showComment($id)
    {
        $sql = "SELECT * from comment where idComment = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateComment($comment, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE comment SET 
                    nom = :nom, 
                    email = :email, 
                    Comment = :Comment 
                    
                WHERE idComment= :idComment'
            );
            $query->execute([
                'idComment' => $id,
                'nom' => $comment->getnom(),
                'email' => $comment->getemail(),
                'Comment' => $comment->getComment()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
