<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 03 Oktober 2023
     Lab        : PBP A2
 -->

<?php
	require_once('./lib/db_login.php');
    if (isset($_GET['name'])) {
        $name = $db->real_escape_string($_GET['name']);
    }

    if (isset($_GET['address'])) {
        $address = $db->real_escape_string($_GET['address']);
    }

    if (isset($_GET['city'])) {
        $city = $db->real_escape_string($_GET['city']);
    }
	//Asign a query
	$query = " INSERT INTO customers (name, address, city) VALUES('".$name."','".$address."','".$city."') ";
	$result = $db->query( $query );
	if (!$result){
		echo '<div class="alert alert-danger alert-dismissible">
				<strong>Error!</strong> Could not query the database<br>'.
				$db->error. '<br>query = '.$query.
			 '</div>';
	}else{
		echo '<div class="alert alert-success alert-dismissible">
				<strong>Success!</strong> Data has been added.<br>
				Name: '.$_GET['name'].'<br>
				Address: '.$_GET['address'].'<br>
				City: '.$_GET['city'].'<br>
			  </div>';
	}
	//close db connection
	$db->close();
?>