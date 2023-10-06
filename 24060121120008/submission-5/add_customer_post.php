<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 03 Oktober 2023
     Lab        : PBP A2
 -->
 
<?php
	require_once('./lib/db_login.php');
    if (isset($_POST['name'])) {
        $name = $db->real_escape_string($_POST['name']);
    }

    if (isset($_POST['address'])) {
        $address = $db->real_escape_string($_POST['address']);
    }

    if (isset($_POST['city'])) {
        $city = $db->real_escape_string($_POST['city']);
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
				Name: '.$_POST['name'].'<br>
				Address: '.$_POST['address'].'<br>
				City: '.$_POST['city'].'<br>
			  </div>';
	}
	//close db connection
	$db->close();
?>