<?php
// Nama : Adri Audifirst
// Nim  : 24060121140152
// lab  : A2

include('header.html');
require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

$formSubmitted = false;

if (isset($_POST['submit'])) {
    $submit = true;
    if (empty($_POST['nama'])) {
        $error_nama = "Bidang ini harus diisi";
        $submit = false;
    } else {
        $nama = $db->real_escape_string(trim($_POST['nama']));
    }

    if (empty($_POST['email'])) {
        $error_email = "Bidang ini harus diisi";
        $submit = false;
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error_email = "Invalid Email";
            $submit = false;
        } else {
            $email = $db->real_escape_string(trim($_POST['email']));
            $query = "SELECT * FROM tb_user WHERE email = '$email'";
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $error_email = "Email sudah terdaftar";
                $submit = false;
            }
        }
    }

    if (empty($_POST['gender'])) {
        $error_gender = "Bidang ini harus dipilih";
        $submit = false;
    } else {
        $gender = $db->real_escape_string(trim($_POST['gender']));
    }

    if (empty($_POST['alamat'])) {
        $error_alamat = "Bidang ini harus diisi";
        $submit = false;
    } else {
        $alamat = $db->real_escape_string(trim($_POST['alamat']));
    }

    if (empty($_POST['provinsi'])) {
        $error_provinsi = "Bidang ini harus dipilih";
        $submit = false;
    } else {
        $provinsi = $db->real_escape_string(trim($_POST['provinsi']));
    }

    if (empty($_POST['kabupaten'])) {
        $error_kabupaten = "Bidang ini harus dipilih";
        $submit = false;
    } else {
        $kabupaten = $db->real_escape_string(trim($_POST['kabupaten']));
    }

    if ($submit) {
        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$gender', '$alamat', $provinsi, $kabupaten)";
        $result = $db->query($query);

        if (!$result) {
            $success = false;
            $error_message = "Tidak Terdaftar";
        } else {
            $success = true;
            $formSubmitted = true;
            $nama = "";
            $email = "";
            $gender = "";
            $alamat = "";
            $provinsi = "";
            $kabupaten = "";
        }
        $db->close();
    }
}
?>

<div class="card">
    <div class="min-h-screen bg-yellow-200 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <?php if (isset($success) && $formSubmitted) : ?>
            <?php if ($success) : ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <strong class="font-bold">Terdaftar</strong>
                </div>
                <script>
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                </script>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-800">
                Formulir Input Pendaftaran
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
                <form name="daftar" method="POST" action="" class="space-y-6">
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nama
                        </label>
                        <input type="text" name="nama" id="nama" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <div id="error_name" class="text-red-500 text-xs mt-1">
                            <?php if (isset($error_nama))  echo $error_nama ?>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <!-- TODO 4 : buatlah cek email menggunakan ajax -->
                        <input type="email" name="email" id="email" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" oninput="getUser()" value="<?php if (isset($email)) echo $email; ?>">
                        <div id="error_email" class="text-red-500 text-xs mt-1">
                            <?php if (isset($error_email))  echo $error_email ?>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <span class="block text-sm font-medium text-gray-700">Jenis Kelamin</span>
                        <div class="mt-2 space-y-4">
                            <div class="flex items-center">
                                <input type="radio" class="form-radio text-yellow-500" name="gender" value="Laki-laki">
                                <label for="gender" class="ml-2 block text-sm text-gray-900">Laki-laki</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" class="form-radio text-yellow-500" name="gender" value="Perempuan">
                                <label for="gender" class="ml-2 block text-sm text-gray-900">Perempuan</label>
                            </div>
                        </div>
                        <div id="error_gender" class="text-red-500 text-xs mt-1">
                            <?php if (isset($error_gender))  echo $error_gender ?>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">
                            Alamat
                        </label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        <div id="error_alamat" class="text-red-500 text-xs mt-1">
                            <?php if (isset($error_alamat))  echo $error_alamat ?>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <select onchange="getKabupaten(this.value)" name="provinsi" id="provinsi" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                            <option value="">Pilih Provinsi</option>
                            <?php require_once('get_provinsi.php'); ?>
                        </select>
                        <div id="error_provinsi" class="text-red-500 text-xs mt-1">
                            <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                            <option value="">Pilih Kabupaten</option>
                            <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
                        </select>
                        <div id="error_kabupaten" class="text-red-500 text-xs mt-1">
                            <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-md px-3 py-2">
                        <button id="submit" type="submit" name="submit" value="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer.html') ?>
</div>