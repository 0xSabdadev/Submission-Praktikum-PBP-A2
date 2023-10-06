<?php
// Nama : Tiara Fitra Ramadhani Siregar
// Nim  : 24060121120008
// lab  : PBP A2

include('header.html');

require_once '../lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $is_valid = TRUE;

    //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
    $nama = test_input($_POST['nama']);
    if(empty($nama)){
        $error_nama = "<span style='color: red;'>*Nama tidak boleh kosong</span>";
        $is_valid = FALSE;
    }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
        $error_nama = "<span style='color: red;'>*Nama hanya dapat berisi huruf dan spasi</span>";
    }

    //validasi email: tidak boleh kosong, format harus benar
    $email = test_input($_POST['email']);
    if($email == ''){
        $error_email = "<span style='color: red;'>*Email tidak boleh kosong";
        $is_valid = FALSE;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "<span style='color: red;'>*Format email tidak benar</span>";
        $is_valid = FALSE;
    }else{
        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
          $error_email = "<span style='color: red;'>*Email sudah terdaftar!</span>";
          $is_valid = FALSE;
        }else{
          $error_email = "<span style='color: green;'>*Email tersedia!</span>";
        }
    }
    

    //validasi alamat: tidak boleh kosong
    $alamat = test_input($_POST['alamat']);
    if($alamat == ''){
        $error_alamat = "<span style='color: red;'>*Alamat tidak boleh kosong</span>";
        $is_valid = FALSE;
    }

    //validasi kelamin: tidak boleh kosong
    if(empty( $_POST['jenis_kelamin'])){
        if(empty( $_POST['jenis_kelamin'])){ 
            $error_jenis_kelamin = "<span style='color: red;'>*Jenis kelamin harus dipilih</span>";
        }
    }

    //validasi provinsi: tidak boleh kosong
    $provinsi = $_POST['provinsi'];
    if($provinsi == ''){
        $error_provinsi = "<span style='color: red;'>*Provinsi harus dipilih</span>";
        $is_valid = FALSE;
    }

    //validasi kabupaten: tidak boleh kosong
    $kabupaten = $_POST['kabupaten'];
    if($kabupaten == ''){
        $error_kabupaten = "<span style='color: red;'>*Kabupaten harus dipilih</span>";
        $is_valid = FALSE;
    }

    if ($is_valid) {
        $nama = $db->real_escape_string($nama);
        $email = $db->real_escape_string($email);
        $jenis_kelamin = $db->real_escape_string($_POST['jenis_kelamin']);
        $alamat = $db->real_escape_string($alamat);
        $provinsi = $db->real_escape_string($provinsi);
        $kabupaten = $db->real_escape_string($kabupaten);

        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $db->prepare($query);
        $statement->bind_param("ssssss", $nama, $email, $jenis_kelamin, $alamat, $provinsi, $kabupaten);

        if ($statement->execute()) {
            header('Location: yeay_message.php');
        } else {
            echo '<span style="color: red;">Pendaftaran Gagal</span>';
        }
    }
}
?>

<div class="mt-10 m-40 w-auto h-auto border-gray-200 border-2 rounded">
    <div class="px-4 py-2 border-grey-500 border-b bg-gray-200 rounded">
        <h2 class="text-sm font-medium leading-6 text-gray-900">Form Input Pendaftaran</h2>
    </div>
    <form name="forms" class ="p-4" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mt-2">
            <div class="grid grid-cols-1 gap-x-3 gap-y-5 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" autocomplete="given-name" value="<?php if (isset($nama)) echo $nama ?>" class="p-2 w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div>
                        <p><?php if (isset($error_nama)) echo $error_nama ?></p>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="email" class="text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" onkeyup="getUser()" class="p-2 w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php if (isset($email)) echo $email ?>">
                    </div>

                    <div id="error_email">
                        <p><?php if (isset($error_email)) echo $error_email ?></p>
                    </div>
                </div>

                <div class="sm:col-span-6">
                  <label class="text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                  <div class="mt-1">
                      <div class="flex items-center">
                          <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" class="h-3 w-3 text-indigo-600 focus:ring-indigo-600" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="laki-laki") echo "checked";?>>
                          <label for="laki-laki" class="ml-2 block text-sm font-medium text-gray-900" >Laki-laki</label>
                      </div>
                      <div class="mt-1 flex items-center">
                          <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" class="h-3 w-3 text-indigo-600 focus:ring-indigo-600" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="perempuan") echo "checked";?>>
                          <label for="perempuan" class="ml-2 block text-sm font-medium text-gray-900" >Perempuan</label>
                      </div>
                  </div>
                  <div>
                        <p><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin ?></p>
                  </div>
                </div>              

                <div class="sm:col-span-6">
                    <label for="alamat" class="text-sm font-medium leading-6 text-gray-900">Alamat</label>
                    <div class="mt-1">
                        <textarea id="alamat" name="alamat" rows="3" class="p-2 w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php if (isset($alamat)) echo $alamat ?></textarea>
                    </div>
                    <div >
                        <p><?php if (isset($error_alamat)) echo $error_alamat ?></p>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="provinsi" class="text-sm font-medium leading-6 text-gray-900">Provinsi</label>
                    <div class="mt-1">
                        <select  id="provinsi" name="provinsi" autocomplete="address-level1" class="w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" onchange="getKabupaten(this.value)">
                            <option value="">Pilih Provinsi</option>
                            <?php require_once('get_provinsi.php'); ?>
                        </select>
                        <div>
                            <p><?php if (isset($error_provinsi)) echo $error_provinsi ?></p>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="kabupaten" class="text-sm font-medium leading-6 text-gray-900">Kabupaten</label>
                    <div class="mt-1">
                        <select id="kabupaten" name="kabupaten" autocomplete="address-level2" class="w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        <div >
                            <p><?php if (isset($error_kabupaten)) echo $error_kabupaten ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" id="submit" class="p-2 h-auto w-full rounded-md bg-indigo-600 text-sm  text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
            </div>
        </div>
    </form>
</div>
<script src="ajax.js"></script>

<?php include('footer.html') ?>