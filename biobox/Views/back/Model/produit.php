<?php
class produit
{
    private ?int $id = null;
    private ?string $nom_produit = null;
    private ?string $description_prod = null;
    private ?string $prix_produit = null;
    

    public function __construct($id = null, $n, $d, $p)
    {
        $this->id = $id;
        $this->nom_produit = $n;
        $this->description_prod = $d;
        $this->prix_produit = $p;
    }

    /**
     * Get the value of id
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Get the value of nom_produit
     */
    public function getnom_produit()
    {
        return $this->nom_produit;
    }

    /**
     * Set the value of nom_produit
     *
     * @return  self
     */
    public function setnom_produit($nom_produit)
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    /**
     * Get the value of description_prod
     */
    public function getdescription_prod()
    {
        return $this->description_prod;
    }

    /**
     * Set the value of description_prod
     *
     * @return  self
     */
    public function setdescription_prod($description_prod)
    {
        $this->description_prod = $description_prod;

        return $this;
    }

    /**
     * Get the value of prix_produit
     */
    public function getprix_produit()
    {
        return $this->prix_produit;
    }

    /**
     * Set the value of prix_produit
     *
     * @return  self
     */
    public function setprix_produit($prix_produit)
    {
        $this->prix_produit = $prix_produit;

        return $this;
    }

    
}
