<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
        crossorigin="anonymous">

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

    <title>Form Mahasiswa</title>
</head>

<body>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Form Mahasiswa</h5>
                <?php 
                    error_reporting(false); 

                    if(isset($_POST['submit'])){
                        // Validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
                        $nama = test_input($_POST['nama']);
                        if(empty($nama)){
                            $error_nama = "Nama harus diisi";
                        }
                        elseif(!preg_match("/^[a-zA-Z ]*$/", $nama)){
                            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
                        }

                        // Validasi email: tidak boleh kosong, format harus benar
                        $email = test_input($_POST['email']);
                        if($email == ''){
                            $error_email = "Email harus diisi";
                        }
                        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $error_email = 'Format email tidak benar';
                        }

                        // Validasi alamat: tidak boleh kosong
                        $alamat = test_input($_POST['alamat']);
                        if($alamat == ''){
                            $error_alamat = "Alamat harus diisi";
                        }

                        // Validasi jenis kelamin: tidak boleh kosong
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        if($jenis_kelamin == ''){
                            $error_jenis_kelamin = "Jenis kelamin harus diisi";
                        }

                        // Validasi kota: tidak boleh kosong
                        $kota = $_POST['kota'];
                        if($kota == '' || $kota == 'kota'){
                            $error_kota = "Kota harus diisi";
                        }

                        // Validasi minat: minimal satu minat harus dipilih
                        $minat = $_POST['minat'];
                        if(empty($minat)){
                            $error_minat = "Peminatan harus dipilih";
                        }

                    }

                    function test_input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                
                ?>

                <form method="POST" autocomplete="on" action="">
                    <!-- Masukkan elemen form di sini -->
                    <div class="form-group">
                        <label for="nama">Nama: </label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" placeholder="Tuliskan nama" required="">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@company.com" required="">
                        <div class="error"><?php if(isset($error_email)) echo $error_email; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Tuliskan alamat" required=""></textarea>
                        <div class="error"><?php if(isset($error_alamat)) echo $error_alamat; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota/Kabupaten:  </label>
                        <select name="kota" id="kota" class="form-control" required>
                            <option value="Semarang">Semarang</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                        </select>
                        <div class="error"><?php if(isset($error_kota)) echo $error_kota; ?></div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
                        </label>
                    </div>
                    <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    <label for="">Peminatan:</label>
                    <?php
                        $minat_options = array(
                            'coding' => 'Coding',
                            'ux_design' => 'UX Design',
                            'data_science' => 'Data Science'
                        );

                        foreach ($minat_options as $value => $label) {
                            echo '<div class="form-check">';
                            echo '<label class="form-check-label">';
                            echo '<input type="checkbox" class="form-check-input" name="minat[]" value="' . $value . '">' . $label;
                            echo '</label>';
                            echo '</div>';
                        }
                    ?>
                    <div class="error"><?php if(isset($error_minat)) echo $error_minat; ?></div>

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
                    echo "<h3>Your Input:</h3>";
                    echo 'Nama: '.$_POST['nama'].'<br/>';
                    echo 'Email: '.$_POST['email'].'<br/>';
                    echo 'Alamat: '.$_POST['alamat'].'<br/>';
                    echo 'Kota: '.$_POST['kota'].'<br/>';
                    echo 'Jenis Kelamin: '.$_POST['jenis_kelamin'].'<br/>';
                    echo 'Minat: '.$_POST['minat'].'<br/>';
                    
                    $minat = $_POST['minat'];
                    if(!empty($minat)){
                        echo'Peminatan yang dipilih:';
                        foreach($minat as $minat_item){
                            echo'<br/>'.$minat_item;
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
                var nama = document.getElementById('nama').value;
                var email = document.getElementById('email').value;
                var alamat = document.getElementById('alamat').value;
                var kota = document.getElementById('kota').value;
                var jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
                var minat = document.querySelectorAll('input[name="minat[]"]:checked');

                // Aktifkan tombol "Submit" hanya jika semua isian yang diperlukan telah diisi
                var submitButton = document.getElementById('submit-button');
                submitButton.disabled = !(nama && email && alamat && kota && jenisKelamin && minat.length > 0);
            }

            // Panggil checkFormValidity() saat nilai input berubah
            var formInputs = document.querySelectorAll('input, select, textarea');
            formInputs.forEach(function(input) {
                input.addEventListener('input', checkFormValidity);
            });
        </script>

</body>

</html>
