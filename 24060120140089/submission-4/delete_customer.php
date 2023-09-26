<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php
// File      : delete_customer.php
// Deskripsi : Menghapus data customer dari database

require_once('db_login.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    $query = " SELECT * FROM customers WHERE customerid=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
} else{

    $name = test_input($_POST['name']);
    $address = test_input($_POST['address']);
    $city = $_POST['city'];
        //asign a query
        $query = " DELETE FROM customers WHERE customerid=".$id." ";
        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: view_customer.php');
        }
    // }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bookorama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<br>

<div class="card">
    <div class="card-header">Delete This Customer</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars
        ($_SERVER["PHP_SELF"]).'?id='.$id;?>">
            <table>
                <tr>
                    <td>Name: </td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><?php echo $address; ?></td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td><?php echo $city; ?></td>
                </tr>
            </table>
            
            <br />
            <button type="submit" class="btn btn-primary" name="submit" value="submit">
                Confirm</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a> 
        
        </form>
    </div>
</div>
</body>
</html>