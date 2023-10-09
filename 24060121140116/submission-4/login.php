<?php
// TODO 1: Buat sebuah sesi baru
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// TODO 2: Lakukan koneksi dengan database
require_once('./lib/db_login.php');

// Memeriksa apakah user sudah submit form
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // Jika sudah login, arahkan ke halaman yang sesuai (misalnya, view_customer.php)
    header("Location: view_customer.php");
    exit;
}

// Inisialisasi variabel error
$error_email = $error_password = '';

// Memeriksa apakah user telah mengirimkan form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = true;

    // Memeriksa validasi email
    if (isset($_POST['email'])) {
        $email = test_input($_POST['email']);
        if ($email == '') {
            $error_email = 'Email is required';
            $valid = false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = 'Invalid email format';
            $valid = false;
        }
    } else {
        $valid = false;
    }

    // Memeriksa validasi password
    if (isset($_POST['password'])) {
        $password = test_input($_POST['password']);
        if ($password == '') {
            $error_password = 'Password is required';
            $valid = false;
        }
    } else {
        $valid = false;
    }

    // Memeriksa validasi
    if ($valid) {
        // TODO 3: Buatlah query untuk melakukan verifikasi terhadap kredensial yang diberikan
        // Assign a query
        $query = "SELECT * FROM admin WHERE email = '" . $email . "' AND password = '" . md5($password) . "'";

        // TODO 4: Eksekusi query
        // Execute query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error);
        } else {
            if ($result->num_rows > 0) {
                // Login berhasil, atur sesi untuk menyimpan informasi login
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['username'] = $email;

                // Redirect ke halaman yang sesuai setelah login berhasil (misalnya, view_customer.php)
                header('Location: view_customer.php');
                exit;
            } else {
                echo '<span class="error">Combination of username and password are not correct.</span>';
            }
        }

        // TODO 5: Tutup koneksi dengan database
        $db->close();
    }
}
?>
<?php include('./header.php') ?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card" style="background-color: #87CEEB;">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php if (isset($email)) echo $email; ?>">
                            <div class="error"><?php if (isset($error_email)) echo $error_email ?></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                            <div class="error"><?php if (isset($error_password)) echo $error_password ?></div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('./footer.php') ?>