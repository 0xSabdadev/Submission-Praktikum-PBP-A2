<?php
// Nama : Sheva Ivanda Pratama
// Nim  : 24060120140089
// lab  : A2

include('header.html');
// include('ajax.js');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */
if (isset($_POST['submit'])) {

    $email = test_input($_POST['email']);
    $nama = $db->real_escape_string($_POST['nama']);
    $alamat = $db->real_escape_string($_POST['alamat']);

    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $kode_prov = $_POST['kode_prov'];
    $kode_kab = $_POST['kode_kab'];

    //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }

    // Validasi email
    $email = test_input($_POST['email']);
    if (empty($email)) {
        $error_email = "Email harus diisi";
    }

    //validasi jenis kelamin: tidak boleh kosong
    if (!isset($_POST['jenis_kelamin'])) {
        $error_gender = "Jenis kelamin harus diisi";
    }

    // Validasi alamat
    $alamat = test_input($_POST['alamat']);
    if (empty($alamat)) {
        $error_alamat = "Alamat harus diisi";
    }

    // Validasi Provinsi
    if (!isset($_POST['kode_prov'])) {
        $error_provinsi = "Provinsi harus diisi";
    }

    // Validasi Kabupaten
    if (!isset($_POST['kode_kab'])) {
        $error_kabupaten = "Kabupaten harus diisi";
    }

    $query =  "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES('$nama', '$email', '$jenis_kelamin', '$alamat', '$kode_prov', '$kode_kab')";

    $result = $db->query($query);

    if (!$result) {
        echo '<div class="alert alert-danger alert-dismissible">
        Could not query the database <br>' . $db->error . '<br>query -' . $query.
        '</div>';
    } else {
        echo '<div class="alert alert-success alert-dismissible">
        Data berhasil disimpan <br>
        </div>';
    }
}
?>

<style>
  .custom-element {
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
</style>


<section class="w-full h-full bg-no-repeat bg-cover bg-center bg-fixed" style="background-image: url('image/yae.jpg');">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto ">
    <!-- Harap di klik link href note.php atau buka file note.php  -->
      <a href="note.php" class="flex items-center mb-6 text-2xl font-semibold text-white">
          <img class="w-8 h-8 mr-2" src="image/sheva_logo.jpg" alt="logo">
          Sheva Code    
      </a>
      <div class="w-full custom-element shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Form Input Pendaftaran
              </h1>
        <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
        <form name="daftar" id="daftar" class="space-y-4 md:space-y-6" method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required="">
                <div id="error_name" style="color: red;">
                    <?php if (isset($error_nama))  echo $error_nama ?>
                </div>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <!-- TODO 4 : buatlah cek email menggunakan ajax -->
                <input type="email" name="email" id="email" oninput="getUser()" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" required="">
                <div id="error_email" style="color: red;">
                    <?php if (isset($error_email))  echo $error_email ?>
                </div>
            </div>
            <label>Jenis Kelamin</label>
            <div class="flex items-center mb-4">
                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="jenis_kelamin" value="Laki-laki">Laki-laki
                </label>
            </div>
            <div class="flex items-center mb-4">
                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="jenis_kelamin" value="Perempuan">Perempuan
                </label>
            </div>
            <div id="error_gender" style="color: red; margin-bottom: 12px;">
                <?php if (isset($error_gender))  echo $error_gender ?>
            </div>
            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="alamat" required=""></textarea>
                <div id="error_alamat" style="color: red;">
                    <?php if (isset($error_alamat))  echo $error_alamat ?>
                </div>
            </div>
            <div>
                <label for="kode_prov">Provinsi</label>
                <select onchange="getKabupaten(this.value)" name="kode_prov" id="kode_prov" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    <?php require_once('get_provinsi.php'); ?>
                </select>
                <div id="error_provinsi" style="color: red;">
                    <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                </div>
            </div>
            <div>
                <label for="kode_kab">Kabupaten</label>
                <select name="kode_kab" id="kode_kab" class="form-control">
                    <option value="">Pilih kabupaten</option>
                    <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
                </select>
                <div id="error_kabupaten" style="color: red;">
                    <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                </div>
            </div>
            <br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary container-fluid">Daftar</button>
        </form>
        </div>
      </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function getKabupaten(kodeProv) {
        $.ajax({
            type: 'POST',
            url: 'get_kabupaten.php',
            data: { kode_prov: kodeProv },
            success: function (response) {
                $('#kode_kab').html(response);
            }
        });
    }

</script>

<?php include('footer.html') ?>