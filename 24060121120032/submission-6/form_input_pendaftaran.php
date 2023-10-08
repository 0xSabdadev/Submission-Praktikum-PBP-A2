<!-- // Nama : Elisabeth Zefanya Putri
// NIM  : 24060121120032
// Lab  : A2 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>Form Input Pendaftaran</title>
</head>

<body>
<?php   

include('header.html');
require_once 'lib/db_login.php';

$error_nama = $error_email = $error_gender = $error_alamat = $error_provinsi = $error_kabupaten = "";
$is_valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Server-side validation
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? $_POST["jenis_kelamin"] : "";
    $alamat = $_POST["alamat"];
    $provinsi = $_POST["provinsi"];
    $kabupaten = $_POST["kabupaten"];

    if (empty($_POST["nama"])) {
        $error_nama = "Nama tidak boleh kosong";
    }elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = "Hanya huruf dan spasi yang diperbolehkan";
        $is_valid = false;
    }

    if (empty($_POST["email"])) {
        $error_email = "Email tidak boleh kosong";
        $is_valid = false;
    }

    if (empty($_POST["jenis_kelamin"])) {
        $error_gender = "Jenis Kelamin harus dipilih";
        $is_valid = false;
    }

    if (empty($_POST["alamat"])) {
        $error_alamat = "Alamat tidak boleh kosong";
        $is_valid = false;
    }

    if (empty($_POST["provinsi"])) {
        $error_provinsi = "Provinsi harus dipilih";
        $is_valid = false;
    }

    if (empty($_POST["kabupaten"])) {
        $error_kabupaten = "Kabupaten harus dipilih";
        $is_valid = false;
    }

    if ($is_valid) {
        $query = "INSERT INTO tb_user (`id`, `nama`, `email`, `jenis_kelamin`, `alamat`, `kode_prov`, `kode_kab`) VALUES (NULL, '$nama', '$email', '$jenis_kelamin', '$alamat', '$provinsi', '$kabupaten')";
        $result = $db->query( $query );
        
        if (!$result) {
            die("Could not query the database: <br>" . $db->error . '<br>Query: ' . $query);
        }
        // tampilkan jika hasil berhasil
        else{
            echo '
            <div class="alert alert-success bg-green-50 border border-green-300 p-4 mb-4 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-green-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <h3 class="text-lg font-medium text-green-800">Pendaftaran berhasil dilakukan</h3>
                </div>
                <div class="mt-2 mb-4 text-sm text-green-800">
                    Nama            : ' . $nama .           '<br>
                    Email           : ' . $email .          '<br>
                    Jenis Kelamin   : ' . $jenis_kelamin .  '<br>
                    Alamat          : ' . $alamat .         '<br>
                    Provinsi        : ' . $provinsi .       '<br>
                    Kabupaten       : ' . $kabupaten .      '<br>
                </div>
            </div>';

             // Reset form field values and error messages
            $nama = $email = $jenis_kelamin = $alamat = $provinsi = $kabupaten = "";
            $error_nama = $error_email = $error_gender = $error_alamat = $error_provinsi = $error_kabupaten = "";
        }
        $db->close();
    }
}   
?>
    <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl  lg:py-16">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="card-header text-center font-bold tracking-tight text-gray-900 dark:text-white">Form Input Pendaftaran</div>
                    <div class="card-body">
                        
                        <form name="daftar" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            
                            <div class="mb-6">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Nama</label>
                                <input type="text" name="nama" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama anda" value="<?php if(isset($nama)) {echo $nama;}?>">
                                <div id="error_name" style="color: red;">
                                    <?php if (isset($error_nama))  echo $error_nama ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan email anda" oninput="getUser()" value="<?php if(isset($email)) {echo $email;}?>">
                                <div id="error_email" style="color: red;">
                                    <?php if (isset($error_email))  echo $error_email ?>
                                </div>
                            </div>
                            
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="Laki-laki") echo "checked"?>>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                        
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="Perempuan") echo "checked"?>>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                            <div id="error_gender" style="color: red; margin-bottom: 12px;">
                                <?php if (isset($error_gender))  echo $error_gender ?>
                            </div>
                            
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan alamat anda"><?php if(isset($alamat)) {echo $alamat;}?></textarea>
                            <div id="error_alamat" style="color: red;">
                                <?php if (isset($error_alamat))  echo $error_alamat ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control" onchange="getKabupaten(this.value)">
                                    <option value="">Pilih Provinsi</option>
                                    <?php require_once('get_provinsi.php'); ?>
                                </select>
                                <div id="error_provinsi" style="color: red;">
                                    <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <option value="">Pilih kabupaten</option>
                                    <?php
                                    require_once('get_kabupaten.php'); 
                                    if (isset($kabupaten)) {
                                        echo '<option value="' . $kabupaten . '" selected>' . $kabupaten . '</option>';
                                    }
                                    ?>
                                </select>
                                <div id="error_kabupaten" style="color: red;">
                                    <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                                </div>
                            </div>

                            <br>

                            <button type="submit" name="submit" value="submit"class=" btn btn-primary container-fluid">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include('footer.html'); ?>
    </body>

</html>