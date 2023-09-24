<!-- 
    Nama   : Mitslina
    NIM    : 24060121130068
    Deskripsi : Tugas membuat Form
    <link rel="stylesheet" type="text/css" href="style.css">
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS FORM INPUT SISWA</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!--
    Aturan validasi:
    - Semua field harus diisi. 
    - NIS terdiri atas 10 karakter dan hanya boleh berisi angka 0..9. 
    - Jika siswa kelas X atau XI, maka program menampilkan pilihan ekstrakurikuler. 
    - Siswa wajib memilih kegiatan ekstrakurikuler yang diminati, minimal 1 maksimal 3. 
    - Jika kelas XII siswa tidak boleh mengikuti kegiatan ekstrakurikuler, 
    sehingga program tidak perlu menampilkan kegiatan ekstrakurikuler.
    -->
    <?php
        if (isset($_POST['submit'])){
            //validasi NIS: tidak boleh kosong, hanya dapat berisi angka 
            //terdiri atas 10 karakter dan hanya boleh berisi angka 0..9. 
            $nis = test_input($_POST['nis']);
            if (empty($nis)) {
                $error_nis = "NIS harus diisi";
            }else if (!preg_match("/^[0-9]{10}$/", $nis)){
                $error_nis = "NIS hanya hanya boleh berisi angka 0..9. berjumlah 10 karakter";
            }
            //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi 
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            }else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
            //validasi jenis kelamin: tidak boleh kosong 
            $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
            if (empty($jenis_kelamin)){
                $error_jenis_kelamin = "Jenis Kelamin harus diisi";
            }
            //validasi kelas: tidak boleh kosong 
            $kelas = isset($_POST['kelas'])? $_POST['kelas']: "";
            if (empty($kelas)) { 
                $error_kelas = "Kelas harus diisi";
            }
            //validasi ekstrakurikuler: X, XI harus pilih 1-3 ekskul. XII tidak boleh pilih ekskul
            $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];
            if ($kelas == 'X' || $kelas == 'XI'){
                if (empty($ekstrakurikuler) || count($ekstrakurikuler) > 3){
                    $error_ekstrakurikuler = "Ekstrakurikuler harus dipilih minimal 1 maksimal 3";
                }
            }elseif (!empty($ekstrakurikuler) && $kelas == 'XII'){
                $error_ekstrakurikuler = "Ekstrakurikuler tidak boleh dipilih kelas XII";
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

    <!-- format form -->
    <form method="POST" autocomplete="on" action="">
        <div class="form-container">
            <div class="header">Form Input Siswa</div>
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value = 
                "<?php if (isset($nis)) echo $nis; ?>">
                <div class="error"><?php if (isset($error_nis)) echo $error_nis; ?></div> 
            </div>
            <br>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value = 
                "<?php if (isset($nama)) echo $nama; ?>">
                <div class="error"><?php if (isset($error_nama)) echo $error_nama; ?></div> 
            </div>
            <br>
            <label>Jenis Kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" 
                    <?php if (isset($jenis_kelamin) && $jenis_kelamin=="pria") echo "checked"; ?>>Pria </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"
                    <?php if (isset($jenis_kelamin) && $jenis_kelamin=="wanita") echo "checked"; ?>>Wanita</label>
            </div>
            <div class="error"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
            <br>
            <div class="form-group">
            <label for="kelas">Kelas:</label>
                <select id="kelas" name="kelas" class="form-control">
                    <option value="" selected disabled>--pilih kelas--</option>
                    <option value="X" <?php if (isset($kelas) && $kelas=="X") 
                    echo 'selected="true"'; ?>>X</option>
                    <option value="XI" <?php if (isset($kelas) && $kelas=="XI") 
                    echo 'selected="true"'; ?>>XI</option>
                    <option value="XII" <?php if (isset($kelas) && $kelas=="XII") 
                    echo 'selected="true"'; ?>>XII</option>
                </select>
                <div class="error"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
            </div>
            <br>
            <!--
            - Jika siswa kelas X atau XI, maka program menampilkan pilihan ekstrakurikuler. 
            - Siswa wajib memilih kegiatan ekstrakurikuler yang diminati, minimal 1 maksimal 3. 
            - Jika kelas XII siswa tidak boleh mengikuti kegiatan ekstrakurikuler, 
            sehingga program tidak perlu menampilkan kegiatan ekstrakurikuler.
            -->
            <label>Ekstrakurikuler: </label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka"
                    <?php if (isset($ekstrakurikuler) && in_array ('pramuka', $ekstrakurikuler)) echo 'checked'?>>Pramuka</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seni_tari"
                    <?php if (isset($ekstrakurikuler) && in_array ( 'seni_tari', $ekstrakurikuler)) echo 'checked'; ?>>Seni Tari</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi"
                    <?php if (isset($ekstrakurikuler) && in_array ( 'sinematografi', $ekstrakurikuler)) echo 'checked'; ?>>Sinematografi</label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="basket"
                    <?php if (isset($ekstrakurikuler) && in_array ( 'basket', $ekstrakurikuler)) echo 'checked'; ?>>Basket</label>
            </div>
            <div class="error">
                <?php 
                    // echo error_ekstrakurikuler yg sudah tersimpan (kls XII ceklist ekskul)
                    if (isset($error_ekstrakurikuler)) {
                        echo $error_ekstrakurikuler; 
                    }
                    // reset value ekskul jika kelas XII
                    if ((isset($_POST['kelas']) && $_POST['kelas']=='XII') || empty($_POST['kelas'])) {
                        $_POST['ekstrakurikuler'] = [];
                    } 
                ?>
            </div>
            <br>
            <!-- submit, reset dan button -->
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit </button>
            <button type="reset" class="btn btn-danger" onclick="document.location.href='form_input_siswa.php'">Reset</button>
        </div>
    </form>

    <?php
    if (isset($_POST["submit"])) {
        if (!isset($error_nis) && !isset($error_nama) && !isset($error_jenis_kelamin) && !isset($error_kelas) && !isset($error_ekstrakurikuler)){
            echo '<div class="submit-success">Success Submit!</div>';
        } else {
            echo '<div class="submit-invalid">Invalid Submit!</div>';
        }
        echo '<div class="your-input-container">';
        echo '<div class="your-input">';
        echo '<h3>Your Input:</h3>';
        echo '<p>NIS = '.$_POST['nis'].'</p>';
        echo '<p>Nama = '.$_POST['nama'].'</p>';
        echo '<p>Kelas = '.(isset($_POST['kelas']) ? $_POST['kelas'] : '').'</p>'; 
        echo '<p>Jenis Kelamin = '.(isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '').'</p>'; 
        $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : []; 
        if (!empty($ekstrakurikuler)) {
            echo '<p>Ekstrakurikuler yang dipilih: </p>'; 
            foreach ($ekstrakurikuler as $ekstrakurikuler_item) {
                echo '<p>'.$ekstrakurikuler_item.'</p>';
            }
        } else {
            echo '<p>Ekstrakurikuler = </p>';
        }
        echo '</div>';
        echo '</div>';
    }
    ?>

</body>
</html>


