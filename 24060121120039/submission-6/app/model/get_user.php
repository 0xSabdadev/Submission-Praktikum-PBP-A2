<?php
// Nama : Nida' Naafilatul Haniifah
// Nim  : 24060121120039
// lab  : A2
require_once 'db_login.php';

$email = $_GET['email'];
$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);

if(!$result){
    die("Could not query the database : <br />" .$db->error);
}else{
    if($result->num_rows > 0){
        echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Email tersedia!</span>
            </div>';
    }else{
        echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Email tidak tersedia!</span>
        </div>';;
    }
}
?>