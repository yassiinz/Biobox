<?php
	class Categorie
    
    {
        private $id=null;
		private $nom=null; 
		private $image=null;


		function __construct($id,$nom,$image){
			$this->id=$id;
			$this->nom=$nom;
			$this->image=$image;


		}
		
		function getId(){
			return $this->id;
		}
		
		function getNom(){
			return $this->nom;
		}   
		function getImage() {
			return $this->image;
		}  
        function setImage($image) {
			$this->image=$image;
		}
        
        function setNom(string $nom){
			$this->nom=$nom;
		} 

	}
?>
