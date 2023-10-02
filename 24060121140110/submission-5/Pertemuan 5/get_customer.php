<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : file yang di-request
 -->

<?php
    require_once('db_login.php');
    $customerid = $_GET['id'];

    // mengambil data dari database berdasarkan id customer
    $query = " SELECT * FROM customers where customerid=".$customerid;
    $result = $db->query( $query );
    if (!$result){ // jika query gagal dieksekusi
        die ("Could not query the database: <br />". $db->error);
    }

    // iterasi hasil query untuk mengambil data customers
    while ($row = $result->fetch_object()){
        echo 'Name : '.$row->name.'<br />';
        echo 'Address : '.$row->address.'<br />';
        echo 'City : '.$row->city.'<br />';
    }

    // dealokasi memory
    $result->free();
    $db->close();
?>