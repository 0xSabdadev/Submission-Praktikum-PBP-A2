<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Tugas 3: Form Input Siswa</title>
        <script>
        function validateForm(){
            var x = document.getElementById("ekskul");
            var y = document.getElementById("kelas");
            if(y.value == "XII"){
                x.style.display = "none";
            }else{
                x.style.display = "block";
            }
        }

        function resetform() {
            document.getElementById("form_input_siswa").reset();
            var ekskul = document.getElementById("ekskul");
            ekskul.style.display = 'block';
        }
        </script>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            if (isset($_POST['submit'])) {
                //validasi nis: tidak boleh kosong, 10 karakter, hanya dapat berisi angka 0..9
                $nis = test_input($_POST['nis']);
                if (empty($nis)) {
                    $error_nis = "NIS harus diisi";
                } elseif (is_numeric($nis) == FALSE) {
                    $error_nis = "NIS hanya dapat berisi angka";
                } elseif (strlen($nis) < 10){
                    $error_nis = "NIS harus terdiri atas 10 karakter";
                }

                //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
                $nama = test_input($_POST['nama']);
                if (empty($nama)) {
                    $error_nama = "Nama harus diisi";
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                    $error_nama = "Nama hanya dapat berisi huruf dan spasi";
                }

                //validasi jenis kelamin: tidak boleh kosong
                if (!isset($_POST['jenis_kelamin'])) {
                    $error_jenis_kelamin = "Jenis kelamin harus diisi";
                }

                //validasi kelas: tidak boleh kosong
                $kelas = $_POST['kelas'];
                if ($kelas == '' || $kelas == 'kelas') {
                    $error_kelas = "Kelas harus diisi";
                } 

                //validasi ekstrakurikuler: tidak boleh kosong
                if ($_POST['kelas'] == 'XII'){
                    echo '<style>#ekskul { display:none;}</style>';
                }else{
                    if (!isset($_POST['ekskul'])){
                        $error_ekskul = "Ekstrakurikuler harus dipilih minimal 1 dan maksimal 3";
                    } else if (count($_POST['ekskul']) > 3){
                        $error_ekskul = "Hanya dapat memilih maksimal 3 ekstrakurikuler";
                    }
                }  
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function oldRadio($name, $value) {
                if (isset($_POST[$name]) && $_POST[$name] == $value) {
                    echo "checked";
                }
            }

            ?>

            <div class="card">
                <div class="card-header">
                    Form Input Siswa
                </div>
                <div class="card-body ">
                    <form method="POST" id="form_input_siswa" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="nis">NIS:</label>
                            <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if(isset($nis)) {echo $nis;}?>">
                            <div class="error"><?php if (isset($error_nis)) echo $error_nis;?></div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
                            <div class="error"><?php if (isset($error_nama)) echo $error_nama;?></div>
                        </div>
                        <label>Jenis Kelamin:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php oldRadio('jenis_kelamin', 'pria')?>>Pria
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php oldRadio('jenis_kelamin', 'wanita')?>>Wanita
                            </label>
                        </div>
                        <div class="error"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
                        <br>
                        <div class="form-group">
                            <label for="kelas">Kelas:</label>
                            <select name="kelas" id="kelas" class="form-control" onchange="validateForm()">
                                <option value="X" <?php if(isset($kelas) && $kelas == "X")  
                                echo 'selected="true"';?>>X</option>
                                <option value="XI" <?php if(isset($kelas) && $kelas == "XI") 
                                echo 'selected="true"';?>>XI</option>
                                <option value="XII" <?php if(isset($kelas) && $kelas == "XII") 
                                echo 'selected="true"';?>>XII</option>
                            </select>
                            <div class="error"><?php if (isset($error_kelas)) echo $error_kelas;?></div>
                        </div>
                        <div id="ekskul">
                            <label>Ekstrakurikuler:</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="pramuka" 
                                    <?php if(isset($_POST['ekskul']) && in_array('pramuka',$_POST['ekskul'])) echo 'checked';?>>Pramuka
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="seni tari" 
                                    <?php if(isset($_POST['ekskul']) && in_array('seni tari',$_POST['ekskul'])) echo 'checked';?>>Seni Tari
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="sinematografi" 
                                    <?php if(isset($_POST['ekskul']) && in_array('sinematografi',$_POST['ekskul'])) echo 'checked';?>>Sinematografi
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="basket" 
                                    <?php if(isset($_POST['ekskul']) && in_array('basket',$_POST['ekskul'])) echo 'checked';?>>Basket
                                </label>
                            </div>
                        </div>
                        <div class="error"><?php if (isset($error_ekskul)) echo $error_ekskul;?></div>
                        <br>
                        <!-- Submit, reset dan button -->
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <button type="reset" class="btn btn-danger" onclick="resetform()">Reset</button>
                    </form>

                    <?php 
                    if (isset($_POST['submit']) && empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekskul)){
                        echo "<h3>Your Input:</h3>";
                        echo 'NIS = '.$_POST['nis'].'<br>';
                        echo 'Nama = '.$_POST['nama'].'<br>';
                        echo 'Jenis Kelamin = ';
                        if (isset($_POST['jenis_kelamin'])){
                            echo $_POST['jenis_kelamin'];
                        }
                        echo "<br>";
                        echo 'Kelas = ';
                        if(isset($_POST['kelas'])){
                            echo $_POST['kelas'];
                        }
                        if(isset($_POST['ekskul'])){
                            $ekskul = $_POST['ekskul'];
                        }
                        echo "<br>";
                        echo "Ekstrakurikuler yang dipilih = ";
                        if (!empty($ekskul)){
                            foreach ($ekskul as $ekskul_item) {
                                echo "<br/>".$ekskul_item;
                            }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>