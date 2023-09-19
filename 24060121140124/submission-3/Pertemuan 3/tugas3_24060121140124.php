<!-- Nama: Fitra Syamli Yudhisaputra -->
<!-- NIM: 24060121140124 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi: Implementasi Tugas Form Input Siswa Praktikum 3-->
<!-- Tanggal: 17/09/2023 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Form Mahasiswa</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        function show() {
            var kelas = document.getElementById("kelas");
            var ekstrakurikuler = document.getElementById("ekstrakurikuler");
            if (kelas.value == "XII") {
                ekstrakurikuler.style.display = 'none';
            } else {
                ekstrakurikuler.style.display = 'block';
            }
        }
    </script>
</head>

<body>
    <?php
    error_reporting(E_ALL & -E_WARNING & -E_NOTICE);

    // Inisialisasi variabel error
    $error_nis = $error_nama = $error_jenis_kelamin = $error_kelas = $error_ekstrakurikuler = "";

    //validasi submit
    if (isset($_POST['submit'])) {
        //validasi NIS
        $nis = test_input($_POST['NIS']);
        if (empty($nis)) {
            $error_nis = 'NIS harus diisi';
        } else if (!preg_match("/^[0-9]{10}$/", $nis)) {
            $error_nis = "NIS harus terdiri dari 10 angka";
        }

        //validasi nama
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = 'Nama harus diisi';
        } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }

        //validasi jenis kelamin
        $jenis_kelamin = $_POST['jenis_kelamin'];
        if (empty($jenis_kelamin)) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        //validasi kelas
        $kelas = $_POST['kelas'];
        $ekstrakurikuler = $_POST['ekstrakurikuler'];
        if (empty($kelas) || $kelas == 'kelas') {
            $error_kelas = "Kelas harus diisi";
        } else if ($kelas == 'X' || $kelas == 'XI') {
            if (empty($ekstrakurikuler)) {
                $error_ekstrakurikuler = "Ekstrakurikuler harus dipilih minimal 1 maksimal 3";
            } else if (count($ekstrakurikuler) > 3) {
                $error_ekstrakurikuler = "Ekstrakurikuler maksimal 3";
            }
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
    <div class="card m-5">
        <div class="card-header">Form Input Siswa</div>
        <div class="card-body">
            <form id="formDataProduk" method="POST" autocomplete="on" action="">
                <!-- NIS -->
                <div class="form-group">
                    <label for="NIS">NIS:</label>
                    <input type="text" class="form-control" id="NIS" name="NIS" minlength="10" maxlength="10" value="<?php if (isset($nis)) {
                                                                                                                        echo $nis;
                                                                                                                    } ?>" required>
                    <div class="error"><?php if (isset($error_nis)) {
                                            echo $error_nis;
                                        } ?></div>
                </div>
                <br>
                <!-- Nama -->
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if (isset($nama)) {
                                                                                                                echo $nama;
                                                                                                            } ?>" required>
                    <div class="error"><?php if (isset($error_nama)) {
                                            echo $error_nama;
                                        } ?></div>
                    <br>
                </div>
                <!-- Jenis Kelamin -->
                <label>Jenis Kelamin</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked"; ?>>Pria</label>
                    <div class="error"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?>
                    </div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked"; ?>>Wanita</label>
                    <div class="error"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                </div>
                <br>
                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <select class="form-control" name="kelas" id="kelas" onchange="show()" required>
                        <option value="kelas" <?php if (isset($kelas) && $kelas == "kelas") {
                                                    echo 'selected="true"';
                                                } ?>>Pilih Kelas</option>
                        <option value="X" <?php if (isset($kelas) && $kelas == "X") {
                                                echo 'selected="true"';
                                            } ?>>X</option>
                        <option value="XI" <?php if (isset($kelas) && $kelas == "XI") {
                                                echo 'selected="true"';
                                            } ?>>XI</option>
                        <option value="XII" <?php if (isset($kelas) && $kelas == "XII") {
                                                    echo 'selected="true"';
                                                } ?>>XII</option>
                    </select>
                    <div class="error"><?php if (isset($error_kelas)) {
                                            echo $error_kelas;
                                        } ?></div>
                </div>
                <br>

                <!-- Ekstrakurikuler -->
                <div id="ekstrakurikuler">
                    <label>Ekstrakurikuler:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka" <?php if (isset($ekstrakurikuler) && in_array('pramuka', $ekstrakurikuler)) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>Pramuka
                        </label>
                        <div class="error"><?php if (isset($error_ekstrakurikuler)) {
                                                echo $error_ekstrakurikuler;
                                            } ?></div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seniTari" <?php if (isset($ekstrakurikuler) && in_array('seniTari', $ekstrakurikuler)) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>Seni Tari
                        </label>
                        <div class="error"><?php if (isset($error_ekstrakurikuler)) {
                                                echo $error_ekstrakurikuler;
                                            } ?></div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi" <?php if (isset($ekstrakurikuler) && in_array('sinematografi', $ekstrakurikuler)) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>Sinematografi
                        </label>
                        <div class="error"><?php if (isset($error_ekstrakurikuler)) {
                                                echo $error_ekstrakurikuler;
                                            } ?></div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="basket" <?php if (isset($ekstrakurikuler) && in_array('basket', $ekstrakurikuler)) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>Basket
                        </label>
                        <div class="error"><?php if (isset($error_ekstrakurikuler)) {
                                                echo $error_ekstrakurikuler;
                                            } ?></div>
                    </div>
                </div>
                <br>
                <!-- Button Submit dan Reset -->
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</body>

</html>
