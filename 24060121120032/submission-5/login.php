<?php
// TODO 1: Buat sebuah sesi baru
session_start(); // Inisialisasi session
require_once('lib/db_login.php');
// TODO 2: Lakukan koneksi dengan database
if (isset($_POST["submit"])) {
    $valid = TRUE; // Flag validasi
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Cek validasi email
    if (!$email) {
        $error_email = "Invalid email format";
        $valid = FALSE;
    }

    // Cek validasi password
    if (empty($password)) {
        $error_password = "Password is required";
        $valid = FALSE;
    }

    if ($valid) {
        // TODO 3: Buatlah query untuk melakukan verifikasi terhadap kredensial yang diberikan
        // Gunakan pernyataan bersamaan atau PreparedStatement untuk menghindari SQL Injection
        $query = " SELECT * FROM admin WHERE email='" . $email . "' AND password='" . md5($password) . "' ";
        
        $result = $db->query($query);

        if (!$result) {
            die("Could not query the database: <br />" . $db->error);
        } else {
            if ($result->num_rows > 0) {
                // Login berhasil
                $_SESSION['username'] = $email;
                header('Location: view_customer2.php');
                exit;
            } else {
                // Login gagal
                $error_message = 'Combination of email and password is not correct.';
            }
        }

        // Tutup koneksi database
        $db->close();
    }
}

?>

<?php include('header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Login Form</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>">
                <div class="error"><?php if (isset($error_email)) echo $error_email ?></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="">
                <div class="error"><?php if (isset($error_password)) echo $error_password ?></div>
            </div>
            <?php if (isset($error_message)) : ?>
                <div class="error"><?= $error_message ?></div>
            <?php endif; ?>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
        </form>
    </div>
</div>
<?php include('footer.php') ?>
