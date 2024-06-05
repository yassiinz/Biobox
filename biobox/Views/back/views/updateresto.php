
<?php
include '../model/resto.php';
    include '../controller/restoC.php';
    include "../controller/CategorieC.php";

    $r = new CategorieC();
    $tab = $r->listeCategorie();

    $error = "";

    // create course
    $resto = null;
    
    // create an instance of the controller
    $restoC = new restoC();
    $id=$_POST["id"];
    if (
        isset($_POST["nameresto"]) &&
		isset($_POST["adresse"]) &&	
        isset($_POST["email"]) &&
		isset($_POST["num"]) && isset($_POST["num"]) && isset($_FILES["image"]["name"])
        
        
    ) {
        if ( !empty($_POST["id"]) &&
        !empty($_POST["nameresto"]) &&
		 !empty($_POST["adresse"]) &&
            !empty($_POST["email"]) && 
	     !empty($_FILES["image"]["name"]) &&
        !empty($_POST["num"]) &&
         !empty($_POST["id_cat"]) 
            
           
        ) {
            $targetDir = "../images/";
		$fileName = basename($_FILES["image"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg');

		if (in_array($fileType, $allowTypes)) {

			if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {


            $resto = new resto(
               $_POST['nameresto'],
				 $_POST['adresse'],
                $_POST['email'], 
				$_POST['num'],
                $fileName,
                $_POST['id_cat']
               
               
            );
            
            
       $restoC->updateresto($resto, $_POST["id"]);
       header('Location:listeresto.php');
    } else {
        $error = "Sorry, there was an error uploading your file.";
    }
} else {
    $error = "Sorry, only JPG, JPEG, PNG files are allowed to upload.";
}
} else
$error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>restaurant list</title>
    <script src="../js/jquery-3.2.1.min.js" ></script>
    <script src="../js/ctr_saisie.js"></script>
</head>

<body>
    <button><a href="listeresto.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $resto = $restoC->showresto($_POST['id']);

    ?>

        <form id="resto-form" action="" method="POST" enctype="multipart/form-data">
            <table border="1" align="center">
                
            <tr>
                    <td>
                        <label for="nameresto">restaurant name:
                        </label>
                    </td>
                    <td><input type="text" name="nameresto" id="nameresto" value="<?php echo $resto['nameresto']; ?>" >
                    <h5 id="nameresto-error" style="color: red;display: none;">
                    </h5>
                </td>
                </tr>
            
            <tr>
                    <td>
                        <label for="adresse">adresse:
                        </label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" value="<?php echo $resto['adresseresto']; ?>" >
                    <h5 id="adresse-error" style="color: red;display: none;">
                    </h5>
                </td>
                </tr>
				
                <tr>
                    <td>
                        <label for="email">Email:
                        </label>
                    </td>
                    <td><input type="email" name="email" id="email" value="<?php echo $resto['email']; ?>">
                    <h5 id="email-error" style="color: red;display: none;">
                    </h5>
                </td>
                </tr>
            
                <tr>
                    <td>
                        <label for="num"> number:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="num" id="num" value="<?php echo $resto['num']; ?>">
                        <h5 id="num-error" style="color: red;display: none;">
                    </h5>
                    </td>
                </tr>  
                <tr>
								<td>
									<label for="image">Image:
									</label>
								</td>
								<td><input type="file" name="image" id="image">
                                <h5 id="image-error" style="color: red;display: none;">
                                </h5>
                            
                            </td>
								<td> <img src="<?php echo "images/".$resto['image']; ?>" alt="category image" width="300" height="300">

								
							</tr>
                <tr>
                <td>
                        <label for="id_cat"> category:
                        </label>
                    </td>
                <td>
                    
                     
                        <select name="id_cat" id="id_cat">
                        <?php
                        foreach ($tab as $categorie) {
                            if($categorie['id']==$resto['id_cat']) 
                            {
                            ?>
                            <option value=<?php echo $categorie['id']; ?> selected> <?= $categorie['nom'];?> </option>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <option value=<?php echo $categorie['id']; ?>> <?= $categorie['nom'];?> </option>

                    

                    
                        <?php }} ?>
                        </select>
                        
                    </td>
                            </tr>
                <tr>
                   
                    <td>
                        <input type="submit" value="Send"> 
                        <input type="hidden" value=<?PHP echo $id; ?> name="id">
                    </td>
                    <td>
                        <input type="reset" value="Reset" >
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>