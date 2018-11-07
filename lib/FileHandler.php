<?php

/**
 *File Handler Class
 */
class FileHandler
{
	
	/**
	 *Upload file
	 *
	 *@param HTTP Request, String
	 *@return HTTP Response
	 */
	public static function uploadFile(array $file, $location){
		$_SESSION['file'] = [];
		//Define root path
		define ('SITE_ROOT', realpath(dirname(__DIR__)));

		//Set location
		$target_dir = $location;

		//Set filename for validation
		$target_file = $target_dir . basename($_FILES["file"]["name"]);

		//Initialize upload status
		$uploadOk = 1;

		//Set file extension
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		var_dump($imageFileType);

		//Set file name for database
		$file_name = date('his').".".$imageFileType;

		//set file path to be uploaded
		$file_path = SITE_ROOT."/".$target_dir.$file_name;


		// Check if image file is a actual image or fake image
		if(isset($_FILES)) {
			$check = getimagesize($_FILES["file"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$_SESSION['file'][] = "File is not an image.";
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$_SESSION['file'][] = "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["file"]["size"] > 500000) {
			$_SESSION['file'][] =  "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$_SESSION['file'][] = 'Invalid image format, only JPG, JPEG, PNG & GIF files are allowed.';
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			header("Location: ".$_SERVER['HTTP_REFERER']."");	

			// if everything is ok, try to upload file
		} else {

			//Unset errors validation passed
			unset($_SESSION['file']);

			if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {

				//return file path to be stored in database
				return $location.$file_name;

			}
		}
	}
}
