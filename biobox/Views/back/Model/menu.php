<?php
class menu{
    private  $id_menu = null;
    private ?string $nom_menu = null;
    private ?string $prix = null;
    private $produit=null;
    

    public function __construct($id_menu , $nom_menu, $prix, $produit)
    {
        $this->id_menu = $id_menu;
        $this->nom_menu = $nom_menu;
        $this->prix = $prix;
        $this->produit = $produit;

    }

    /**
     * Get the value of id_menu
     */
    public function getid_menu()
    {
        return $this->id_menu;
    }
    public function getproduit()
    {
        return $this->produit;
    }

    /**
     * Get the value of nom_menu
     */
    public function getnom_menu()
    {
        return $this->nom_menu;
    }

    /**
     * Set the value of nom_menu
     *
     * @return  self
     */
    public function setnom_menu($nom_menu)
    {
        $this->nom_menu = $nom_menu;

        return $this;
    }

    

    /**
     * Get the value of prix$prix
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix$prix
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

  
}
?>