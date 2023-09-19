<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #judul {
            text-align: center; /* Rata tengah */
            font-family: "Arial", sans-serif; /* Ganti jenis font */
        }
        body {
            background-color: #f5f0e1; /* Warna background krem */
            background-image: radial-gradient(circle, #abcb73 5%, transparent 5%);
            background-size: 50px 50px; /* Jarak antara lingkaran */
        }

        .container {
            background-color: #efe0c8; /* Warna background krem lebih gelap */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Warna tombol */
        .btn-primary {
            background-color: #0056b3 !important; /* Warna background biru tombol */
            border-color: #0056b3 !important; /* Warna border biru tombol */
        }

        /* Warna tombol reset */
        .btn-danger {
            background-color: #dc3545 !important; /* Warna background merah tombol reset */
            border-color: #dc3545 !important; /* Warna border merah tombol reset */
        }

        /* Warna teks pada label radio dan checkbox */
        .form-check-label {
            color: black; /* Warna teks putih untuk label radio dan checkbox */
        }

        .form-control {
            color: black; /* Warna teks hitam */
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 id="judul">Form Input Data Mahasiswa</h2>
    <form method="POST" autocomplete="on" action="">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="kota">Kota / Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="Semarang">Semarang</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
            </select>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
            </label>
        </div>
        <br>
        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
            </label>
        </div>
        <br>

        <!-- submit, reset, dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>

    <?php
    if (isset($_POST["submit"])) {
        echo "<h3>Your Input:</h3>";
        echo 'Nama = ' . $_POST['nama'] . '<br />';
        echo 'Email = ' . $_POST['email'] . '<br />';
        echo 'Kota = ' . $_POST['kota'] . '<br />';
        echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';

        $minat = $_POST['minat'];
        if (!empty($minat)){
            echo 'Peminatan yang dipilih: <br />';
            foreach ($minat as $minat_item) {
                echo $minat_item.'<br />';
            }
        }
    }
    ?>
</body>
</html>