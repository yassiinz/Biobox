<?php
	class produit
    
    {
        private $id_produit=null;
        private $nom_produit=null;
		private $desc_produit=null;
		private $prix_produit=null;

		
       


		function __construct($id_produit,$nom_produit,$desc_produit,$prix_produit){
			$this->id_produit=$id_produit;
			$this->nom_produit=$nom_produit;
			$this->desc_produit=$desc_produit;
			$this->prix_produit=$prix_produit;
			
			
           


		}function getid(){
			return $this->id_produit;
		}
		
		function getnom_produit(){
			return $this->nom_produit;
		}
		function getdescription_prod(){
			return $this->desc_produit;
		}
		
		function getprix_produit(){
			return $this->prix_produit;
		}
		
		
        
        
        
        
        
		
		
	}


?>
