<?php
// Nama File : get_customer.php
// Deskripsi : Menampilkan informasi customer berdasarkan id yang diberikan
// Nama      : Dorino Baharson
// Tanggal   : 3 Oktober 2023
// NIM       :24060121130090

require_once('./lib/db_login.php');
$customerid = $_GET['id'];
// TODO 1: Ambil value dari query string parameter id
$query = "SELECT * FROM customers WHERE customerid =".$customerid;
$result = $db->query($query);
// TODO 2: Tuliskan dan eksekusi query untuk mendapatkan informasi customer

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

// TODO 3: Tuliskan response
while ($row = $result->fetch_object()) {
    echo'name: '.$row->name.'<br />';
    echo'address: '.$row->address.'<br />';
    echo'city: '.$row->city.'<br />';

}
// TODO 4: Dealokasi variabel dan tutup koneksi database
$result->free();
$db->close();
?>
