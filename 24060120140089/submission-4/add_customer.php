<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php
// File      : add_customer.php
// Deskripsi : Menambahkan data customer baru ke database

require_once('db_login.php');
// ketika tombol submit ditekan
if (isset($_POST["submit"])){
    
    $valid = TRUE; //flag validasi
    $name = test_input($_POST['name']);
    if ($name == ''){
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)){
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $address = test_input($_POST['address']);
    if ($address == ''){
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $city = $_POST['city'];
    if ($city == '' || $city == 'none'){
        $error_city = "City is required";
        $valid = FALSE;
    }

    // //update data into database
    if ($valid){
        //escape inputs data
        $address = $db->real_escape_string($address); //menghapus tanda petik
        //asign a query
        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
        //execute the query
        $result = $db->query($query);
        
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: view_customer.php');
        }
    }
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
<div class="container">
<div class="card">
    <div class="card-header">Add Customers Data</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars
        ($_SERVER["PHP_SELF"])?>">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name;?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name;?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="5"><?php if(isset($address)) echo
                $address;?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address;?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (isset($city)) echo 'selected="true"';?>>
                    --Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city =="Airport West") 
                    echo 'selected="true"';?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city =="Box Hill") 
                    echo 'selected="true"';?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city =="Yarraville") 
                    echo 'selected="true"';?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city;?></div>
            </div>
            <br />
            <button type="submit" class="btn btn-primary" name="submit" value="submit">
                Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a> 
        </form>
    </div>
</div>
</div>
  </body>
</html>
