
<?php
// Nama : Duma Mora Arta Sitorus
// Nim  : 2406012112004
// lab  : A1

include('index.html');

require_once ('../lib/db_login.php');
// Variable untuk menyimpan data input pengguna
$nama = $email = $jenis_kelamin = $alamat = $prov = $kab = "";
$_error_nama= $error_email = $error_jenis_kelamin = $error_alamat = $error_prov = $error_kab = "";
$valid = true;

/*TODO 2 : Buatlah
1. server side validation*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validasi nama : tidak boleh kosong, hanya dapat berisi huruf spasi
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
        $error_nama = '<span class="text-red-600">*Nama harus diisi</span>';
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = '<span class="text-red-600">*Nama hanya dapat berisi huruf dan spasi</span>';
        $valid = false;
    }
    //validasi email : tidak boleh kosong, format harus benar
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = '<span class="text-red-600">*Email harus diisi</span>';
        $valid=false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = '<span class="text-red-600">*Format email tidak benar</span>';
        $falid=false;
    } else {
        // Cek apakah email sudah ada di database
        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $result = $db->query($query);
    
        if ($result->num_rows > 0) {
            $error_email = '<span class="text-green-600">*Email Tersedia</span>';
            $valid = false;
        }
    }
    //Validasi jenis kelamin
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? ''; // Gunakan operator null coalescing untuk memberikan nilai default jika tidak ada input
    if (empty($jenis_kelamin)) {
        $error_jenis_kelamin = '<span class="text-red-600">*Jenis kelamin harus diisi</span>';
        $valid = false; // Tambahkan ini untuk menandakan bahwa ada kesalahan
    }
    //Validasi alamat : tidak boleh kosong
    $alamat = test_input($_POST['alamat']);
    if ($alamat == '') {
        $error_alamat = '<span class="text-red-600">*Alamat harus diisi</span>';
        $valid=false;
    }
    //Validasi provins : harus dipilih
    $prov = test_input($_POST['provinsi']);
    if ($prov == '-' || $prov == 'none') {
        $error_prov = '<span class="text-red-600">*Provinsi harus diisi</span>';
        $valid=false;
    }
    //Validasi Kabupatenn : harus dipilih
    $kab = test_input($_POST['kabupaten']);
    if ($kab == '-' || $kab == 'none') {
        $error_kab = '<span class="text-red-600">*Provinsi harus diisi</span>';
        $valid=false;
    }

/* 2. insert new user */
    if ($valid) {
        $insert_query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$jenis_kelamin', '$alamat', '$prov', '$kab')";
        $insert_result = $db->query($insert_query);

/*3. tampilkan hasilnya error/berhasil*/
        if (!$insert_result) {
            die("Could not insert book into the database: <br />" . $db->error);
        } else {
            header("Location: sukses.html");
            exit;
        }
    }
}
?>

<div class="mt-3 border border-y-gray-300 w-350 rounded">
    <div class="bg-gray-200 p-2">Form Input Pendaftaran</div>    
    <form name="formulir" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div class="m-3">
            <label for="nama">Nama</label><br>
            <input
            name="nama" 
            id="nama"
            class="border border-y-gray-300 rounded-md w-full p-2 m-0.50"
            value="<?php if(isset($nama)) {echo $nama;} ?>"
            />  
            <div><?php if(isset($error_nama)) echo $error_nama; ?></div>          
        </div>

        <div class="m-3">
            <label for="email">Email</label><br>
            <input
            name="email" 
            id="email"
            class="border border-gray-300 rounded-md w-full p-2 m-0.50"
            value="<?php if(isset($email)) {echo $email;} ?>"/>    
            <div ><?php if(isset($error_email)) echo $error_email; ?></div>        
        </div>

        <div class="m-3">
            <label for="jenis-kelamin">Jenis Kelamin</label><br>
            <div class="my-0.5">
                <label class="inline-flex items-center">
                    <input 
                    type="radio" 
                    class="form-radio text-indigo-600" 
                    name="jenis_kelamin" 
                    value="laki_laki"
                    <?php if((isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "laki_laki")) echo "checked"; ?>>
                    <span class="ml-2">Laki-laki</span>
                </label>
                <br />
                <label class="inline-flex items-center">
                    <input type="radio" 
                    class="form-radio text-indigo-600" 
                    name="jenis_kelamin" 
                    value="perempuan"
                    <?php if((isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "perempuan")) echo "checked"; ?>>
                    <span class="ml-2">Perempuan</span>
                </label>
                <div><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
            </div>            
        </div>

        <div class="m-3">
            <label for="alamat" class="block my-2">Alamat:</label>
            <textarea 
            id="alamat" 
            name="alamat" 
            rows="4" 
            class="border border-gray-300 rounded-md w-full p-2"><?php if(isset($alamat)) {echo $alamat;} ?>
            </textarea>
            <div> <?php if(isset($error_alamat)) echo $error_alamat; ?></div>
        </div>

        <div class="m-3">
            <label for="provinsi" class="block mb-1">Provinsi:</label>
            <select 
            name="provinsi" 
            id="provinsi" 
            class="block w-full py-2 border border-gray-300 rounded" 
            onchange="getKabupaten(this.value)">
                <option value="-">Pilih Provinsi</option>
                <?php
                require_once ('get_provinsi.php');
                ?>
            </select>
            <div><?php if(isset($error_prov)) echo $error_prov; ?></div>
        </div>

        <div class="m-3">
            <label for="kabupaten" class="block mb-1">Kabupaten:</label>
            <select 
            name="kabupaten" 
            id="kabupaten" 
            class="block w-full py-2 border border-gray-300 rounded">
            <option value="-">Pilih Kabupaten</option>
            </select>
            <div><?php if(isset($error_kab)) echo $error_kab; ?></div>
        </div>
        <br />

        <div class="m-3">
            <button 
            type="submit" 
            name="submit"
            class="w-full p-3 py-2 bg-blue-700 text-white font-bold rounded-md hover:bg-blue-400"
            >Daftar</button>
        </div>
    </form>
    </div>
</div>
<script src="ajax.js"></script>

