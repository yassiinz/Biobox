// function passValidation(){
//     var a,b,c,d,f,s;
//     f=document.getElementById("firstName").value;
//     l=document.getElementById("lastName").value;
//     e=document.getElementById("email").value; 
//     p=document.getElementById("password").value;
//     c=document.getElementById("confirmPassword").value;
//     s=document.getElementById("ch").value;
    
//     if (f =="" || l ==""|| e ==""|| p =="") {alert("Please fill in the form");}
//     else {alert("Account successfully created");}
    
//     }
    var myf =document.getElementById("myf");
            
    myf.addEventListener("keyup", function(e) { 
    e.preventDefault();
    var error1,error4;
    var correct1,correct2;
    
    var firstName=document.getElementById("firstName");
    var mdp=document.getElementById("password");
    var cmdp=document.getElementById("confirmPassword");
    
    
    if (firstName.value.length<3 && mdp.value.length>=4){
        if (firstName.value.length!=0){
        error1="The First Name should contain 3+ characters";
    
        document.getElementById("error1").innerHTML=error1;
        document.getElementById("error4").innerHTML="<p style='color:yellow'> Correct </p>";
       
        }
        else { document.getElementById("error1").innerHTML="";}
    document.getElementById("error4").innerHTML="<p style='color:yellow'> Correct </p>";
    e.preventDefault();
        return false;
    }




    

    else if (firstName.value.length>=3  &&  mdp.value.length<4){
        if (mdp.value.length!=0){ 
            document.getElementById("error4").innerHTML="<p style='color:red'> Weak </p>";
            document.getElementById("error1").innerHTML="<p style='color:green'> Correct </p>";
        }  
       else { document.getElementById("error4").innerHTML=""; 
       document.getElementById("error1").innerHTML="<p style='color:yellow'> Correct </p>";}
        
    
    document.getElementById("error1").innerHTML="<p style='color:yellow'> Correct </p>";
    e.preventDefault();
    return false ;
    }







    else if (firstName.value.length<3 && mdp.value.length<4){
        error1="The First Name should contain 3+ characters";
   

       if(firstName.value.length!=0 && mdp.value.length!=0){
       
        document.getElementById("error1").innerHTML=error1;
        document.getElementById("error4").innerHTML="<p style='color:red'> Weak</p>";}
    
        else if (mdp.value.length!=0 && firstName.value.length==0) { document.getElementById("error1").innerHTML="";
        document.getElementById("error4").innerHTML="<p style='color:red'> Weak</p>";}
    
    else if (mdp.value.length==0 && firstName.value.length!=0){document.getElementById("error1").innerHTML=error1;
    document.getElementById("error4").innerHTML="";}
    
    else {document.getElementById("error1").innerHTML="";
          document.getElementById("error4").innerHTML="";}
        
       
        e.preventDefault();
    
            return false;
    }




    else {
    document.getElementById("error1").innerHTML="<p style='color:green'> Correct </p>";
    document.getElementById("error2").innerHTML="<p style='color:green'> Correct </p>";
    return true;
    }
     });
    
        /*function control(){
        let myError=document.getElementById("error");
        if (document.getElementById("prenom").length<4){
            myError.innerHTML="Le nom doit compter au minimum 3 caractères."
            myError.style.color='red';  
     
        }
    }*/
    
// function verifsignup(){
//     var username = document.forms["signup"]["username"].value;
//     var email = document.forms["signup"]["email"].value;
//     var password = document.forms["signup"]["password"].value;
//     var passwordc = document.forms["signup"]["passwordc"].value;
//     var erroru = 1;
//     var errorp = 1;
//     var errore = 1;
//     var errorpc = 1;
//     var letters = /[A-Za-z]/;
//     var emailletters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//     var errorusername = document.getElementById('errorusername');
//     var errorpassword = document.getElementById('errorpassword');
//     var erroremail = document.getElementById('erroremail');
//     var errorpasswordc = document.getElementById('errorpasswordc');


//     if(username==""){
//         errorusername.innerHTML = "Please type a Username";
//         erroru = 1;
//     }else if (!(username.match(letters))) {
//         errorusername.innerHTML = "Please Type a valid username!";
//         erroru = 1;
//     }else{
//         errorusername.innerHTML = "";
//         erroru = 0;
//     }

//     if(email==""){
//         erroremail.innerHTML = "Please type an Email";
//         errore = 1;
//     }else if(!(email.match(emailletters)&& !(email==""))){
//         erroremail.innerHTML = "Please type a valid Email";
//         errore = 1;
//     }
//     else{
//         erroremail.innerHTML = "";
//         errore = 0;
//     }



//     if(password==""){
//         errorpassword.innerHTML = "Please type a Password";
//         errorp = 1;
//     }else if (!(password.match(/[0-9]/g) &&
//     password.match(/[A-Z]/g) &&
//     password.match(/[a-z]/g) &&
//     password.length >= 8)) {
//         errorp = 1;
//         errorpassword.innerHTML = "The password must contain at least 8 characters, including at least: One uppercase letter, One lowercase letter and a number.";

//     }else{
//         errorpassword.innerHTML = "";
//         errorp = 0;
//     }


//     if(passwordc==""){
//         errorpasswordc.innerHTML = "Please type a Password";
//         errorpc = 1;
//     }else if (!(passwordc==password)){
//         errorpasswordc.innerHTML = "Password doesn't match";
//         errorpc = 1;
//     }else{
//         errorpasswordc.innerHTML = "";
//         errorpc = 0;
//     }

//     if(erroru == 1 || errorp == 1 || errorpc == 1 || errore == 1 ){
//         return 1;
//     }else{
//         return 0;
//     }

// }

// function validateForm(e) {
//     if(verifsignup()==1)
//     {
//         e.preventDefault();
//     }
// }




// let myform = document.getElementById('myform');

// myform.addEventListener('submit', function(e){
// let first = document.getElementById('firstName');
// if(first.value.trim()=""){
//     let myerror1 = document.getElementById('error1');
//     myerror1.innerHTML = "first name is required";
//     myerror1.style.color = 'red';
//     e.preventDefault();
// }
// });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
