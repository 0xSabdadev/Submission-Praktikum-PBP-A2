<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 14 September 2023
     Lab        : PBP A2
 -->
<html>
    <head>
        <title>User Form Post</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php
            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(isset($_POST["submit"])){
                //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
                $nama = test_input($_POST['nama']);
                if(empty($nama)){
                    $error_nama = "<span class='err'>*Nama harus diisi</span>";
                }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                    $error_nama = "<span class='err'>*Nama hanya dapat berisi huruf dan spasi</span>";
                }

                //validasi email: tidak boleh kosong, format harus benar
                $email = test_input($_POST['email']);
                if($email == ''){
                    $error_email = "<span class='err'>*Email harus diisi";
                }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error_email = "<span class='err'>*Format email tidak benar</span>";
                }

                //validasi alamat: tidak boleh kosong
                $alamat = test_input($_POST['alamat']);
                if($alamat == ''){
                    $error_alamat = "<span class='err'>*Alamat harus diisi</span>";
                }

                //validasi kelamin: tidak boleh kosong
                if(empty( $_POST['jenis_kelamin'])){
                    if(empty( $_POST['jenis_kelamin'])){ 
                        $error_jenis_kelamin = "<span class='err'>*Jenis kelamin harus dipilih</span>";
                    }
                }

                //validasi kota: tidak boleh kosong
                $kota = $_POST['kota'];
                if($kota == ''){
                    $error_kota = "<span class='err'>*Kota harus dipilih</span>";
                }

                //validasi minat: tidak boleh kosong
                if(empty( $_POST['minat'])){
                    if(empty( $_POST['minat'])){ 
                        $error_minat = "<span class='err'>*Peminatan harus dipilih</span>";
                    }
                }
            }
            ?>

            <div class="satu">
                <div class="judul">
                    <label >Form Mahasiswa</label>
                </div>
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nama">Nama:</label><br />
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>

                    <div class="form-group">
                        <label for="text">Email:</label><br />
                        <input type="text" class="form-control" id="email" name="email">
                        <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label><br />
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" cols="73"></textarea>
                        <div class="error"><?php if(isset($error_alamat)) echo $error_alamat;?></div>
                    </div>

                    <div class="form-group">
                        <label for="kota">Kota/ Kabupaten:</label><br />
                        <select id="kota" name="kota" class="form-control">
                            <option value="" selected disable>--Pilih kota--</option>
                            <option value="Semarang">Semarang</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                        </select>
                        <div class="error"><?php if(isset($error_kota)) echo $error_kota;?></div>
                    </div>

                    <div class="jk">
                    <label>Jenis Kelamin:</label><br />
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
                        </label>
                    </div>
                        <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
                    </div>

                    <div class="jk">
                    <label>Peminatan:</label><br />
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
                        </label>
                    </div>
                    <div class="error"><?php if(isset($error_minat)) echo $error_minat;?></div>
                    </div>

                    <!--submit dan reset button-->
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>

            <div class="yourinput">
                <?php
                if(isset($_POST["submit"])){
                    echo 'Your Input:<br />';
                    echo 'Nama = '.$_POST['nama'].'<br />';
                    echo 'Email = '.$_POST['email'].'<br />';
                    echo 'Kota = '.$_POST['kota'].'<br />';
                    echo 'Alamat = '.$_POST['alamat'].'<br />';
                    if(!empty($_POST['jenis_kelamin'])){
                        if(!empty( $_POST['jenis_kelamin'])){ 
                            echo "Jenis Kelamin = ".$_POST['jenis_kelamin'].'<br />';
                        }
                    }else{
                        echo "Tidak ada jenis kelamin yang dipilih.<br />";
                    }
                        
                    if(!empty($_POST['minat'])){
                        if(!empty($_POST['minat'])){ 
                            $minat = $_POST['minat'];
                            echo "Peminatan yang dipilih = ";
                            foreach($minat as $minat_item){
                                echo '<br />'.$minat_item;
                            }
                        }
                    }else{
                        echo "Tidak ada peminatan yang dipilih.";
                    }
                }
                ?>
            </div>
    </body>
</html>