<!-- 
    Nama   : Mitslina
    NIM    : 24060121130068
    Deskripsi : Form dengan menggunakan GET
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
    <form method="GET" action="">
        <div class="form-container">
            <div class="header">USER FORM GET</div>
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
            </div>
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
            <button type="reset" class="btn btn-danger" onclick="document.location.href='user_form_get.php'">Reset</button>
        </div>
    </form>

    <!-- 
    2. Tambahkan kode PHP seperti berikut setelah kode untuk membuat form yang bertujuan untuk 
    membaca dan menampilkan isian yang dimasukkan ke form tersebut. Karena menggunanakan 
    method GET, maka isi form diakses melalui array $_GET.
    3. Buatlah sebuah folder bernama form di folder htdocs, lalu simpan file tersebut di folder form 
    dengan nama user_form_get.php.
    4. Jalankan file tersebut di web browser, perhatikan alamat url setelah form diisi dan di-submit.
    5. Perhatikan pada field hobby, mengapa penamaan dan pengaksesannya berbeda dengan field 
    lainnya?
    -->
    <?php
    if (isset($_GET["submit"])) {
        echo '<div class="your-input-container">';
        echo '<div class="your-input">';
        echo '<h3>Your Input:</h3>';
        echo '<p>Nama = '.$_GET['nama'].'</p>';
        echo '<p>Email = '.$_GET['email'].'</p>';
        echo '<p>Kota = '.(isset($_GET['kota']) ? $_GET['kota'] : '').'</p>';
        echo '<p>Jenis Kelamin = '.(isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : '').'</p>'; 
        $minat = isset($_GET['minat']) ? $_GET['minat'] : []; 
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


