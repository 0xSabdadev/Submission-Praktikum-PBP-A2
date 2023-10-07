<!DOCTYPE html>
<html lang="en">

<!-- Nama : Emerio Kevin Aryaputra -->
<!-- NIM : 24060121120012 -->
<!-- Lab : PBP A2 -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="http://localhost/pbp-prak-responsi/responsi/public/css/output.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<?php
require_once('../models/db_login.php');

if (isset($_POST['submit'])) {
    $valid = TRUE;

    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $jenis_kelamin = $_POST['jenis-kelamin'] ?? '';
    $alamat = test_input($_POST['alamat']);
    $provinsi = $_POST['provinsi'] ?? '';
    $kabupaten = $_POST['kabupaten'] ?? '';

    if ($nama == '') {
        $error_nama = 'Nama harus diisi';
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = 'Nama hanya berisi alfabet dan spasi';
        $valid = FALSE;
    }

    if ($email == '') {
        $error_email = 'Email harus diisi';
        $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = 'Format email tidak benar.';
        $valid = FALSE;
    }

    if ($jenis_kelamin == '') {
        $error_jenis_kelamin = 'Jenis kelamin harus diisi.';
        $valid = FALSE;
    }

    if ($alamat == '') {
        $error_alamat = 'Alamat harus diisi';
        $valid = FALSE;
    }

    if ($provinsi == '') {
        $error_provinsi = 'Provinsi harus diisi.';
        $valid = FALSE;
    }

    if ($kabupaten == '') {
        $error_kabupaten = 'Kabupaten harus diisi.';
        $valid = FALSE;
    }

    if ($valid) {
        $alamat = $db->real_escape_string($alamat);

        $queryInsert = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab)
                        VALUES ('$nama', '$email', '$jenis_kelamin', '$alamat', '$provinsi', '$kabupaten')
                        ";
        $resultInsert = $db->query($queryInsert);
        if (!$resultInsert) {
            $result_message = 'Input data gagal';
            die("Query error: " . $db->error);
        } else {
            $db->close();
            header('Location: http://localhost/pbp-prak-responsi/responsi/app/views/form_input_pendaftaran.php');
        }
    }
}
?>

<body style="max-width: 1000px; margin: auto; padding: 40px">
    <div class="card">
        <form class="space-y-6" id="form" action="http://localhost/pbp-prak-responsi/responsi/app/views/form_input_pendaftaran.php" method="POST">
            <h5 class="form-title">Daftarkan Dirimu</h5>
            <div>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="input-section" placeholder="Kang Haerin" value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>">
                <div id=" error-nama" class="danger-message" role="alert" <?= isset($error_nama) ? '' : 'hidden' ?>>
                    <?= $error_nama ?? '' ?>
                </div>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="input-section" placeholder="haerin@newjeans.com" oninput="getUser()" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                <div id="error-email" class="danger-message" role="alert" <?= isset($error_email) ? '' : 'hidden' ?>>
                    <?= $error_email ?? '' ?>
                </div>
            </div>
            <div>
                <label for=" jenis-kelamin" class="form-label">Jenis Kelamin</label>
                <div class="flex items-center mb-4">
                    <input id="laki-laki" type="radio" name="jenis-kelamin" value="Laki-Laki" class="input-radio" <?= isset($_POST['jenis-kelamin']) && $_POST['jenis-kelamin'] === 'Laki-Laki' ? 'checked' : '' ?>>
                    <label for="laki-laki" class="input-radio-label">Laki-Laki</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="perempuan" type="radio" name="jenis-kelamin" value="Perempuan" class="input-radio" <?= isset($_POST['jenis-kelamin']) && $_POST['jenis-kelamin'] === 'Perempuan' ? 'checked' : '' ?>>
                    <label for="perempuan" class="input-radio-label">Perempuan</label>
                </div>
                <div id="error-jenis-kelamin" class="danger-message" role="alert" <?= isset($error_jenis_kelamin) ? '' : 'hidden' ?>>
                    <?= $error_jenis_kelamin ?? '' ?>
                </div>
            </div>
            <div>
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" class="textarea-input" placeholder="Kantor ADOR"><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
                <div id="error-alamat" class="danger-message" role="alert" <?= isset($error_alamat) ? '' : 'hidden' ?>>
                    <?= $error_alamat ?? '' ?>
                </div>
            </div>
            <div>
                <label for="provinsi" class="form-label">Provinsi</label>
                <select id="provinsi" name="provinsi" class="select-input" oninput="getKabupaten(this.value)">
                    <option value="">-- Pilih Provinsi --</option>
                    <?php
                    require_once('../controllers/get_provinsi.php');
                    ?>
                </select>
                <div id="error-provinsi" class="danger-message" role="alert" <?= isset($error_provinsi) ? '' : 'hidden' ?>>
                    <?= $error_provinsi ?? '' ?>
                </div>
            </div>
            <div>
                <label for="kabupaten" class="form-label">Kabupaten</label>
                <select id="kabupaten" name="kabupaten" class="select-input">
                    <option value="" selected disabled>-- Pilih Kabupaten --</option>
                </select>
                <div id="error-kabupaten" class="danger-message" role="alert" <?= isset($error_kabupaten) ? '' : 'hidden' ?>>
                    <?= $error_kabupaten ?? '' ?>
                </div>
            </div>
            <button type="submit" name="submit" value="submit" id="submit-button" class="button" onclick="resetFormWithTimeout()">Tambahkan data</button>
            <div id="success-message" class="success-message" role="alert" <?= isset($success_message) ? '' : 'hidden' ?>>
                <?= $success_message ?? '' ?>
            </div>
        </form>
    </div>

    <script>
        function getUser() {
            const email = encodeURI(document.getElementById('email').value);
            const messageDiv = 'error-email';
            const url = `../controllers/get_user.php?email=${email}`;

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    const messageElement = document.getElementById(messageDiv);
                    messageElement.innerHTML = response;

                    if (response.includes('Email tersedia')) {
                        messageElement.classList.remove('danger-message');
                        messageElement.classList.add('success-message');
                    } else {
                        messageElement.classList.remove('success-message');
                        messageElement.classList.add('danger-message');
                    }

                    messageElement.style.display = 'block';
                },
                error: function() {
                    console.error('AJAX error');
                }
            });

            return false;
        }

        function getKabupaten(kode_prov) {
            const selectHolder = 'kabupaten';
            const url = `../controllers/get_kabupaten.php?kode_prov=${kode_prov}`;

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    document.getElementById(selectHolder).innerHTML = response;
                },
                error: function() {
                    console.error('AJAX error');
                }
            });

            return false;
        }

        function resetFormWithTimeout() {
            setTimeout(function() {
                document.getElementById('form').reset(); // Ganti 'form' dengan ID form Anda
                document.getElementById('success-message').style.display = 'none'; // Sembunyikan pesan sukses
            }, 3000);
        }
    </script>
</body>

</html>