<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
    
</body>
</html>

<?php
// Nama : Athiya Puteri Hidayat
// Nim  : 24060121140128
// lab  : A2

include('header.html');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

if (isset($_POST['submit'])) {
    $submit = true;

    //Validasi nama
    $nama = $db->real_escape_string(trim($_POST['nama']));
    if (empty($nama)) {
        $error_nama = "Name must be filled";
        $submit = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_nama = "Names can only contain letters and Spaces";
        $submit = false;
    }
    
    //Validasi email
    $email = $db->real_escape_string(trim($_POST['email']));
    if (empty($email)) {
        $error_email = "Email must be filled";
        $submit = false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_email = "Email format incorrect";
            $submit = false;
        } else {
            $query = "SELECT * FROM tb_user WHERE email = '$email'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
              $error_email = "Email registered";
              $submit = false;
            }
        }
    }

    //Validasi jenis kelamin
    $gender = $_POST['gender'];
    if (empty($gender)) {
        $error_gender = "Gender should not be empty";
        $submit = false;
    }

    //Validasi alamat
    $alamat = ($_POST['alamat']);
    if (empty($alamat)) {
        $error_alamat = "Address must be filled";
        $submit = false;
    }

    //Validasi provinsi
    $provinsi = $_POST['provinsi'];
    if ($provinsi == '' || $provinsi == 'provinsi') {
        $error_provinsi = "Province should not be empty";
        $submit = false;
    }

    //Validasi kabupaten
    $kabupaten = $_POST['kabupaten'];
    if ($kabupaten == '' || $kabupaten == 'kabupaten') {
        $error_kabupaten = "Regency should not be empty";
        $submit = false;
    }

    if ($submit) {
        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$gender', '$alamat', $provinsi, $kabupaten)";
        $result = $db->query($query);

        if ($result) {
            $success = true;
            $success_message = "Registration successful. Welcome, $nama!";
        } else {
            $success = false;
            $error_message = "There was an error storing the data to the database.";
        }
        $db->close();
    }
}
?>

<div class="card">
  <?php if (isset($success)): ?>
    <?php if ($success): ?>
      <div class="alert alert-success" role="alert">
        Berhasil mendaftar
      </div>
    <?php else: ?>
      <div class="alert alert-danger" role="alert">
        Gagal Mendaftar!
      </div>
    <?php endif; ?>
  <?php endif; ?>
    <section class="bg-purple-100 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-min lg:py-0">
            <p class="flex items-center mb-4 text-2xl font-sans semibold text-purple-900 dark:text-white underline decoration-double">
                Form Input Pendaftaran  
            </p>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-2 md:space-y-6 sm:p-8">
                        <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
                        <form class="space-0 md:space-1" name="daftar" method="POST" action="">
                            <div>
                                <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                <div id="error_name" style="color: red;">
                                    <?php if (isset($error_nama))  echo $error_nama ?>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <!-- TODO 4 : buatlah cek email menggunakan ajax -->
                                <input type="email" name="email" id="email" class="mb-1 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" oninput="getUser()">
                                <div id="error_email" style="color: red;">
                                    <?php if (isset($error_email))  echo $error_email ?>
                                </div>
                            </div>
                            <div class="p-1">
                                <label>Jenis Kelamin</label>
                                <div class="flex items-center p-1">
                                    <input type="radio" name="gender" value="Laki-laki" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gender" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                </div>
                                <div class="flex items-center p-1">
                                    <input type="radio" name="gender" value="Perempuan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gender" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                </div>
                                <div id="error_gender" style="color: red; margin-bottom: 12px;">
                                    <?php if (isset($error_gender))  echo $error_gender ?>
                                </div>
                            </div>
                            <div>
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="2.5" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your address here..."></textarea>
                                <div id="error_alamat" style="color: red;">
                                    <?php if (isset($error_alamat))  echo $error_alamat ?>
                                </div>
                            </div>
                            <div>
                                <label for="provinsi" class="block mb-1 p-1 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                <select onchange="getKabupaten(this.value)" name="provinsi" id="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih Provinsi</option>
                                    <?php require_once('get_provinsi.php'); ?>
                                </select>
                                <div id="error_provinsi" style="color: red;">
                                    <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                                </div>
                            </div>
                            <div>
                                <label for="kabupaten" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                                <select name="kabupaten" id="kabupaten" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih kabupaten</option>
                                    <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
                                    <?php require_once('get_kabupaten.php'); ?>
                                </select>
                                <div id="error_kabupaten" style="color: red;">
                                    <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                                </div>
                            </div>
                            <button type="submit" name="submit" value="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Daftar</button>
                        </form>
                    </div>
                </div>
        </div>
    </section>

<?php include('footer.html') ?>