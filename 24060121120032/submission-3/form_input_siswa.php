<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script>
        function validateForm(){
                var x = document.getElementById("ekstra");
                var y = document.getElementById("kelas");
                if(y.value == "XII"){
                    x.style.display = "none";
                }else{
                    x.style.display = "block";
                }
            }
    </script>
    <style>
        .form-group {
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 8px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 8px;
        }

        /* Tambahkan gaya untuk pesan kesalahan (error warning) */
        .error {
            color: red;
        }
    </style>

    <title>Form Input Siswa</title>
</head>

<body>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Form Input Siswa</h5>
                <?php 
                    error_reporting(false); 

                    if(isset($_POST['submit'])){
                        //validasi NIS: tidak boleh kosong
                        $nis = test_input($_POST['nis']);
                        if(empty($nis)){
                            $error_nis = "NIS harus diisi";
                        }
                        elseif(!preg_match("/^[0-9]{10}$/", $nis)){
                            $error_nis = "NIS terdiri dari 10 karakter dan hanya boleh berisi angka";
                        }
                        
                        //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
                        $nama = test_input($_POST['nama']);
                        if (empty($nama)) {
                            $error_nama = "Nama harus diisi";
                        }
                        elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
                        }
                        
                        //validasi jenis kelamin: tidak boleh kosong
                        if (!isset($_POST['jenis_kelamin'])) {
                            $error_jenis_kelamin = "Jenis kelamin harus diisi";
                        }

                        //validasi kelas: tidak boleh kosong
                        $kelas = test_input($_POST['kelas']);
                        if ($kelas == '') {
                            $error_kelas = "Kelas harus diisi";
                        }
                        
                        //validasi ekstrakurikuler: tidak boleh kosong
                        if ($_POST['kelas'] == 'XII') {
                            echo '<style>#ekstra { display:none;}</style>';
                        }
                        else {
                            if (!isset($_POST['ekstra'])) {
                                $error_ekstra = "Ekstrakurikuler harus dipilih minimal 1 dan maksimal 3";
                            } 
                            else if (count($_POST['ekstra']) > 3) {
                                $error_ekstra = "Hanya dapat memilih maksimal 3 kegiatan ekstrakurikuler";
                            }
                        }
                    }

                    function test_input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    //Fungsi untuk mempertahankan option ketika terjadi error pada pilihan kelas
                    function oldOption($kelas, $value) {
                        if(isset($_POST[$kelas]) && $_POST[$kelas] == $value) {
                            echo 'selected';
                        }
                    }

                    //Fungsi untuk mempertahankan option ketika terjadi error pada pilihan jenis kelamin
                    function oldRadio($jenis_kelamin, $value) {
                        if(isset($_POST[$jenis_kelamin]) && $_POST[$jenis_kelamin] == $value) {
                            echo 'checked';
                        }
                    }
                
                ?>

                <form method="POST" autocomplete="on" action="" onsubmit="return resetForm();">
                    <!-- Masukkan element form disini -->
                    <div class="form-group">
                        <label for="nis">NIS: </label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength ="10" placeholder="Tuliskan NIS" required="" value="<?php if(isset($nis)) {echo $nis;} ?>">
                        <div class="error"><?php if(isset($error_nis)) echo $error_nis; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama: </label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" placeholder="Tuliskan nama" required="" value="<?php if(isset($nama)) {echo $nama;} ?>">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
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
                        <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?>
                    </div>

                    <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <select name="kelas" id="kelas" class="form-control" onchange="validateForm()">
                        <option value="X" <?php if(isset($kelas)&&$kelas=="X")  
                        echo 'selected="true"';?>>X</option>
                        <option value="XI" <?php if(isset($kelas) && $kelas=="XI") 
                        echo 'selected="true"';?>>XI</option>
                        <option value="XII" <?php if(isset($kelas) && $kelas=="XII") 
                        echo 'selected="true"';?>>XII</option>
                    </select>
                    <div class="error"><?php if(isset($error_kelas)) echo $error_kelas;?></div>
                </div>
            
                <br>
                <div id="ekstra">
                <label>Ekstrakurikuler:</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"  name ="ekstra[]" value="pramuka" 
                    <?php if(isset($_POST['ekstra']) && in_array('pramuka',$_POST['ekstra'])) echo 'checked';?>>Pramuka</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"  name ="ekstra[]" value="seni_tari"  
                    <?php if(isset($_POST['ekstra']) && in_array('seni_tari',$_POST['ekstra'])) echo 'checked';?>>Seni Tari</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name ="ekstra[]" value="sinematografi" 
                    <?php if(isset($_POST['ekstra']) && in_array('sinematografi',$_POST['ekstra'])) echo 'checked';?>>Sinematografi</label>
                </div>
                <div class="error"><?php if(isset($error_ekstra)) echo $error_ekstra;?></div>  
                </br>
                </div>

                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
        <div class="row w-50 mt-5 mb-5 mx-auto">
            <div class="col-12">
                <?php
                // Masukkan logic PHP di sini
                if(isset($_POST["submit"])){
                    echo"<h3>Your Input:</h3>";
                    echo 'NIS: '.$_POST['nis'].'<br/>';
                    echo 'Nama: '.$_POST['nama'].'<br/>';
                    echo 'Kelas: '.$_POST['kelas'].'<br/>';
                    echo 'Jenis Kelamin: '.$_POST['jenis_kelamin'].'<br/>';
                    echo 'Ekstra: '.$_POST['ekstra'].'<br/>';

                    if ($kelas == 'X' || $kelas == 'XI') {
                        echo 'Ekstrakurikuler: ';
                        $ekstra = $_POST['ekstra'];
                        if(!empty($ekstra)){
                            foreach($ekstra as $ekstra_item){
                                echo '<br/>' . $ekstra_item;
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

        <script>

            // Fungsi ini akan dipanggil saat nilai input berubah
            function checkFormValidity() {
                var nis = document.getElementById('nis').value;
                var nama = document.getElementById('nama').value;
                var kelas = document.getElementById('kelas').value;
                var jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
                var ekstra = document.querySelectorAll('input[name="ekstra[]"]:checked');

                // Aktifkan tombol "Submit" hanya jika semua isian yang diperlukan telah diisi
                var submitButton = document.getElementById('submit-button');
                submitButton.disabled = !(nama && nis && kelas && jenisKelamin && ekstra);
            }

            // Panggil checkFormValidity() saat nilai input berubah
            var formInputs = document.querySelectorAll('input, select, textarea');
            formInputs.forEach(function(input) {
                input.addEventListener('input', checkFormValidity);
            });
        </script>
</body>

</html>
