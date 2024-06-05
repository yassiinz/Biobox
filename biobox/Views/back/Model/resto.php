<?php
	class resto
    
    {
        private $id_resto=null;
		private $nameresto=null;
		private $adresse=null;
		private $email=null;
		private $num=null;
		private $image=null;
		private $id_cat= null;

      


		function __construct($nameresto,$adresse,$email, $num,$image,$id_cat){
			$this->nameresto=$nameresto;
			$this->adresse=$adresse;
			$this->email=$email;
			$this->num=$num;
			$this->image=$image;
			$this->id_cat=$id_cat;
           
           


		}function getid_resto(){
			return $this->id_resto;
		}
		
		function getnameresto(){
			return $this->nameresto;
		}
		
		function getadresse(){
			return $this->adresse;
		}
		
		function getemail(){
			return $this->email;
		}
		function getnum(){
			return $this->num;
		}
		function getIdcat()
		{
			return $this->id_cat;

		}
        
        function getImage()
		{
			return $this->image;
		}
        
    
        function setnameresto(string $nameresto){
			$this->nameresto=$nameresto;
		}
        function setadresse(string $adresse){
			$this->adresse=$adresse;
		}
		
		function setemail(string $email){
			$this->email=$email;
		}
		function setnum($num){
			$this->num=$num;
		}

        function setIdcat($id_cat)
		{
			$this->id_cat=$id_cat;
		}
       
		function setImage($image)
		{
			$this->image=$image;
		}
	}


?>
