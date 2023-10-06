<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 25 September 2023
     Lab        : PBP A2
 -->

 <?php
// File         : login.php
// Deskripsi    : Menampilkan form login dan melakukan login ke halaman view_customer2.php
//                Melakukan login dengan prepared statement

session_start();
require_once('./lib/db_login.php');

// Memeriksa apakah user sudah submit form
if (isset($_POST['submit'])) {
    $valid = TRUE;

    // Memeriksa validasi email
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = 'Email is required';
        $valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = 'Invalid email format';
        $valid = FALSE;
    }

    // Memeriksa validasi password
    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = 'Password is required';
        $valid = FALSE;
    }

    // Memeriksa validasi
    if ($valid) {
		//Asign a query
		$stmt = $db->prepare(" SELECT * FROM admin WHERE email=? AND password=? ");
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$result = $stmt->get_result(); 
		
		if (!$result){
		   die ("Could not query the database: <br />". $db->error. 'query = '.$query);
		}else{
			if($result->num_rows < 1 ){
				$error_login = "Combination of password and username are not correct";
			}else{
				$_SESSION['username'] = $email;
                header('Location: view_customer2.php');
                exit;
			}
		}
		//close db connection
		$stmt->close();
		$db->close();
    }
}
?>
<?php include('./header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Login Form</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>">
                <div class="error"><?php if (isset($error_login)) echo $error_login ?></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="error"><?php if (isset($error_password)) echo $error_password ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>