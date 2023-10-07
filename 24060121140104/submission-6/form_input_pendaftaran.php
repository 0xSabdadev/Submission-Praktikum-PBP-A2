<?php
// Nama : Divia Shinta Sukarsaatmadja
// Nim  : 24060121140104
// lab  : A2

include('header.html');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

$error_nama = $error_email = $error_gender = $error_alamat = $error_provinsi = $error_kabupaten = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    $nama = $_POST["nama"];
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    }

    // Validasi Email (gunakan filter_var untuk validasi email)
    $email = $_POST["email"];
    if (empty($email)) {
        $error_email = "Email harus diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Email tidak valid";
    }

    // Validasi Jenis Kelamin
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        $error_gender = "Pilih jenis kelamin";
    }

    // Validasi Alamat
    $alamat = $_POST["alamat"];
    if (empty($alamat)) {
        $error_alamat = "Alamat harus diisi";
    }

    // Validasi Provinsi
    $provinsi = $_POST["provinsi"];
    if (empty($provinsi)) {
        $error_provinsi = "Pilih provinsi";
    }

    // Validasi Kabupaten
    $kabupaten = $_POST["kabupaten"];
    if (empty($kabupaten)) {
        $error_kabupaten = "Pilih kabupaten";
    }

    $email = mysqli_real_escape_string($db, $_POST['email']);

    // Check apakah email sudah ada dalam database
    $check_query = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = $db->query($check_query);
    
    if ($result && $result->num_rows > 0) {
        $error_email = "Email telah digunakan";
    } else {
        $nama = mysqli_real_escape_string($db, $_POST['nama']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
        $provinsi = mysqli_real_escape_string($db, $_POST['provinsi']);
        $kabupaten = mysqli_real_escape_string($db, $_POST['kabupaten']);
    
        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$gender', '$alamat', '$provinsi', '$kabupaten')";
        
        if ($db->query($query) === TRUE) {
            echo "<script>alert('Yeyy!! Data berhasil diinput ke database.')</script>";
        } else {
            echo "Error: " . $query . "<br>" . $db->error;
        }
    }
}

?>

<div class="p-4 border-solid border-2 border-grey-500">
    <div class="font-thin">Form Input Pendaftaran</div>
    <div class="card-body">
        <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
        <form name="daftar" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="flex flex-col">
                <label for="name">Nama</label>
                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <div id="error_name" style="color: red;">
                    <?php if (isset($error_nama))  echo $error_nama ?>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="email">Email</label>
                <!-- TODO 4 : buatlah cek email menggunakan ajax -->
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" oninput="getUser()">
                <div id="emailAvailability"></div>
                <div id="error_email" style="color: red;">
                    <?php if (isset($error_email))  echo $error_email ?>
                </div>
            </div>
            <label>Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" name="gender" value="Laki-laki">Laki-laki
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" name="gender" value="Perempuan">Perempuan
                </label>
            </div>
            <div id="error_gender" style="color: red; margin-bottom: 12px;">
                <?php if (isset($error_gender))  echo $error_gender ?>
            </div>
            <div class="flex flex-col">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                <div id="error_alamat" style="color: red;">
                    <?php if (isset($error_alamat))  echo $error_alamat ?>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="provinsi">Provinsi</label>
                <select onchange="getKabupaten(this.value)" name="provinsi" id="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Pilih Provinsi</option>
                    <?php require_once('get_provinsi.php'); ?>
                </select>
                <div id="error_provinsi" style="color: red;">
                    <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="kabupaten">Kabupaten</label>
                <select name="kabupaten" id="kabupaten" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Pilih kabupaten</option>
                    <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
                </select>
                <div id="error_kabupaten" style="color: red;">
                    <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                </div>
            </div>
            <br>
            <button type="submit" name="submit" value="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Daftar</button>
        </form>
    </div>
</div>

<?php include('footer.html') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="ajax.js"></script>
    <script>
        function getUser() {
        var email = encodeURI(document.forms["daftar"]["email"].value);
        var inner = "emailAvailability";
        var url = "get_user.php?email=" + email;

        var xmlhttp = getXMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var response = xmlhttp.responseText;
                document.getElementById(inner).innerHTML = response;
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        }
    </script>
</body>
</html>