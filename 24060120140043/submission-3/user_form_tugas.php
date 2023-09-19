<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        //validasi nama: harus diisi hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama =  "*Nama tidak boleh kosong*";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "*Nama hanya boleh berisi huruf dan spasi*";
        }
        //validasi nis: tidak boleh kosong format harus benar
        $nis = test_input($_POST['nis']);
        if (empty($nis)) {
            $error_nis = "*NIS tidak boleh kosong*";
        }
        elseif(strlen($nis) != 10){
            $error_nis = "*NIS harus terdiri dari 10 digit*";
        }
        elseif (!preg_match("/^[0-9]*$/", $nis)) {
            $error_nis = "*NIS hanya boleh berisi angka*";
        }

        //validasi jenis kelamin: harus diisi

        if (empty($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "*Jenis Kelamin Harus diisi*";
        }

        //validasi kota: harus diisi
        $kelas = $_POST['kelas'];
        if ($kelas == "" || $kelas == 'kelas') {
            $error_kelas = "*Kelas harus diisi*";
        }


        //validasi minat: tidk boleh kosong;
        if (isset($_POST["ekskul"])) {
            $ekskul = $_POST["ekskul"];
            // min 1 max 3
            if ((count($ekskul) < 1 || count($ekskul) > 3) && $kelas != 'XII') {
                $error_ekskul = "*Pilih minimal 1 dan maksimal 3 ekskul*";
            }
        } elseif (empty($_POST['ekskul']) && $kelas != 'XII') {
            $error_ekskul = "*Ekstrakurikuler harus dipilih*";
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Form Input Siswa</div>
            <div class="card-body">
                <form method="post" autocomplete="on">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="nis" name="nis" id="nis" class="form-control" value="<?php if (isset($nis)) echo $nis; ?>"maxlength="10">
                        <div class="error">
                            <?php if (isset($error_nis)) echo $error_nis; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" maxlength="50" value="<?php if (isset($nama)) echo $nama; ?>">
                        <div class="error">
                            <?php if (isset($error_nama)) echo $error_nama; ?>
                        </div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "pria") echo "checked"; ?>>Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "wanita") echo "checked"; ?>>Wanita
                        </label>
                    </div>
                    <div class="error">
                        <?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-control" onchange="hideEkstrakurikuler()">
                            <option value="">Pilih Kelas</option>
                            <option value="X" <?php if (isset($kelas) && $kelas == "X") echo 'selected="true"' ?>>X</option>
                            <option value="XI" <?php if (isset($kelas) && $kelas == "XI") echo 'selected="true"' ?>>XI</option>
                            <option value="XII" <?php if (isset($kelas) && $kelas == "XII") echo 'selected="true"' ?>>XII</option>
                        </select>
                        <div class="error">
                            <?php if (isset($error_kelas)) echo $error_kelas; ?>
                        </div>

                    </div>
                    <div id="ekstrakurikuler" class="form-group" <?php if(isset($kelas) && $kelas == "XII") echo "hidden"?>>
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="pramuka" <?php if (isset($_POST["ekskul"]) && in_array('pramuka', $_POST["ekskul"]) && $kelas != "XII") echo "checked"; ?>>Pramuka
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="seni_tari" <?php if (isset($_POST["ekskul"]) && in_array('seni_tari', $_POST["ekskul"]) && $kelas != "XII") echo "checked"; ?>>Seni Tari
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="sinematografi" <?php if (isset($_POST["ekskul"]) && in_array('sinematografi', $_POST["ekskul"]) && $kelas != "XII") echo "checked"; ?>>Sinematografi
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="basket" <?php if (isset($_POST["ekskul"]) && in_array('basket', $_POST["ekskul"]) && $kelas != "XII") echo "checked"; ?>>Basket
                            </label>
                        </div>
                        <div class="error">
                            <?php if (isset($error_ekskul)) echo $error_ekskul; ?>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
                </form>
            </div>

        </div>


    </div>
    <script>
        // function hide id ekstrakurikuler when kelas = XII
        function hideEkstrakurikuler() {
            var kelas = document.getElementById("kelas").value;
            if (kelas == "XII") {
                document.getElementById("ekstrakurikuler").hidden = true;
            } else {
                document.getElementById("ekstrakurikuler").hidden = false;
            }
        }
    </script>
    <?php
    if (isset($_POST["submit"])) {
        echo "<h3>Form Submitted</h3>";
        echo "NIS: " . $nis . "<br>";
        echo 'Nama = ' . $_POST["nama"] . '<br>';
        echo 'Kelas = ' . $_POST["kelas"] . '<br>';
        echo 'Jenis Kelamin = ' . $_POST["jenis_kelamin"] . '<br>';
        echo 'ekskul = ';
        if (!empty($_POST["ekskul"])) {
            foreach ($_POST["ekskul"] as $m) {
                echo $m . '<br>';
            }
        }
    }
    ?>

</body>

</html>