<?php
include_once "api/contacts/config.php";
function getAllContacts() {
	//include_once "config.php";
	$connect =  mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if(mysqli_connect_error())
	{
		echo "Failed to connect to MySQL". mysqli_connect_error();exit();
	}
	$query = "SELECT * FROM contacts";
	$results = mysqli_query($connect,$query);
	$arr = array();
	while($row = mysqli_fetch_array($results)) {
		$arr[] = array(
			'id'			=>	$row['id'],
			'name'			=>	$row['name'],
			'address'		=>	$row['address'],
			'tel'			=>	$row['tel'],
			'email'			=>  $row['email'],
			'type'			=>  $row['type'],
            'photo'			=>	"img/placeholder.png",
		);
	}
	return json_encode($arr);
}