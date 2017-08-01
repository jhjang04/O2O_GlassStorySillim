<!DOCTYPE html>
<html>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php

	require_once("image_class.php");
	
	$target_dir = '/var/www/html/data/imgs/';
	$second_mid_dir = '/var/www/html/data/thumb-mid/';
	$second_dir = '/var/www/html/data/thumb/';
	
	// image가 업로드 가능한지를 초기화 1은가능 0은 불가능
	$uploadOk = 1;
	
	$ex = basename($_FILES["fileToUpload"]["name"]);
	
	$hwak = substr($ex, -4);
	
	
	$random = array();
	for($a=0; $a<32; $a++){
		$randnumber = rand(0,35);
		
		if($randnumber < 26){
			$cha = 97 + $randnumber;
			$random[$a] = chr($cha);
		} else {
			$random[$a] = $randnumber - 26;
		}
	}
	
	$random = implode("", $random);
	
	// 파일의 경로와 저장 될 이름
	$target = $target_dir . $random . $hwak;
	
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	// 이미지의 타입을받아옴
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		print_r($_FILES["fileToUpload"]);
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	
	$width = $check[0];
	$height = $check[1];
	
	echo '<br>';
	echo $width;
	echo '<br>';
	echo $height;
	echo '<br>';
	
	// Check if file already exists
	if (file_exists($target)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	$imageFileType = strtolower($imageFileType);
	// Allow certain file formats jpg 와 png 파일만 됨.
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		echo "Sorry, only JPG, JPEG, PNG files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.here? ? ??";
		}
	}
	
	$path_file = '/var/www/html/data/imgs/'.$random.$hwak;

	// 1920으로 resize 해서 mid에
	if($width>2560 || $height>2560){
		$thumb = new Image($path_file);
		if($width>$height){
			$thumb->width(2560);
		} else {
			$thumb->height(2560);
		}
		$thumb->save();
		
		$thumb = new Image($path_file);
		$thumb->dir($second_mid_dir);
		if($width>$height){
			$thumb->width(1080);
		} else {
			$thumb->height(1080);
		}
		$thumb->save();
	}
	
	$path_copyfile = '/var/www/html/data/thumb/'.$random;//확장자 없이 파일이름까지만 사용한다.
	
	
	$extension2 = image_type_to_extension($check[2]);
	
	$jpg = strcmp($extension2,".jpg");
	$jpeg = strcmp($extension2, ".jpeg");
	
	
	
	if($jpg==0 || $jpeg==0)
		$extension3 = ".jpg";
	else
		$extension3 = ".png";
	
	
	$path_copyfile .= $extension3;
	echo '<br>';
	echo $path_copyfile;
	
	switch($check[2]){
		case 2 :  // jpg
		$im = @imagecreatefromjpeg($path_file);
		
		if($im==false){
			die("copy fail1\n");
		}
		
		$result_save = @imagejpeg($im, $path_copyfile);
		break;
		
		case 3: // png
		$im = imagecreatefrompng($path_file);
		if($im==false){
			die("copy fail 2\n");
		}
		
		$result_save = @imagepng($im, $path_copyfile);
		break;
	}
	
	if($result_save==false){
		die("copy fail 3 here\n");
	}
	
	if(is_file($path_copyfile)){ echo "$path_copyfile<br>\n";}
	else { echo "$path_copyfile copy fail 4. <br>\n"; }
	
	
	@imagedestroy($im);
	
	
	if($width>300 || $height>300){
		$thumb = new Image($path_copyfile);
		if($width>$height){
			$thumb->width(300);
		} else {
			$thumb->height(300);
		}
		$thumb->save();
	}

	
	echo "<input width='300px' height='50px' value='{$random}{$hwak}'>";
?>











