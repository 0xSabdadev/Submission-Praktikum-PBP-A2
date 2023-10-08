<?php include('./templates/header.html') ?>
<?php
// Nama : Mitslina
// Nim  : 24060121130068
// lab  : A2

require_once('./lib/db_login.php');

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */
if (isset($_POST['submit'])) {
    $is_valid = TRUE;

    // Lakukan validasi terhadap isi form nama
    $nama = test_input($_POST['nama']);
    if ($nama == '') {
        $error_nama = "Nama tidak boleh kosong";
        $is_valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        $is_valid = FALSE;
    }
    // Lakukan validasi terhadap isi form email
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email tidak boleh kosong";
        $is_valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $error_email = "Format email tidak benar";
        $is_valid = FALSE;
    }

    // Lakukan validasi terhadap isi form jenis kelamin
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    if ($gender == '') {
        $error_gender = "Jenis kelamin tidak boleh kosong";
        $is_valid = FALSE;
    }
    
    // Lakukan validasi terhadap isi form alamat
    $alamat = test_input($_POST['alamat']);
    if ($alamat == '') {
        $error_alamat = "Alamat tidak boleh kosong";
        $is_valid = FALSE;
    }
    // Lakukan validasi terhadap isi form provinsi
    $provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : "";
    if ($provinsi == '') {
        $error_provinsi = "Provinsi tidak boleh kosong";
        $is_valid = FALSE;
    }
    // Lakukan validasi terhadap isi form kabupaten
    $kabupaten = isset($_POST['kabupaten']) ? $_POST['kabupaten'] : "";
    if ($kabupaten == '') {
        $error_kabupaten = "Kabupaten tidak boleh kosong";
        $is_valid = FALSE;
    }
    
    // Jika valid maka masukkan ke database
    if ($is_valid) {
        $query_email = "SELECT COUNT(*) FROM tb_user WHERE email = ?";
        $check_email = $db->prepare($query_email);
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $check_email->bind_result($email_count);
        $check_email->fetch();

        if ($email_count > 0) {
            // Email sudah terdaftar, isi $error_message untuk ditampilkan
            $error_message = "Email sudah terdaftar. Silakan gunakan email lain!";
            $check_email->close();
        } else {
            // Email belum terdaftar, lanjutkan penyimpanan data
            $check_email->close();
            $alamat = $db->real_escape_string($alamat);

            $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES (?, ?, ?, ?, ?, ?)";
            $result = $db->prepare($query);
            $result->bind_param("ssssss", $nama, $email, $gender, $alamat, $provinsi, $kabupaten);

            if ($result->execute()) {
                $db->close();
                header("Location: result_page.php?status=success");
            } else {
                $error_message = "Gagal Simpan Data. Silakan Coba Lagi.";
            }
        }
    }
}
?>

<section>
    <?php if (!empty($error_message)): ?>
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 bg-red-300 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ml-3 text-sm font-medium text-red-700 text-center mt-4"><?php echo $error_message; ?></div>
        </div>
    <?php endif; ?>
    <div class="bg-gray-50 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 gap-8 lg:gap-16">
            <div class="w-full lg:max-w-xl mx-auto bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="w-full lg:max-w-xlp-6 space-y-8 p-4 bg-white rounded-t-lg bg-lime-600">
                    <h2 class="text-2xl font-medium text-center text-white dark:text-white">
                        Form Input Pendaftaran
                    </h2>
                </div>
                <form name="daftar" method="POST" action="" class="space-y-6 p-6">
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan nama..."
                        value="<?php if (isset($nama)) echo $nama; ?>">
                        <div id="error_nama" class="text-red-700">
                            <?php if (isset($error_nama)) echo $error_nama ?>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com"
                        oninput="getUser()" value = "<?php if (isset($email)) echo $email; ?>">
                        <div id="error_email" class="text-red-700">
                            <?php if (isset($error_email)) echo $error_email ?>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <div>
                            <label class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                <input type="radio" name="gender" value="Laki-laki" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                value="Laki-laki" <?php if (isset($gender) && $gender=="Laki-laki") echo "checked"; ?>
                            >Laki-Laki</label>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                <input type="radio" name="gender" value="Perempuan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                value="Perempuan" <?php if (isset($gender) && $gender=="Perempuan") echo "checked"; ?>
                            >Perempuan</label>
                        </div>
                        <div id="error_gender" class="text-red-700">
                            <?php if (isset($error_gender)) echo $error_gender ?>
                        </div>
                    </div>
                    <div>
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Masukkan alamat..."><?php if (isset($_POST['alamat'])) echo $_POST['alamat']; ?></textarea>
                        <div id="error_alamat" class="text-red-700">
                            <?php if (isset($error_alamat)) echo $error_alamat ?>
                        </div>
                    </div>
                    <div>
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                        <select name="provinsi" id="provinsi" onchange="getKabupaten(this.value)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value="">Pilih Provinsi</option>
                            <?php require_once('get_provinsi.php')?>
                        </select>
                        <div id="error_provinsi" class="text-red-700">
                            <?php if (isset($error_provinsi)) echo $error_provinsi ?>
                        </div>
                    </div>
                    <div>
                        <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value="">Pilih kabupaten</option>
                            <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
                        </select>
                        <div id="error_kabupaten" class="text-red-700">
                            <?php if (isset($error_kabupaten)) echo $error_kabupaten ?>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" name="submit" value="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">DAFTAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="ajax.js"></script>
<?php include('./templates/footer.html') ?>