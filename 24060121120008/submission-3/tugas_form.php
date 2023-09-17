<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 14 September 2023
     Lab        : PBP A2
 -->

<html>
    <head>
        <title>Latihan Validasi PHP</title>
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

            //validasi nis: harus angka dan harus berjumlah 10
            $nis = test_input($_POST['nis']);
            if(empty($nis)){
                $error_nis = "<span class='err'>*Nis harus diisi</span>";
            }elseif(strlen($nis) != 10 ||!preg_match("/^[0-9]*$/",$nis)){
                $error_nis = "<span class='err'>*NIS harus terdiri dari 10 angka</span>";
            }

            //validasi kelamin: tidak boleh kosong
            if(empty( $_POST['jenis_kelamin'])){
                if(empty( $_POST['jenis_kelamin'])){ 
                    $error_jenis_kelamin = "<span class='err'>*Jenis kelamin harus dipilih</span>";
                }
            }

            // Validasi Kelas: tidak boleh kosong
            $kelas = $_POST['kelas'];
            if($kelas == ''){
                $error_kelas = "<span class='err'>*Kelas harus dipilih</span>";
            }

            // Validasi Ekstrakurikuler 
            if (empty($_POST['ekskul'])) {
                if (($_POST['kelas'] == 'x' || $_POST['kelas'] == 'xi')) {
                    $error_ekskul = "<span class='err'>*Minimal memilih 1 ekstrakulikuler</span>";
                }
                } elseif (($_POST['kelas'] == 'x' || $_POST['kelas'] == 'xi') && count($_POST['ekskul']) > 3) {
                    $error_ekskul = "<span class='err'>*Maksimal memilih 3 ekstrakulikuler</span>";
                } elseif (!empty($_POST['ekskul']) && $_POST['kelas'] == 'xii') {
                    $error_ekskul = "<span class='err'>*Tidak boleh memilih ekskul jika kelas XII</span>";
            }
            
        }
        ?>
        <div class="satu">
            <div class="judul">
                <label >Form Input Siswa</label>
            </div>
            <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                    <label for="nis">NIS:</label><br />
                    <input type="number" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if(isset($nis)) {echo $nis;} ?>">
                    <div class="error"><?php if(isset($error_nis)) echo $error_nis;?></div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama:</label><br />
                    <input type="nama" class="form-control" id="nama" name="nama" value="<?php if(isset($nama)) {echo $nama;} ?>">
                    <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
                </div>

                <div class="jk">
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="pria") echo "checked";?>>Pria
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="wanita") echo "checked";?>>Wanita
                        </label>   
                    </div>
                    <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label><br />
                    <select id="kelas" name="kelas" class="form-control">
                        <option value="" selected disable>--Pilih Kelas--</option>
                        <option value="x" <?php if(isset($kelas) && $kelas=="x") echo 'selected="true"';?> >X</option>
                        <option value="xi" <?php if(isset($kelas) && $kelas=="xi") echo 'selected="true"';?>>XI</option>
                        <option value="xii" <?php if(isset($kelas) && $kelas=="xii") echo 'selected="true"';?>>XII</option>
                    </select>
                    <div class="error"><?php if(isset($error_kelas)) echo $error_kelas;?></div>
                </div>

                <div class="jk">
                    <label>Ekstrakulikuler:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekskul[]" value="pramuka" <?php if(isset($_POST['ekskul']) && in_array('pramuka',$_POST['ekskul'])) echo "checked";?> >Pramuka
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekskul[]" value="seni_tari" <?php if(isset($_POST['ekskul']) && in_array('seni_tari',$_POST['ekskul'])) echo "checked";?>>Seni Tari
                        </label>
                    </div>
                    
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekskul[]" value="sinematografi" <?php if(isset($_POST['ekskul']) && in_array('sinematografi',$_POST['ekskul'])) echo "checked";?>>Sinematografi
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekskul[]" value="basket" <?php if(isset($_POST['ekskul']) && in_array('basket',$_POST['ekskul'])) echo "checked";?>>Basket
                        </label>     
                    </div>
                    <div class="error"><?php if(isset($error_ekskul)) echo $error_ekskul;?></div>
                </div>

                <!--submit dan reset button-->
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                
            </form>
        </div>

        <div class="yourinput">
            <?php
                if(isset($_POST["submit"])&&(isset($_POST['nis']) &&isset($_POST['nama'])&&isset($_POST['jenis_kelamin'])&&isset($_POST['kelas']))){
                        if($_POST['kelas'] == 'x' || $_POST['kelas'] == 'xi'){
                            if(isset($_POST['ekskul'])){
                                if(count($_POST['ekskul']) >= 1 && count($_POST['ekskul']) <= 3){
                                    echo '<h3>BERHASIL!!</h3><br />';
                                    echo 'Your Input:<br />';
                                    echo 'NIS = '.$_POST['nis'].'<br />';
                                    echo 'Nama = '.$_POST['nama'].'<br />';
                                    echo 'Kelas = '.$_POST['kelas'].'<br />';
                                    if(!empty($_POST['jenis_kelamin'])){
                                        if(!empty( $_POST['jenis_kelamin'])){ 
                                            echo "Jenis Kelamin = ".$_POST['jenis_kelamin'].'<br />';
                                        }
                                    }else{
                                        echo "Tidak ada jenis kelamin yang dipilih.<br />";
                                    }

                                    if(!empty($_POST['ekskul'])){
                                        if(!empty($_POST['ekskul'])){ 
                                            $ekskul = $_POST['ekskul'];
                                            echo "Ekstrakulikuler yang dipilih = ";
                                            foreach($ekskul as $ekskul_item){
                                                echo '<br />'.$ekskul_item;
                                            }
                                        }
                                    }else{
                                        echo "Tidak ada ekstrakulikuler yang dipilih.";
                                    }    

                                }
                            }

                        }else{
                        if(!isset($_POST['ekskul'])){
                                echo '<h3>BERHASIL!!</h3><br />';
                                echo '<h5>Your Input:</h5><br />';
                                echo 'NIS = '.$_POST['nis'].'<br />';
                                echo 'Nama = '.$_POST['nama'].'<br />';
                                echo 'Kelas = '.$_POST['kelas'].'<br />';
                                if(!empty($_POST['jenis_kelamin'])){
                                    if(!empty( $_POST['jenis_kelamin'])){ 
                                        echo "Jenis Kelamin = ".$_POST['jenis_kelamin'].'<br />';
                                    }
                                }else{
                                    echo "Tidak ada jenis kelamin yang dipilih.<br />";
                                }
                        
                        }
                }
            }
            ?>
        </div>
    </body>
</html>