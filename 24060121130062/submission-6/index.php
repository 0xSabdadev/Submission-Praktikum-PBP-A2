<?php
// Nama : Varrel
// Nim  : 24060121130062
// lab  : A2

include('./header.html');

require_once './db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

$provinsi = '';
$kabupaten = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis-kelamin'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];

    //Validasi nama
    if (empty($nama)) {
        $error = true;
        $error_nama = "Nama tidak boleh kosong.";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error = true;
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }

    //Validasi email
    if (empty($email)) {
        $error = true;
        $error_email = "Email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $error_email = "Format email tidak valid.";
    }

    //Validasi jenis_kelamin
    if (empty($jenis_kelamin)) {
        $error = true;
        $error_gender = "Jenis kelamin wajib dipilih.";
    }

    //Validasi alamat
    if (empty($alamat)) {
        $error = true;
        $error_alamat = "Alamat tidak boleh kosong.";
    }

    //Validasi provinsi
    if (empty($provinsi)) {
        $error = true;
        $error_provinsi = "Provinsi wajib dipilih.";
    }

    //Validasi kabupaten
    if (empty($kabupaten)) {
        $error = true;
        $error_kabupaten = "Kabupaten wajib dipilih.";
    }

    //Insert data to database
    if (!$error) {
        $alamat = $db->real_escape_string($alamat);
        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$jenis_kelamin','$alamat', '$provinsi', '$kabupaten')";
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br>" . $db->error . '<br>Query: ' . $query);
        } else {
            echo '<div class="alert alert-success">Data berhasil disimpan</div>';
            $db->close();
        }
    }
}

?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2"
                src="https://cdn2.steamgriddb.com/file/sgdb-cdn/icon/b21f9f98829dea9a48fd8aaddc1f159d.png" alt="logo">
            Form Input Pendaftaran
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form class="space-y-4 md:space-y-6" name="daftar" action="" method="POST">
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tuliskan Nama">
                        <div id="error_nama" style="color: red;">
                            <?php if (isset($error_nama))
                                echo $error_nama ?>
                            </div>
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@gmail.com" oninput="getUser()">
                            <div id="error_email" style="color: red;">
                            <?php if (isset($error_email))
                                echo $error_email ?>
                            </div>
                            <span id="email_status"></span>
                        </div>
                        <div>
                            <label for="jenis-kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jenis Kelamin</label>
                            <div class="flex items-center mb-1">
                                <input id="jenis-kelamin-1" type="radio" value="laki-laki" name="jenis-kelamin"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="jenis-kelamin-1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div class="flex items-center mb-1">
                                <input id="jenis-kelamin-2" type="radio" value="perempuan" name="jenis-kelamin"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="jenis-kelamin-2"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                            <div id="error_gender" style="color: red; margin-bottom: 12px;">
                            <?php if (isset($error_gender))
                                echo $error_gender ?>
                            </div>
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            </label>
                            <textarea id="alamat" name="alamat" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tulis Alamat"></textarea>
                            <div id="error_alamat" style="color: red;">
                            <?php if (isset($error_alamat))
                                echo $error_alamat ?>
                            </div>
                        </div>
                        <div>
                            <label for="provinsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">provinsi
                            </label>
                            <select id="provinsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onchange="getKabupaten(this.value)" name="provinsi">
                                <option value="">Pilih Provinsi</option>
                            <?php require_once('get_provinsi.php'); ?>
                        </select>
                        <div id="error_provinsi" style="color: red;">
                            <?php if (isset($error_provinsi))
                                echo $error_provinsi ?>
                            </div>
                        </div>
                        <div>
                            <label for="kabupaten"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten
                            </label>
                            <select name="kabupaten" id="kabupaten"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Kabupaten</option>
                            <?php require_once('get_kabupaten.php'); ?>
                        </select>
                        <div id="error_kabupaten" style="color: red;">
                            <?php if (isset($error_kabupaten))
                                echo $error_kabupaten ?>
                            </div>
                        </div>
                        <script>
                            document.getElementById('provinsi').value = '<?php echo $provinsi ?>';
                        document.getElementById('kabupaten').value = '<?php echo $kabupaten ?>';
                    </script>
                    <br>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        name="submit" value="submit">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('footer.html') ?>