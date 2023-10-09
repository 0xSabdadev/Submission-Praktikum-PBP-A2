<?php
// Nama : Ardian Fajar Widyaputra
// Nim  : 24060121140116
// lab  : A2

include('header.html');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    $nama = $_POST['nama'];
    if (empty($nama)) {
        $errors['nama'] = "Nama tidak boleh kosong";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $errors['nama'] = "Nama hanya dapat berisi huruf dan spasi";
    }

    // Validasi Email
    $email = $_POST['email'];
    if (empty($email)) {
        $errors['email'] = "Email tidak boleh kosong";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak benar";
    } else {
        $query = "SELECT * FROM tb_user WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $errors['email'] = "Email sudah terdaftar!";
        }
    }

    // Validasi Jenis Kelamin
    $jenis_kelamin = '';
    if(empty( $_POST['jenis_kelamin'])){
        if(empty( $_POST['jenis_kelamin'])){ 
            $error_jenis_kelamin = "<span style='color: red;'>*Jenis kelamin harus dipilih</span>";
        }
    }
    // Validasi Alamat
    $alamat = $_POST['alamat'];
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat tidak boleh kosong";
    }

    // Validasi Provinsi
    $provinsi = $_POST['provinsi'];
    if (empty($provinsi)) {
        $errors['provinsi'] = "Provinsi harus dipilih";
    }

    // Validasi Kabupaten
    $kabupaten = isset($_POST['kabupaten']) ? $_POST['kabupaten'] : '';
    if (empty($kabupaten)) {
        $errors['kabupaten'] = "Kabupaten harus dipilih";
    }

    // Jika tidak ada error, masukkan data ke database
    if (empty($errors)) {
        $nama = $db->real_escape_string($nama);
        $email = $db->real_escape_string($email);
        $jenis_kelamin = $db->real_escape_string($jenis_kelamin);
        $alamat = $db->real_escape_string($alamat);
        $provinsi = $db->real_escape_string($provinsi);
        $kabupaten = $db->real_escape_string($kabupaten);

        $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssssss", $nama, $email, $jenis_kelamin, $alamat, $provinsi, $kabupaten);

        if ($stmt->execute()) {
            echo '<script>alert("Data berhasil disimpan.");</script>';
        } else {
            echo '<span style="color: red;">Pendaftaran Gagal</span>';
        }
    }
}
?>

<div class="card">
    <div class="card-header">Form Input Pendaftaran</div>
    <div class="card-body">
        <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
        <form name="daftar" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
                <div id="error_name" style="color: red;">
                    <?php if (isset($errors['nama'])) echo $errors['nama']; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <!-- TODO 4 : buatlah cek email menggunakan ajax -->
                <input type="email" name="email" id="email" class="form-control" oninput="getUser()">
                <div id="error_email" style="color: red;">
                    <?php if (isset($errors['email'])) echo $errors['email']; ?>
                </div>
            </div>
            <label>Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Laki-laki">Laki-laki
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Perempuan">Perempuan
                </label>
            </div>
            <div id="error_gender" style="color: red; margin-bottom: 12px;">
                <?php if (isset($errors['gender'])) echo $errors['gender']; ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                <div id="error_alamat" style="color: red;">
                    <?php if (isset($errors['alamat'])) echo $errors['alamat']; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select onchange="getKabupaten(this.value)" name="provinsi" id="provinsi" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    <?php require_once('get_provinsi.php'); ?>
                </select>
                <div id="error_provinsi" style="color: red;">
                    <?php if (isset($errors['provinsi'])) echo $errors['provinsi']; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <select name="kabupaten" id="kabupaten" class="form-control">
                    <option value="">Pilih Kabupaten</option>
                </select>
                <div id="error_kabupaten" style="color: red;"></div>
            </div>


            <br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary container-fluid">Daftar</button>
        </form>
    </div>
</div>
<script src="ajax.js"></script>
<?php include('footer.html') ?>