<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : file yang di-request
 -->

<?php
    require_once('db_login.php');

    // variabel superglobal $_POST menyimpan data yang dikirimkan melalui method POST
    $name = $db->real_escape_string($_POST['name']);
    $address = $db->real_escape_string($_POST['address']);
    $city = $db->real_escape_string($_POST['city']);

    // mengambil data dari database customers berdasarkan name, address, dan city
    $query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
    $result = $db->query($query);
    
    if (!$result) { // jika query gagal dieksekusi
        echo '<div class="alert alert-danger alert-dismissible">
                <strong>Error!</strong> Could not query the database<br>' . $db->error . '<br>query= ' . $query .
            '</div>';
    } else { // jika query berhasil dieksekusi
        echo '<div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Data has been added.<br>
                Name: ' . $_POST['name'] . '<br>
                Address: ' . $_POST['address'] . '<br>
                City: ' . $_POST['city'] . '<br>
                </div>';
    }

    // menutup koneksi database
    $db->close();
?>