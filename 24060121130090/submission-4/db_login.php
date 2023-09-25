   <?php
    //File      : db_login.php
    //Deskripsi : php ini digunakan untuk membuat koneksi ke database
   // Nama        : Dorino Baharson
    //NIM          : 24060121130090
    $db_host = 'localhost';
    $db_database = 'bookorama';
    $db_username = 'root';
    $db_password = '';


    // connect database
    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    if ($db->connect_errno){
        die ("Tidak menghubungkan database: <br />". $db->connect_error);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>