<?php
include_once "config.php";
$connect =  mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(mysqli_connect_error())
{
	echo "Failed to connect to MySQL". mysqli_connect_error();exit();
}

$data = json_decode(file_get_contents("php://input"));
if($data) {
	$insert_query = "INSERT INTO books(title,author,release_date,keywords) VALUES ('$data->title','$data->author','$data->release_date','$data->keywords')";
	//$insert_query = "INSERT INTO books(title,author,release_date,keywords) VALUES ('staticTitle','staticAuthor','staticReleaseDate','staticKeywords')";
	$insert_result = mysqli_query($connect,$insert_query);
}

$query = "SELECT * FROM books";
$results = mysqli_query($connect,$query);
$arr = array();
while($row = mysqli_fetch_array($results)) {
	$arr[] = array(
		'title'			=>	$row['title'],
		'author'		=>	$row['author'],
		'releaseDate'	=>	$row['release_date'],
		'keywords'		=>  $row['keywords']
	);
}

echo json_encode($arr);



/*
$arr = array(
	array(
			'title'			=>	'titleAaa',
			'author'		=>	'authorAaa',
			'releaseDate'	=>	'1393606800000',
			'keywords'		=>	array(
					'keyword'=>'what',
					'keyword'=>'is',
					'keyword'=>'contest'
				)
		),
	array(
			'title'			=>	'titleBbb',
			'author'		=>	'authorBbb',
			'releaseDate'	=>	'1393606800000',
			'keywords'		=>	array(
					'keyword'=>'what',
					'keyword'=>'is',
					'keyword'=>'contest'
				)
		),
	array(
			'title'			=>	'titleCcc',
			'author'		=>	'authorCcc',
			'releaseDate'	=>	'1393606800000',
			'keywords'		=>	array(
					'keyword'=>'what',
					'keyword'=>'is',
					'keyword'=>'contest'
				)
		)
);
*/
//
//echo json_encode($arr);
/*
$jsonString = '[{"title":"titleAaa","author":"authorAaa","releaseDate":"1393606800000","keywords":[{"keyword":"contest"}, {"keyword":"is"}, {"keyword":"what"}]}, {"title":"titleBbb","author":"authorBbb","releaseDate":"1393606800000","keywords":[{"keyword":"contest"}, {"keyword":"is"}, {"keyword":"what"}]}, {"title":"titleCcc","author":"authorCcc","releaseDate":"1393606800000","keywords":[{"keyword":"contest"}, {"keyword":"is"}, {"keyword":"what"}]}]';
echo $jsonString;
*/
?>