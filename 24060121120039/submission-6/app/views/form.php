<?php
    if (isset($_POST['submit'])) {
        // Validasi NIS : Tidak boleh kosong, hanya dapat berisi angka 0 sampai 9
        $NIS = test_input($_POST['NIS']);
        if (empty($NIS)) {
            $error_NIS = "NIS harus diisi";
        }elseif (!preg_match("/^[0-9]*$/", $NIS)) {
            $error_NIS =  "NIS hanya dapat berisi angka 0 sampai 9";
        }elseif (strlen($NIS) != 10) {
            $error_NIS = "NIS harus terdiri dari 10 karakter";
        }

        // Validasi nama: Tidak boleh kosong, hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        }elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama =  "Nama hanya dapat berisi huruf dan spasi";
        }

        // Validasi jenis kelamin: Tidak boleh kosong
        if (!isset($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        // Validasi kelas: Tidak boleh kosong
        if ($_POST['kelas'] == '') {
            $error_kelas = "Kelas harus diisi";
        }elseif ($_POST['kelas'] == 'X' || $_POST['kelas'] == 'XI' ) {
            // Validasi ekstrakulikuler: Tidak boleh kosong
            if (count($_POST['ekskul']) < 1) {
                $error_ekskul = "Ekstrakulikuler harus dipilih minimal 1";
            }elseif (count($_POST['ekskul']) > 3) {
                $error_ekskul = "Ekstrakulikuler harus dipilih maksimal 3";
            }
        }

        echo empty($_POST["ekskul"]);

        
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- cdn bootstrap  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Tugas 3 - Faris Naufal Izzatur Rahman</title>
        <script>
            function show_ekskul() {
                var ekskul = document.getElementById('formEkskul');
                var kelasform = document.getElementById('kelas');
                if (kelasform.value == 'X' || kelasform.value == 'XI') {
                    ekskul.style.display = 'block';
                }else {
                    ekskul.style.display = 'none';
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <br />
            <div class="card">
                <div class="card-header">Form Input Mahasiswa</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on" action="">

                        <!-- ------------------------------------------------------------------------------------------------------- -->

                        <div class="form-group">
                            <label for="NIS">NIS:</label>
                            <input type="text" class="form-control" id="NIS" name="NIS" maxlength="10" value="<?php if(isset($NIS)) {echo $NIS;}?>">
                            <div class="error text-danger"><?php if(isset($error_NIS)) echo $error_NIS?></div>
                        </div>

                        <!-- ------------------------------------------------------------------------------------------------------- -->

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php if(isset($nama)) {echo $nama;}?>">
                            <div class="error text-danger"><?php if(isset($error_nama)) echo $error_nama;?></div>
                        </div>

                        <!-- ------------------------------------------------------------------------------------------------------- -->

                        <label for="jenis_kelamin">Jenis kelamin:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="pria") echo "checked=true";?>>Pria
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="wanita") echo "checked-true";?>>Wanita
                            </label>
                        </div>
                        <div class="error text-danger"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>

                        <!-- ------------------------------------------------------------------------------------------------------- -->

                        <div class="form-group">
                            <label for="kelas">Kelas:</label>
                            <select id="kelas" name="kelas" class="form-control" onchange="show_ekskul()">
                                <option value="" ></option>
                                <option value="X" <?php if(isset($_POST['kelas']) && $_POST['kelas']=="X") echo 'selected="true"';?>>X</option>
                                <option value="XI" <?php if(isset($_POST['kelas']) && $_POST['kelas']=="XI") echo 'selected="true"';?>>XI</option>
                                <option value="XII" <?php if(isset($_POST['kelas']) && $_POST['kelas']=="XII") echo 'selected="true"';?>>XII</option>
                            </select>
                            <div class="error text-danger"><?php if(isset($error_kelas)) echo $error_kelas;?></div>
                        </div>

                        <!-- ------------------------------------------------------------------------------------------------------- -->

                        <div class="form-group" style="display:none;" id="formEkskul">
                            <label>Esktrakulikuler:</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="pramuka" <?php if(isset($ekskul) && in_array('pramuka', $ekskul)) echo 'checked';?>>Pramuka
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="seni_tari" <?php if(isset($ekskul) && in_array('seni_tari', $ekskul)) echo 'checked';?>>Seni Tari
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="sinematografi" <?php if(isset($ekskul) && in_array('sinematografi', $ekskul)) echo 'checked';?>>Sinematografi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="basket" <?php if(isset($ekskul) && in_array('basket', $ekskul)) echo 'checked';?>>Basket
                                    </label>
                                </div>
                        </div>

                            <!-- ------------------------------------------------------------------------------------------------------- -->
                            
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>

        <?php 
            if (isset($_POST["submit"]) && empty($error_NIS) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekskul)) {
                echo "<h3>Your Input:</h3>";
                echo 'NIS = '.$_POST['NIS'].'<br />';
                echo 'Nama = '.$_POST['nama'].'<br />';
                echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br />';
                echo 'Kelas = '.$_POST['kelas'].'<br />';

                if (!empty($_POST['ekskul'])) {
                    echo 'Peminatan yang dipilih: ';
                    foreach($_POST['ekskul'] as $ekskul_pilihan) {
                        echo '<br />'.$ekskul_pilihan;
                    }
                }
            }
        ?>

    </body>
</html>