<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .error{
            color:orangered;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            margin-bottom: 8px;
        }
    </style>
    <script>
        //apabila kelas == "XI" hide ekstrakurikuler
        function show(){
            var kelas = document.getElementById("kelas");
            var ekstrakurikuler = document.getElementById("ekstrakurikuler");
            if(kelas.value == "XII"){
                ekstrakurikuler.style.display = 'none';
            }else {
                ekstrakurikuler.style.display = 'block';
            }
        }
    </script>
    <title>Form Mahasiswa</title>
</head>

<body>
    <?php
    function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

        if (isset($_POST['submit'])) {
            //NIS
            $nis = test_input($_POST['NIS']);
            if (empty($nis)) {
                $error_nis = "NIS harus diisi";
            } elseif (!preg_match("/^[0-9]*$/", $nis)) {
                $error_nis = "Format NIS tidak tepat";
            }

            //NAMA
            $nama = test_input($_POST['Nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Format nama tidak tepat";
            }

            //JENIS KELAMIN
            if ((!isset($_POST['jenis_kelamin'])) || empty($_POST['jenis_kelamin'])) {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }

            //KELAS DAN EKSKUL
            if (($_POST['kelas']) == '' || ($_POST['kelas']) == 'kelas') {
                $error_kelas = "kelas harus diisi";
            }else if(($_POST['kelas']) == 'X' || ($_POST['kelas']) == 'XI'){
                if (empty($_POST['ekstrakurikuler'])) {
                    $error_ekstrakurikuler = "ekstrakurikuler harus dipilih";
                }
            } else if(($_POST['kelas']) == 'XII') {
                if (!empty($_POST['ekstrakurikuler'])) {
                    unset($_POST['ekstrakurikuler']);
                }
            }
            else{
                $count = count($_POST['ekstrakurikuler']);
                if ($count>3) {
                    $error_ekstrakurikuler = "ekstrakurikuler maksimal 3 dan minimal 1";
                }
            }

            //VIEW
            echo "<h3>Your Input:</h3>";
            if (($_POST['kelas']) == 'X' || ($_POST['kelas']) == 'XI') {
                echo 'NIS = ' . $_POST['NIS'] . '<br />';
                echo 'Nama = ' . $_POST['Nama'] . '<br />';
                echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
                echo 'Kelas = ' . $_POST['kelas'] . '<br />';

                $ekstra = $_POST['ekstrakurikuler'];
                echo 'Ekstrakurikuler yang dipilih: ';
                foreach ($ekstra as $ekstra_item) {
                    echo '<br />' . $ekstra_item;
                }
            } else {
                echo 'NIS = ' . $_POST['NIS'] . '<br />';
                echo 'Nama = ' . $_POST['Nama'] . '<br />';
                echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
                echo 'Kelas = ' . $_POST['kelas'] . '<br />';
            }
        }
    ?>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-body">
                <h4 class="card-title mb-3">Form Siswa</h4>
                <form method="POST" autocomplete="on" action="">

                    <div class="form-group">
                        <label for="NIS">NIS: </label>
                        <input type="text" class="form-control" name="NIS" id="NIS" maxlength="10" value="<?php if (isset($nis)) {echo $nis;} ?>" >
                        <div class="error"><?php if (isset($error_nis)) {echo $error_nis;} ?></div>
                    </div>

                    <div class="form-group">
                        <label for="Nama">Nama: </label>
                        <input type="text" class="form-control" name="Nama" id="Nama" value="<?php if (isset($nama)) {echo $nama;}?>" >
                        <div class="error"><?php if (isset($error_nama)) {echo $error_nama;} ?></div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin: </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria"<?php if (isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked";?>>Pria
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"<?php if (isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked";?>>Wanita
                            </label>
                        </div>
                        <div class="error"><?php if (isset($error_jenis_kelamin)) {echo $error_jenis_kelamin;} ?></div>
                    </div>

                    <div class="form-group">
                    <label for="kelas">Kelas:</label>
                        <select class="form-control" name="kelas" id="kelas" onchange="show()">
                            <option value="X" <?php if (isset($kelas) && $kelas == "X") {echo 'selected="true"';}?>>X</option>
                            <option value="XI" <?php if (isset($kelas) && $kelas == "XI") {echo 'selected="true"';}?>>XI</option>
                            <option value="XII" <?php if (isset($kelas) && $kelas == "XII") {echo 'selected="true"';}?>>XII</option>
                        </select>
                        <div class="error"><?php if (isset($error_kelas)) {echo $error_kelas;}?></div>
                    </div>

                    <div id="ekstrakurikuler">
                    <label>Ekstrakurikuler:</label>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka"<?php if (isset($_POST['ekstrakurikuler']) && in_array('pramuka', $_POST['ekstrakurikuler'])) {echo 'checked';}?>>Pramuka
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seniTari"<?php if (isset($_POST['ekstrakurikuler']) && in_array('seniTari', $_POST['ekstrakurikuler'])) {echo 'checked';}?>>Seni Tari
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi"<?php if (isset($_POST['ekstrakurikuler']) && in_array('sinematografi', $_POST['ekstrakurikuler'])) {echo 'checked';}?>>Sinematografi
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="basket"<?php if (isset($_POST['ekstrakurikuler']) && in_array('basket', $_POST['ekstrakurikuler'])) {echo 'checked';}?>>Basket
                            </label>
                        </div>

                        <div class="error"><?php if (isset($error_ekstrakurikuler)) {echo $error_ekstrakurikuler;}?></div>
                    </div>
                    

                    <br>
                    <!-- BAGIAN BUTTONS -->
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">Sumbitit</button>
                    <button type="reset" class="btn btn-danger" name="reset" value="Reset" >Reset</button>
                </form>
            </div>
        </div>
        <div class="row w-50 mt-5 mb-5 mx-auto">
            <div class="col-12">
                <?php
                    
                ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script>
        
    </script>
</body>

</html>
