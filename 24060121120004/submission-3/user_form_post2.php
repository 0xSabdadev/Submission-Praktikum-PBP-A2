<!-- 
    Nama       : Duma Mora Arta Sitorus
    NIM        : 24060121120004
    Lab        : A2
    Nama-File  : user_form_post2.php
    Keterangan : Validasi form dan  menampilkan kembali isi form dengan PHP
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa 4</title>
    <link rel="stylesheet" href="style/mystyle.css">
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            //validasi nama : tidak boleh kosong, hanya dapat berisi huruf spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "<span class='pesan-eror'>*Nama harus diisi</span>";
            }elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "<span class='pesan-eror'>*Nama hanya dapat berisi huruf dan spasi</span>";
            }
            //validasi email : tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if ($email == '') {
                $error_email = "<span class='pesan-eror'>*Email harus diisi</span>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "<span class='pesan-eror'>*Format email tidak benar</span>";
            }
            //Validasi alamat : tidak boleh kosong
            $alamat = test_input($_POST['alamat']);
            if ($alamat == '') {
                $error_alamat = "<span class='pesan-eror'>*Alamat harus diisi</span>";
            }
            //Validasi kota : tidak boleh kosong
            $kota = test_input($_POST['kota']);
            if ($kota == '-' || $kota == 'kota') {
                $error_kota = "<span class='pesan-eror'>*Kota harus diisi</span>";
            }
            //Validasi jenis kelamin
            if(empty($_POST['jenis_kelamin'])){
                if (empty($_POST['jenis_kelamin'])){
                $error_jenis_kelamin = "<span class='pesan-eror1'>*Jenis kelamin harus diisi</span>";
                }
            }
            //Validasi minat : tidak boleh kosong
            if(empty($_POST['minat'])){
                if (empty($minat)){
                    $error_minat = "<span class='pesan-eror1'>*Peminatan harus dipilih</span>";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <div class="container">
        <div class="form-title">Form Mahasiswa</div>
        <form method="post" autocomplete="on" action="">
            <div class = "form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50"
                value="<?php if(isset($nama)) {echo $nama;} ?>">
                <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="" class="form-control" id="email" name="email"
                value="<?php if(isset($email)) {echo $email;} ?>">
                <div class="error"><?php if(isset($error_email)) echo $error_email; ?></div>
            </div>
            <div class="form-group">
                <label for="kota">Kota/Kabupaten:</label>
                <select name="kota" id="kota" class="form-control1">
                    <option value="-" selected disable>-- Pilih Kota Kabupaten --</option>
                    <option value="Semarang" <?php if(isset($kota) && $kota=="Semarang") echo 'selected=true'; ?>>Semarang</option>
                    <option value="Jakarta" <?php if(isset($kota) && $kota=="Jakarta") echo 'selected=true'; ?>>Jakarta</option>
                    <option value="Bandung" <?php if(isset($kota) && $kota=="Bandung") echo 'selected=true'; ?>>Bandung</option>
                    <option value="Surabaya" <?php if(isset($kota) && $kota=="Surabaya") echo 'selected=true'; ?>>Surabaya</option>
                </select>
                <div class="error"><?php if(isset($error_kota)) echo $error_kota; ?></div>
            </div>

            <div class = "form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat"><?php if(isset($alamat)) {echo $alamat;}?></textarea>
                <div class="error"> <?php if(isset($error_alamat)) echo $error_alamat; ?></div>
            </div>
            
            <label class="check">Jenis kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if((isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "pria")) echo "checked"; ?>>
                    Pria
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "wanita") echo "checked"; ?>>
                    Wanita
                </label>
                <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>

            </div>
            <br>
            <label class="check">Peminatan:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="coding"
                    <?php if(isset($_POST['minat']) && in_array('coding', $_POST['minat'])) echo 'checked'; ?>>Coding
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design"
                    <?php if(isset($_POST['minat']) && in_array('ux_design', $_POST['minat'])) echo 'checked'; ?>>UX Design
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="data_science"
                    <?php if(isset($_POST['minat']) && in_array('data_science', $_POST['minat'])) echo 'checked'; ?>>Data Science
                </label>
            </div>
            <div class="error"><?php if(isset($error_minat)) echo $error_minat; ?></div>
            <br />
            
            <!-- submit, reset dan button -->
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>  
    </div>
    
    <div class="inputan">
        <?php
            if (isset($_POST["submit"])) {
                echo "<h2 style='margin-top:0px;'>Your Input:</h2>";
                echo 'Nama = '.$_POST['nama'].'</br>';
                echo 'Email = '.$_POST['email'].'</br>';
                echo 'Kota = '.$_POST['kota'].'</br>';
                echo 'Alamat = '.$_POST['alamat'].'</br>';

                if (isset($_POST['jenis_kelamin'])) {
                    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
                }else{
                    echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
                }
                
                if (!empty($_POST['minat'])) {
                    echo 'Peminatan yang dipilih: ';
                    foreach ($_POST['minat'] as $minat_item) {
                        echo '<br />- '.$minat_item;
                    }
                }else{
                    echo '<span class="teks-merah">Anda belum memilih Peminatan !</br></span>';
                }
            }
        ?>
    </div>
</body>
</html>