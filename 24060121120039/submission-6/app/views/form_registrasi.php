<?php

require_once('../model/db_login.php');


if(isset($_POST['submit'])){
    $valid = TRUE; 

    //Validasi nama : tidak boleh kosong, hanya berisi huruf dan spasi
    $nama = test_input($_POST['nama']);
    if(empty($nama)){
        $error_nama = "Nama harus diisi";
        $valid = FALSE;
    }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        $valid = FALSE;
    }
    //Validasi email : tidak boleh kosong, format harus benar
    $email = test_input($_POST['email']);
    if($email==''){
        $error_email = "Email harus diisi";
        $valid = FALSE;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Format email tidak benar";
        $valid = FALSE;
    }
    //Validasi alamat : tidak boleh kosong
    $alamat = test_input($_POST['alamat']);
    if($alamat==''){
        $error_alamat = "alamat harus diisi";
        $valid = FALSE;
    }
    //validasi jenis kelamin : tidak boleh kosong
    $jenis_kelamin = $_POST['jenisKelamin'];
    if($jenis_kelamin==''){
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
        $valid = FALSE;
    }
    //validasi Kota : tidak boleh kosong
    $provinsi = $_POST['provinsi'];
    if($provinsi==''){
        $error_provinsi = "provinsi harus diisi";
        $valid = FALSE;
    }
    //validasi Kota : tidak boleh kosong
    $kabupaten = $_POST['kabupaten'];
    if($kabupaten==''){
        $error_kabupaten = "kabupaten harus diisi";
        $valid = FALSE;
    }

    if($valid){
        $query = "INSERT INTO tb_user(nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('".$nama."','".$email."','".$jenis_kelamin."','".$alamat."','".$provinsi."','".$kabupaten."')";

        $result = $db->query($query);
        if(!$result) {
            die("Could not query the database: <br />".$db->error);
        } else {
            echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Data Telah Berhasil di Inputkan!</span>
            </div>';
            $db->close();
        }
    }
}    
?>

<?php include('../../templates/header.php'); ?>
<section class="bg-gray-50 dark:bg-gray-900">
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto ">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        Form Input Pendaftaran    
    </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <form class="space-y-4 md:space-y-6" action="" method="POST" autocomplete="on" name="daftar">
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php if(isset($nama)) {echo $nama;} ?>">
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" <?php echo (isset($error_nama))? "flex":"hidden" ?>>
                        <span class="font-medium"><?php if(isset($error_nama)) echo $error_nama; ?></span> 
                    </div> 
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php if(isset($email)) echo $email; ?>" oninput="getUser()">
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" <?php echo (isset($error_email))? "flex":"hidden" ?>>
                        <span class="font-medium"><?php if(isset($error_email)) echo $error_email; ?></span> 
                    </div> 
                    <div id="error_email"></div>
                </div>
                <div>
                    <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin:</label>
                    <div class="flex items-center">
                        <input id="pria" type="radio" value="pria" name="jenisKelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "pria") {echo "checked";} ?>>
                        <label for="pria" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                    </div>
                    <div class="flex items-center">
                        <input id="wanita" type="radio" value="wanita" name="jenisKelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "wanita") {echo "checked";} ?>>
                        <label for="wanita" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"  >Wanita</label>
                    </div>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" <?php echo (isset($error_jenis_kelamin))? "flex":"hidden" ?>>
                        <span class="font-medium"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></span> 
                    </div>
                </div>
                <div>                           
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat :</label>
                    <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php if(isset($alamat)) echo $alamat; ?></textarea>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" <?php echo (isset($error_alamat))? "flex":"hidden" ?>>
                        <span class="font-medium"><?php if(isset($error_alamat)) echo $error_alamat; ?></span> 
                    </div>
                </div>
                <div>
                    <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi:</label>
                    <select name="provinsi" id="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="getKabupaten(this.value)">
                        <option selected disabled>---Pilih Provinsi----</option>
                        <?php require_once('../model/get_provinsi.php'); ?>
                    </select>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" <?php echo (isset($error_provinsi))? "flex":"hidden" ?>>
                        <span class="font-medium"><?php if(isset($error_provinsi)) echo $error_provinsi; ?></span> 
                    </div>
                </div>
                <div>
                    <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten:</label>
                    <select name="kabupaten" id="kabupaten" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>---Pilih Kabupaten----</option>
                    </select>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" <?php echo (isset($error_kabupaten))? "flex":"hidden" ?>>
                        <span class="font-medium"><?php if(isset($error_kabupaten)) echo $error_kabupaten; ?></span> 
                    </div>
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" name="submit" value="submit" >Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
    <?php
    if(isset($_POST['submit'])){
        echo "<h3>Your Input:</h3>";
        echo 'Nama =' .$_POST['nama']. '<br />';
        echo 'Email =' .$_POST['email']. '<br />';
        echo 'Provinsi =' .$_POST['provinsi']. '<br />';
        echo 'Kabupaten =' .$_POST['kabupaten']. '<br />';
        echo 'Jenis Kelamin =' .$_POST['jenisKelamin']. '<br />';
    }
    ?>

<?php include('../../templates/footer.php') ?>