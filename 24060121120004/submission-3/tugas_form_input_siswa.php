<!-- 
    Nama       : Duma Mora Arta Sitorus
    NIM        : 24060121120004
    Lab        : A2
    Nama-File  : tugas_form_input_siswa.php
    Keterangan : Form pendataan nis, nama, jenis kelamin, kelas, dan ekstrakulikuler siswa
 -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link rel="stylesheet" href="style/mystyle.css">
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            //validasi NIS : tidak boleh kosong, format harus benar
            $nis = test_input($_POST['nis']);
            if (empty($nis)) {
                $error_nis = "<span class='pesan-eror'>*Nis tidak boleh kosong</span>";
            }else{
                if (!preg_match("/^[0-9]*$/", $nis) || strlen($nis) != 10) {
                    $error_nis = "<span class='pesan-eror'>*Nis hanya boleh berisi angka 10 digit</span>"; 
                }
            }
            //validasi nama : tidak boleh kosong, hanya dapat berisi huruf spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "<span class='pesan-eror'>*Nama harus diisi</span>";
            }elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "<span class='pesan-eror'>*Nama hanya dapat berisi huruf dan spasi</span>";
            }
            //Validasi jenis kelamin : harus dipilih
            if(!isset($_POST['jenis_kelamin'])){
                    $error_jenis_kelamin = "<span class='pesan-eror1'>*Jenis kelamin harus diisi</span>";
            }
            //Validasi Kelas : tidak boleh kosong
            $kelas = test_input($_POST['kelas']);
            if ($kelas == '-' || $kelas == 'kelas') {
                $error_kelas = "<span class='pesan-eror'>*kelas harus diisi</span>";
            }
            //Validasi ekstrakulikuler : siswa kelas 10 & 11 memilih ekstrakulikuler max 3 dan min, kelas 12 tidak boleh memilih
            if($_POST['kelas'] == "x" || $_POST['kelas'] == "xi"){
                if((empty($_POST['ekstra'] )) || (count($_POST['ekstra']) > 3)){
                    $error_ekstra = "<span class='pesan-eror1'>Ekstrakurikuler yang dipilih minimal 1 dan maksimal 3</span>";
                }
            }elseif($_POST['kelas'] == "xii"){
                if((!empty($_POST['ekstra']))){
                    $error_ekstra = "<span class='pesan-eror1'>Ekstrakulikuler tidak dapat dipilih oleh siswa kelas 12</span>";
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
        <div class="form-title">Form Input Siswa</div>
        <form method="post" autocomplete="on" action="">
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="number" class="form-control" id="nis" name="nis"
                value="<?php if(isset($nis)) {echo $nis;} ?>">
                <div class="error"><?php if(isset($error_nis)) echo $error_nis; ?></div>
            </div>

            <div class = "form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50"
                value="<?php if(isset($nama)) {echo $nama;} ?>">
                <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
            </div>

            <label class="check">Jenis kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" 
                    <?php if((isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "pria")) echo "checked";?>>
                    Pria
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" 
                    <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "wanita") echo "checked"; ?>>
                    Wanita
                </label>
                <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
            </div>
            <br />
            
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select name="kelas" id="kelas" class="form-control1" >
                    <option value="-" selected disable>-- Pilih Kelas --</option>
                    <option value="x" <?php if(isset($kelas) && $kelas=="x") echo 'selected=true'; ?>>X</option>
                    <option value="xi" <?php if(isset($kelas) && $kelas=="xi") echo 'selected=true'; ?>>XI</option>
                    <option value="xii" <?php if(isset($kelas) && $kelas=="xii") echo 'selected=true'; ?>>XII</option>
                </select>
                <div class="error"><?php if(isset($error_kelas)) echo $error_kelas; ?></div>
            </div>

            <label class="check">Ekstrakurikuler:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="pramuka"
                    <?php  if(isset($_POST['ekstra']) && in_array('pramuka', $_POST['ekstra'])) echo 'checked';?>>Pramuka
                </label>
            </div>
            <div class="form-check" >
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name= "ekstra[]" value="seni_tari"
                    <?php  if(isset($_POST['ekstra']) && in_array('seni_tari', $_POST['ekstra'])) echo 'checked';?>>Seni Tari
                </label>
            </div>
            <div class="form-check">
                <label class=" form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="sinematografi"
                    <?php if(isset($_POST['ekstra']) && in_array('sinematografi', $_POST['ekstra'])) echo 'checked';?>>Sinematografi
                </label>
            </div>
            <div class="form-check">
                <label class=" form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="basket"
                    <?php if(isset($_POST['ekstra']) && in_array('basket', $_POST['ekstra'])) echo 'checked';?>>Basket
                </label>
                <div class="error"><?php if(isset($error_ekstra)) echo $error_ekstra;?></div>
            </div>
            <br />
            
            <!-- submit, reset dan button -->
            <button type="submit" class="btn-primary" name="submit">Submit</button>
            <button type="reset" class="btn-danger">Reset</button>
        </form>  
    </div>
    
    <div class="inputan"> ***
        <?php
            if (isset($_POST['submit'])&& isset($_POST['nis'])&& isset($_POST['nama'])&& isset($_POST['jenis_kelamin'])&& isset($_POST['kelas'])){
            //jika tidak ada kesalahan data maka proses submit berhasil dilakukan
                if ($_POST['kelas'] == "x" || $_POST['kelas'] == "xi"){
                    if(isset($_POST['ekstra'])){
                        if(count($_POST['ekstra']) >= 1 && count($_POST['ekstra']) <= 3 ){
                            echo "<br />";
                            echo "<h3 style='margin-top:0px;'>Success, your input :</h3>";
                            echo 'NIS : ' . $_POST['nis'] . '<br />';
                            echo 'Nama : ' . $_POST['nama'] . '<br />';
                            echo 'Jenis Kelamin : ' . $_POST['jenis_kelamin'] . '<br />';
                            echo 'Kelas : ' . $_POST['kelas'] . '<br />';
                            
                            $ekstra = $_POST['ekstra'];
                            if(!empty($ekstra)){
                                echo 'Ekstrakurikuler yang dipilih :';
                                foreach($ekstra as $ekstra_item){
                                    echo '<br />' . $ekstra_item;
                                }
                            }
                        }
                    }  
                } 
                else { //khusus kelas 12 (jika tidak memilih ekstrak, maka berhasil)
                    if (!isset($_POST['ekstra'])){
                        echo "<br />";
                        echo "<h3 style='margin-top:0px;'>Success, your input :</h3>";
                        echo 'NIS : ' . $_POST['nis'] . '<br />';
                        echo 'Nama : ' . $_POST['nama'] . '<br />';
                        echo 'Jenis Kelamin : ' . $_POST['jenis_kelamin'] . '<br />';
                        echo 'Kelas : ' . $_POST['kelas'] . '<br />';
                    }
                }
            }
        ?>
    </div>
</body>
</html>