<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : Tugas implementasi modul pertemuan 3 (Tugas)
-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    //validasi submit
    if (isset($_POST['submit'])) {
        //validasi nis: tidak boleh kosong, hanya dapat berisi angka 0..9
        $nis = test_input($_POST['nis']);
        if (empty($nis)) {
            $error_nis = "NIS harus diisi";
        } else {
            if (!preg_match("/^[0-9]*$/", $nis)) {
                $error_nis = "NIS hanya dapat berisi angka";
            }
            if (strlen($nis) != 10) {
                $error_nis = "NIS harus terdiri dari 10 karakter";
            }
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

        // Validasi Kelas
        if (!isset($_POST['kelas'])) {
            $error_kelas = "Kelas harus diisi";
        } else {
            $kelas = $_POST['kelas'];
        }

        // Validasi Ekstrakurikuler jika kelas X dan XI wajib memilih minimal 1 maksimal 3, dan kelas XII tidak dapat memilih
        if ($_POST['kelas'] == "X" || $_POST['kelas'] == "XI") {
            if (isset($_POST['ekskul'])) {
                $count_ekskul = count($_POST['ekskul']);
                if ($count_ekskul < 1 || $count_ekskul > 3) {
                    $error_ekskul = "Pilih minimal 1 dan maksimal 3 kegiatan ekstrakurikuler";
                }
            } else {
                $error_ekskul = "Pilih minimal 1 dan maksimal 3 kegiatan ekstrakurikuler";
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
    if (isset($_POST['ekskul'])) {
        $ekskul = $_POST['ekskul'];
    }
    ?>
    <div class="container"><br />
        <div class="card">
            <div class="card-header">Form Mahasiswa</div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                    <!-- NIS -->
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if (isset($_POST['nis'])) echo $_POST['nis'] ?>">
                        <div class="error text-danger"><?php if (isset($error_nis)) echo $error_nis; ?></div>
                    </div>
                    <!-- NAMA -->
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if (isset($_POST['nama'])) echo $_POST['nama'] ?>">
                        <div class="error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <!-- Jenis Kelamin -->
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria') echo 'checked' ?> name="jenis_kelamin" value="pria">Pria
                        </label>
                        <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'wanita') echo 'checked' ?> name="jenis_kelamin" value="pria">Wanita
                        </label>
                        <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    </div>
                    <br>
                    <!-- Kelas -->
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select onchange="setEkskul()" id="kelas" name="kelas" class="form-control">
                            <option value="" selected disabled>-- Pilih Kelas --</option>
                            <option value="X" <?php if (isset($_POST['kelas']) && ($_POST['kelas'] == "X")) echo 'selected' ?>>X</option>
                            <option value="XI" <?php if (isset($_POST['kelas']) && ($_POST['kelas'] == "XI")) echo 'selected' ?>>XI</option>
                            <option value="XII" <?php if (isset($_POST['kelas']) && ($_POST['kelas'] == "XII")) echo 'selected' ?>>XII</option>
                        </select>
                        <div class="error text-danger"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
                    </div>
                    <br>
                    <!-- Ekstrakurikuler -->
                    <div id="ekskul_container" <?php if ((!isset($_POST['kelas'])) or (isset($_POST['kelas']) && $_POST['kelas'] != "XII")) echo 'class="d-block"';
                                                else echo 'class="d-none"' ?>>
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="pramuka" <?php if (isset($ekskul) && in_array('pramuka', $ekskul)) echo "checked"; ?>>Pramuka
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="seni_tari" <?php if (isset($ekskul) && in_array('seni_tari', $ekskul)) echo "checked"; ?>>Seni Tari
                            </label>
                        </div>
                        <div class="form-check">
                            <label class=" form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="sinematografi" <?php if (isset($ekskul) && in_array('sinematografi', $ekskul)) echo "checked"; ?>>Sinematografi
                            </label>
                        </div>
                        <div class="form-check">
                            <label class=" form-check-label">
                                <input type="checkbox" class="form-check-input" name="ekskul[]" value="basket" <?php if (isset($ekskul) && in_array('basket', $ekskul)) echo "checked"; ?>>Basket
                            </label>
                        </div>
                        <div class="error text-danger"><?php if (isset($error_ekskul)) echo $error_ekskul; ?></div>
                    </div>
                    <br>
                    <!-- Button -->
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">submit
                    </button>
                    <button type="reset" class="btn btn-danger" name="reset" value="reset" onclick="resetForm()">Reset</button>
                </form>
            </div>

            <?php
            if (isset($_POST['submit']) && isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['kelas'])) {
                //kelas X dan XI memilih min 1 dan maks 3 ekstrakurikuler
                if ($_POST['kelas'] == "X" || $_POST['kelas'] == "XI") {
                    if (isset($_POST['ekskul'])) {
                        if (count($_POST['ekskul']) >= 1 || count($_POST['ekskul']) <= 3) {
                            echo "<br />";
                            echo "<h3>Your Input</h3>";
                            echo 'NIS : ' . $_POST['nis'] . '<br />';
                            echo 'Nama : ' . $_POST['nama'] . '<br />';
                            echo 'Jenis Kelamin : ' . $_POST['jenis_kelamin'] . '<br />';
                            echo 'Kelas : ' . $_POST['kelas'] . '<br />';

                            $ekskul = $_POST['ekskul'];
                            if (!empty($ekskul)) {
                                echo 'Ekstrakurikuler yang dipilih :';
                                foreach ($ekskul as $ekskul_item) {
                                    echo '<br />' . $ekskul_item;
                                }
                            }
                        }
                    }
                } else {
                    //kelas XII tidak bisa memilih ekstrakurikuler
                    if (!isset($_POST['ekskul'])) {
                        echo "<br />";
                        echo "<h3>Your Input</h3>";
                        echo 'NIS : ' . $_POST['nis'] . '<br />';
                        echo 'Nama : ' . $_POST['nama'] . '<br />';
                        echo 'Jenis Kelamin : ' . $_POST['jenis_kelamin'] . '<br />';
                        echo 'Kelas : ' . $_POST['kelas'] . '<br />';
                    }
                }
            }
            ?>

            <script>
                const setEkskul = () => {
                    const kelas = document.getElementById('kelas').value;
                    const ekskul_container = document.getElementById('ekskul_container');
                    const checkbox = document.getElementsByClassName('form-check-input-eks');
                    if (kelas != 'XII') {
                        ekskul_container.classList.remove('d-none');
                        ekskul_container.classList.add('d-block');
                    } else {
                        ekskul_container.classList.add('d-none');
                        ekskul_container.classList.remove('d-block');
                        for (let index = 0; index < checkbox.length; index++) {
                            const element = checkbox[index];
                            element.checked = false;
                        }
                    }
                }
            </script>
</body>

</html>