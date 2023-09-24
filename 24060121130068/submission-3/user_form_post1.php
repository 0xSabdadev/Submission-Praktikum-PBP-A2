<!-- 
    Nama   : Mitslina
    NIM    : 24060121130068
    Deskripsi : Form dengan menggunakan POST menambahkan validasi form
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM MAHASISWA</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- 
    8. Form pada file user_form_get.php maupun user_form_post.php belum ditambahkan penanganan 
    validasi. Sebelumnya, tambahkan field alamat menggunakan elemen <textarea> setelah field email 
    pada file user_form_post.php, sehingga tampilannya menjadi seperti berikut:
    Tambahkan kode PHP berikut untuk menambahkan aturan validasi dan letakkan di bagian atas, 
    sebelum kode untuk membuat form. (echo error di no.9)
    -->    
 <?php
        if (isset($_POST['submit'])){
            //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi 
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            }else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
            //validasi email: tidak boleh kosong, format harus benar 
            $email = test_input($_POST['email']);
            if ($email == ''){
                $error_email = "Email harus diisi";
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                $error_email = "Format email tidak benar";
            }
            //validasi alamat: tidak boleh kosong 
            $alamat = test_input($_POST['alamat']);
            if ($alamat == ''){
                $error_alamat = "Alamat harus diisi";
            }
            //validasi jenis kelamin: tidak boleh kosong 
            $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
            if (empty($jenis_kelamin)){
                $error_jenis_kelamin = "Jenis Kelamin harus diisi";
            }
            //validasi kota: tidak boleh kosong 
            $kota = isset($_POST['kota'])? $_POST['kota']: "";
            if (empty($kota)) { 
                $error_kota = "Kota harus diisi";
            }
            //validasi minat: tidak boleh kosong 
            $minat = isset($_POST['minat']) ? $_POST['minat'] : [];
            if (empty($minat)){
                $error_minat = "Peminatan harus dipilih";
            }
        }

        function test_input($data) { 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            return $data;
        }
    ?>
   
    <!-- 
    1. Buatlah form input data mahasiswa seperti berikut menggunakan kode HTML dengan ketentuan 
    berikut:
    - Gunakan submission method GET.
    - Pemrosesan form dilakukan pada halaman yang sama, sehingga atribut action pada elemen 
    <form> dikosongkan.
    - Berikan nama pada setiap elemen input yang digunakan pada atribut name.
    - Elemen input yang masukannya berupa single value diberi nama berupa teks biasa, 
    sedangkan yang masukannya dapat berupa multiple values diberi nama sebagai array.
    -->
    <!-- 
    7. Ubah file user_form_get.php, ganti nilai atribut method pada elemen <form> dengan POST
    (form method="POST" autocomplete="on" action="")
    -->

    <!--  
    9. Tambahkan kode berikut pada setiap elemen input form untuk menampilkan pesan error. 
    Berikut adalah contoh pada field nama dan email, tambahkan pula untuk field lainnya dengan 
    cara yang sama. (div class="error")
    10. Simpan file tersebut dengan nama baru user_form_post1.php.
    11. Jalankan file tersebut di web browser, kosongkan sebagian field, lalu submit, perhatikan apakah 
    pesan error sudah ditampilkan dengan benar? Perhatikan apakah field yang sudah terisi 
    sebelumnya dapat ditampilkan kembali? Mengapa?
    12. Apakah peran fungsi test_input($data) pada proses validasi tersebut? Mengapa fungsi tersebut 
    hanya dikenakan pada isian nama, email dan alamat, namun tidak dikenakan pada isian jenis 
    kelamin, kota dan peminatan?
    13. Bagaimanakah aturan validasi yang digunakan untuk mengecek agar isian tidak boleh kosong?                
    -->
    <form method="POST" autocomplete="on" action="">
        <div class="form-container">
            <div class="header">USER FORM POST 1</div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                <div class="error"><?php if (isset($error_nama)) echo $error_nama; ?></div> 
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="error"><?php if (isset($error_email)) echo $error_email; ?></div>
            </div>
            <br>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                <div class="error"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
            </div>
            <br>
            <div class="form-group">
                <label for="kota">Kota/Kabupaten:</label>
                <select id="kota" name="kota" class="form-control">
                    <option value="" selected disabled>--pilih kota--</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
                <div class="error"><?php if (isset($error_kota)) echo $error_kota; ?></div>
            </div>
            <br>
            <label>Jenis Kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita</label>
            </div>
            <div class="error"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
            <br>
            <label>Peminatan: </label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science</label>
            </div>
            <div class="error"><?php if (isset($error_minat)) echo $error_minat; ?></div>
            <br>
            <!-- submit, reset dan button -->
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit </button>
            <button type="reset" class="btn btn-danger" onclick="document.location.href='user_form_post1.php'">Reset</button>
        </div>
    </form>

    <!-- 
    2. Lalu, ubahlah kode PHP yang digunakan untuk membaca isi form dari $_GET menjadi $_POST, 
    seperti berikut:
    3. Simpan file tersebut dengan nama baru, yaitu user_form_post.php.
    4. Jalankan file tersebut di web browser, perhatikan alamat url setelah form diisi dan di-submit.
    5. Apa perbedaan antara method GET pada file user_form_get.php dan method POST pada file 
    user_form_post.php?
    6. Manakah yang lebih baik, method GET atau POST? Uraikan jawaban Anda.
    -->
    
    <?php
    if (isset($_POST["submit"])) {
        echo '<div class="your-input-container">';
        echo '<div class="your-input">';
        echo '<h3>Your Input:</h3>';
        echo '<p>Nama = '.$_POST['nama'].'</p>';
        echo '<p>Email = '.$_POST['email'].'</p>';
        echo '<p>Kota = '.(isset($_POST['kota']) ? $_POST['kota'] : '').'</p>';
        echo '<p>Jenis Kelamin = '.(isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '').'</p>'; 
        $minat = isset($_POST['minat']) ? $_POST['minat'] : []; 
        if (!empty($minat)) {
            echo '<p>Peminatan yang dipilih: </p>'; 
            foreach ($minat as $minat_item) {
                echo '<p>'.$minat_item.'</p>';
            }
        } else {
            echo '<p> Minat = </p>';
        }
        echo '</div>';
        echo '</div>';
    }
    ?>

</body>
</html>


