<!-- 
    Nama       : Duma Mora Arta Sitorus
    NIM        : 24060121120004
    Lab        : A2
    Nama-File  : user_form_post.php
    Keterangan : Membaca isi form dengan PHP menggunakan method POST
 -->
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa 2</title>
    <link rel="stylesheet" href="style/mystyle.css">
</head>
<body>
    <div class="container">
        <div class="form-title">Form Mahasiswa</div>
        <form method="post" autocomplete="on" action="">
            <div class = "form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="kota">Kota/Kabupaten:</label>
                <select name="kota" id="kota" class="form-control1">
                    <option value="" selected disable>-- Pilih Kota Kabupaten --</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
            </div>

            <label class="check">Jenis kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">
                    Pria
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">
                    Wanita
                </label>
            </div>
            <br />

            <label class="check">Peminatan:</label>
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
            <br />

            <!-- submit, reset dan button -->
            <button type="submit" class="btn-primary" name="submit">Submit</button>
            <button type="reset" class="btn-danger">Reset</button>
        </form>  
    </div>

    <div class="inputan">
        <?php
            if (isset($_POST["submit"])) {
                echo "<h2>Your Input:</h2>";
                echo 'Nama = '.$_POST['nama'].'</br>';
                echo 'Email = '.$_POST['email'].'</br>';
                echo 'Kota = '.$_POST['kota'].'</br>';

                if (isset($_POST['jenis_kelamin'])) {
                    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
                }else{
                    echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
                }
                
                if (!empty($_POST['minat'])) {
                    echo 'Peminatan yang dipilih: ';
                    foreach ($_POST['minat'] as $minat_item) {
                        echo '<br />- '.$minat_item;
                    }
                }else{
                    echo '<span class="teks-merah">Anda belum memilih Peminatan !</br></span>';
                }
            }
        ?>
    </div>
</body>
</html>