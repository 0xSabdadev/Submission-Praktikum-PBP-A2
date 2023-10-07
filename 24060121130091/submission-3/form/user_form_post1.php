<!--
File      : user_form_post1.php		17/09/23
Penulis   : Fa'iq Rindha Maulana / 24060121130091
Deskripsi : implementasi modul pertemuan 3 (user_form_post1)
-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Mahasiswa</title>
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
    if (isset($_POST['submit'])) {
        //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }

        //validasi email: tidak boleh kosong, format harus benar
        $email = test_input($_POST['email']);
        if ($email == '') {
            $error_email = "Email harus diisi";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = "Format email tidak benar";
        }

        //validasi alamat: tidak boleh kosong
        $alamat = test_input($_POST['alamat']);
        if ($alamat == '') {
            $error_alamat = "Alamat harus diisi";
        }

        //validasi jenis kelamin: tidak boleh kosong
        if (!isset($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        //validasi kota: tidak boleh kosong
        if (!isset($_POST['kota'])) {
            $error_kota = "Kota harus diisi";
        }

        //validasi minat: tidak boleh kosong
        if (!isset($_POST['minat'])) {
            $error_minat = "Minat harus diisi";
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
        <div class="card-header">Form Mahasiswa</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                    <div class="error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <div class="error text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                    <div class="error text-danger"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
                </div>
                <div class="form-group">
                    <label for="kota">Kota/ Kabupaten:</label>
                    <select id="kota" name="kota" class="form-control">
                    <option value="" selected disabled>-- Pilih Kota/kabupaten --</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                    </select>
                    <div class="error text-danger"><?php if (isset($error_kota)) echo $error_kota; ?></div>
                </div>
                <label>Jenis Kelamin:</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
                    </label>
                    <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
                    </label>
                    <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                </div>
                <br>
                <label>Peminatan:</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="coding">coding
                    </label>
                    <div class="error text-danger"><?php if (isset($error_minat)) echo $error_minat; ?></div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
                    </label>
                    <div class="error text-danger"><?php if (isset($error_minat)) echo $error_minat; ?></div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
                    </label>
                    <div class="error text-danger"><?php if (isset($error_minat)) echo $error_minat; ?></div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary" name="submit" value="submit">submit
                </button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>

        <?php
        if (isset($_POST["submit"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["alamat"]) && isset($_POST["jenis_kelamin"]) && isset($_POST["kota"]) && isset($_POST["minat"])) {
            echo "<h3>Your Input:</h3>";
            echo 'Nama = ' . $_POST['nama'] . '<br />';
            echo 'Email = ' . $_POST['email'] . '<br />';
            echo 'Kota = ' . $_POST['kota'] . '<br />';
            echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';

            $minat = $_POST['minat'];
            if (!empty($minat)) {
                echo 'Permintaan yang dipilih: ';
                foreach ($minat as $minat_item) {
                    echo '<br />' . $minat_item;
                }
            }
        }
        ?>

</html>