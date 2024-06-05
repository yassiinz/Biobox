<?php
	class commande
    
    {
        private $id_commande=null;
        private $nom=null;
		private $totale=null;
		private $adresse=null;
		private $date_commande=null;
		private $liste=null;
		
       


		function __construct($nom,$totale,$adresse,$date_commande,$liste){
			$this->nom=$nom;
			$this->totale=$totale;
			$this->adresse=$adresse;
			$this->date_commande=$date_commande;
			$this->liste=$liste;
			
           


		}function getid_commande(){
			return $this->id_commande;
		}
		
		function getnom(){
			return $this->nom;
		}
		function gettotale(){
			return $this->totale;
		}
		
		function getadresse(){
			return $this->adresse;
		}
		
		function getdate_commande(){
			return $this->date_commande;
		}
		function getliste(){
			return $this->liste;
		}
		
        
        
        
        
        function setnom(string $nom){
			$this->nom=$nom;
		}
        function settotale(string $totale){
			$this->totale=$totale;
		}
        function setadresse(string $adresse){
			$this->adresse=$adresse;
		}
		
		function setdate_commande(string $date_commande){
			$this->date_commande=$date_commande;
		}
		function setdliste(string $liste){
			$this->liste=$liste;
		}
		
		
	}


?>
