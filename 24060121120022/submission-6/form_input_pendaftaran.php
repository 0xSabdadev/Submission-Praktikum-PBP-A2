<?php
// Nama : Aprilyanto Setiyawan Siburian
// Nim  : 24060121120022
// lab  : A2

include('header.html');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

if (isset($_POST['submit'])){
    $submit = true;

    // Validasi nama
    if (empty($_POST['name'])) {
        $error_nama = "Nama tidak boleh kosong";
        $submit = false;
    } else {
        $nama = $db->real_escape_string(trim($_POST['name']));
    }

    // Validasi email
    if (empty($_POST['email'])) {
        $error_email = "Email tidak boleh kosong";
        $submit = false;
    } else {
        // Check email is valid
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error_email = "Email tidak valid";
            $submit = false;
        } else {
            $email = $db->real_escape_string(trim($_POST['email']));
            // Email is already registered
            $query = "SELECT * FROM tb_user WHERE email = '$email'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $error_email = "Email sudah terdaftar";
                $submit = false;
            }
        }
    }

    // Validasi provinsi
    if (empty($_POST['provinsi'])) {
        $error_provinsi = "Provinsi harus dipilih";
        $submit = false;
    } else {
        $provinsi = $_POST['provinsi'];
    }

    // Validasi kabupaten
    if (empty($_POST['kabupaten'])) {
        $error_kabupaten = "Kabupaten harus dipilih";
        $submit = false;
    } else {
        $kabupaten = $_POST['kabupaten'];
    }

    // Validasi Gender
    if (empty($_POST['gender'])) {
        $error_gender = "Gender tidak boleh kosong";
        $submit = false;
    } else {
        // Retrieve the selected gender value
        $gender = $_POST['gender'];
    }

    // Validasi Alamat
    if (empty($_POST['alamat'])) {
        $error_alamat = "Alamat tidak boleh kosong";
        $submit = false;
    } else {
        $alamat = $db->real_escape_string(trim($_POST['alamat']));
    }

    if ($submit) {
        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$gender', '$alamat', $provinsi, $kabupaten)";
        $result = $db->query($query);

        if ($result) {
            echo "<div class='alert alert-success'>Data berhasil ditambahkan</div>";
            $nama = "";
            $email = "";
            $gender = "";
            $alamat = "";
            $provinsi = "";
            $kabupaten = "";
        } else {
            echo "<div class='alert alert-danger'>Gagal mendaftar!</div>";
        }
    }
}

?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto ">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            Form     
        </a>
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            Responsi Praktikum PBP  
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form class="space-y-4 md:space-y-6" action="" method="POST" name="daftar">

                    <!-- Sub-Form Name -->

                    <div class="form-group">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="name" id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                            focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <div class="error text-danger" id="error_name"style="color: red;"><?php if (isset($error_nama))  echo $error_nama ?></div>
                    </div>

                    <!-- Sub-Form  Email-->

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name ="email" id="email"  oninput="getUser()" value="<?php if (isset($email)) echo $email; ?>" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 
                            focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <div class="error text-danger" id = "error_email" style="color: red;"><?php if (isset($error_email))  echo $error_email ?></div>
                    </div>

                    <!-- Sub-Form Jenis Kelamin -->

                    <div class="flex items-center mb-4">
                        <input id="Laki-laki" type="radio" value="Laki-laki" name="gender" 
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 
                            dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="Laki-laki" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                    </div>
                    <div class="flex items-center">
                        <input id="Perempuan" type="radio" value="Perempuan" name="gender" 
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 
                            dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="Perempuan" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                    </div>
                    <div id="error_gender" class="error text-danger">
                        <?php if (isset($error_gender))  echo $error_gender ?>
                    </div>


                    <!-- Sub-Form Alamat -->

                    <div>
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea id="alamat" name="alamat"rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                        border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        <div id="error_alamat" style="color: red;">
                            <?php if (isset($error_alamat))  echo $error_alamat ?>
                        </div>
                    </div>



                    <!-- Sub-Form Provinsi -->

                    <div>
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                        <select onchange="getKabupaten(this.value)" id="provinsi" name="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>-- Pilih Provinsi --</option>
                            <?php require_once('get_provinsi.php')?>
                        </select>
                        <div id="error_provinsi" style="color: red;">
                            <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                        </div>
                    </div>

                    <!-- Sub-Form Kabupaten -->

                    <div>
                        <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                        <select id="kabupaten" name="kabupaten" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>-- Pilih Kabupaten --</option>
                            <?php require_once('get_kabupaten.php')?>
                        </select>
                        <div id="error_kabupaten" style="color: red;">
                            <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                        </div>
                    </div>

                    <!-- Sub-Form Tombol -->

                    <div>
                        <button type="submit" name="reset" value="reset" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 
                            font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reset</button>
                        <button type="submit" id="submit" name="submit"value="submit"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                            font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Daftar</button>
                    </div>



                </form>
            </div>
        </div>
    </div>
</section>


<?php include('footer.html') ?>