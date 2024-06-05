<?php
class Comment
{
    private ?int $idComment = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $Comment = null;


    public function __construct($id = null, $n, $e,$c)
    {
        $this->idComment = $id;
        $this->nom = $n;
        $this->email = $e;
        $this->Comment = $c;
        
    }

    /**
     * Get the value of idcomment
     */
    public function getidComment()
    {
        return $this->idComment;
    }

    /**
     * Get the value of nom
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($Comment)
    {
        $this->Comment = $Comment;

        return $this;
    }

}
