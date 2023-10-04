<!-- 
    Nama   : Mitslina
    NIM    : 24060121130068
    Deskripsi : Form dengan menggunakan POST (mengganti GET pada user_form_get.php dengan POST)
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
    Lalu, ubahlah kode PHP yang digunakan untuk membaca isi form dari $_GET menjadi $_POST
    Simpan file tersebut dengan nama baru, yaitu user_form_post.php
    -->
    <form method="POST" autocomplete="on" action="">
        <div class="form-container">
            <div class="header">USER FORM POST</div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <br>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
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
            </div>
            <br>
            <label>Jenis Kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria </label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita</label>
            </div>
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
            <br>
            <!-- submit, reset dan button -->
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit </button>
            <button type="reset" class="btn btn-danger" onclick="document.location.href='user_form_post.php'">Reset</button>
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


