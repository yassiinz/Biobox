<?php
class Reclamation
{
    private ?int $idReclamation = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $Reclamation = null;


    public function __construct($id = null, $n, $e,$r)
    {
        $this->idReclamation = $id;
        $this->nom = $n;
        $this->email = $e;
        $this->Reclamation = $r;
        
    }

    /**
     * Get the value of idcomment
     */
    public function getidRecalamtion()
    {
        return $this->idReclamation;
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
    public function getReclamation()
    {
        return $this->Reclamation;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setReclamation($Reclamation)
    {
        $this->Reclamation = $Reclamation;

        return $this;
    }

}
