<?php
	class panier
    
    {
        private $id_panier=null;
        private $nom_article=null;
		private $quantite=null;
		
       


		function __construct($nom_article,$quantite){
			
			 $this->nom_article=$nom_article;
			$this->quantite=$quantite;
			
           


		}function getid_panier(){
			return $this->id_panier;
		}
		function getnom_article(){
			return $this->nom_article;
		}
		
		function getquantite(){
			return $this->quantite;
		}
		
        
        
        
        
        function setnom_article(string $nom_article){
			$this->nom_article=$nom_article;
		}
        function setquantite(string $quantite){
			$this->quantite=$quantite;
		}
		
		
	}


?>
