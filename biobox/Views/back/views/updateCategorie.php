<?php
include '../model/Categorie.php';
include '../controller/CategorieC.php';

$error = "";

// create course
$categorie = null;

// create an instance of the controller
$categorieC = new CategorieC();
if (
	isset($_POST["id"]) &&
	isset($_POST["nom"]) && isset($_FILES["image"]["name"])

) {
	if (
		!empty($_POST["id"]) &&
		!empty($_POST["nom"]) && !empty($_FILES["image"]["name"])

	) {

		$targetDir = "../images/";
		$fileName = basename($_FILES["image"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg');

		if (in_array($fileType, $allowTypes)) {

			if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {






				$categorie = new Categorie(
					$_POST['id'],
					$_POST['nom'],
					$fileName
				);
				$categorieC->updateCategorie($categorie, $_POST["id"]);
				header('Location:listeCategories.php');
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





				<button><a href="listeCategories.php">Back to list</a></button>
				<hr>

				<div id="error">
					<?php echo $error; ?>
				</div>

				<?php
				if (isset($_POST['id'])) {
					$categorie = $categorieC->showCategorie($_POST['id']);

				?>

					<form id="category-form" action="" method="POST" enctype="multipart/form-data">
						<table border="1" align="center">
							<!-- <tr>
                    <td>
                        <label for="id">id:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $categorie['id']; ?>" ></td>
                </tr>      -->
							<tr>
								<td>
									<label for="nom">Nom:
									</label>
								</td>
								<td><input type="text" name="nom" id="nom" value="<?php echo $categorie['nom']; ?>"><input type="hidden" name="id" id="id" value="<?php echo $categorie['id']; ?>">
								<h5 id="nom-error" style="color: red;display: none;">
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
								<td> <img src="<?php echo "images/".$categorie['image']; ?>" alt="category image" width="300" height="300">

								
							</tr>


							<tr>
								<td></td>
								<td>
									<input type="submit" value="Send">
								</td>
								<td>
									<input type="reset" value="Reset">
								</td>
							</tr>
						</table>
					</form>
				<?php
				}
				?>
			</div>
		</div>
	</div>


