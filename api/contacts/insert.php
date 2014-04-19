<?php
include_once "config.php";
$connect =  mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(mysqli_connect_error())
{
	echo "Failed to connect to MySQL". mysqli_connect_error();exit();
}
$method = (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) ? $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'] : $_SERVER['REQUEST_METHOD'];
$id=$_GET['id'];
if($method == 'DELETE') {
	$query = "DELETE FROM contacts WHERE id=".$id;
	$insert_result = mysqli_query($connect,$query);
	echo $insert_result;
} else if($method == 'PUT') {
	$data = json_decode($_POST['model']);
	if($data) {
		$name = $data->name;
		$address = $data->address;
		$tel = $data->tel;
		$email = $data->email;
		$type = $data->type;
		if($id)
			$query = "UPDATE contacts SET name='$name', address='$address', tel='$tel', email='$email', type='$type' WHERE id = '$id'";
		else
			$query = "INSERT INTO contacts(name,address,tel,email,type) VALUES ('$name','$address','$tel','$email','$type')";
		$insert_result = mysqli_query($connect,$query);
		echo $insert_result;
	} else {
		echo "error";
	}
} else {
	echo "error";
}