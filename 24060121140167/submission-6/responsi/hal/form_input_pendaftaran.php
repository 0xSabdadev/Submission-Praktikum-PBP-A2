<?php
// Agung Surya Permana
// 24060121140167

include('header.php');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

// Respon ketika nama kosong
if (isset($_POST['submit'])) {
  $submit = true;
  if (empty($_POST['nama'])) {
    $error_nama = "Nama tidak boleh kosong";
    $submit = false;
  } else {
    $nama = $db->real_escape_string(trim($_POST['nama']));
  }

  // Notif ketika email kosong ,tidak valid, dan sudah terdaftar
  if (empty($_POST['email'])) {
    $error_email = "Email tidak boleh kosong";
    $submit = false;
  } else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error_email = "Email tidak valid";
      $submit = false;
    } else {
      $email = $db->real_escape_string(trim($_POST['email']));
      $query = "SELECT * FROM tb_user WHERE email = '$email'";
      $result = $db->query($query);
      if ($result->num_rows > 0) {
        $error_email = "Email sudah terdaftar";
        $submit = false;
      }
    }
  }

  // Notif jika gender kosong
  if (empty($_POST['gender'])) {
    $error_gender = "Gender tidak boleh kosong";
    $submit = false;
  } else {
    $gender = $db->real_escape_string(trim($_POST['gender']));
  }

  // Notif jika alamat kosong
  if (empty($_POST['alamat'])) {
    $error_alamat = "Alamat tidak boleh kosong";
    $submit = false;
  } else {
    $alamat = $db->real_escape_string(trim($_POST['alamat']));
  }

  // Notif jika prov kosong
  if (empty($_POST['provinsi'])) {
    $error_provinsi = "Provinsi tidak boleh kosong";
    $submit = false;
  } else {
    $provinsi = $db->real_escape_string(trim($_POST['provinsi']));
  }

  // Notif jika prov kosong
  if (empty($_POST['kabupaten'])) {
    $error_kabupaten = "Kabupaten tidak boleh kosong";
    $submit = false;
  } else {
    $kabupaten = $db->real_escape_string(trim($_POST['kabupaten']));
  }

  // Ketika seluruh data benar, maka data akan dimasukan ke db lalu mengosongkan inputan
  if ($submit) {
    $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$gender', '$alamat', $provinsi, $kabupaten)";
    $result = $db->query($query);

    if (!$result) {
      $success = false;
      $error_message = "Gagal mendaftar!";
    } else {
      $success = true;
      $nama = "";
      $email = "";
      $gender = "";
      $alamat = "";
      $provinsi = "";
      $kabupaten = "";
    }
    $db->close();
  }
}
?>

<div class="card">
  <!-- Notif/Pesan jika berhasil/success -->
  <?php if (isset($success)) : ?>
    <?php if ($success) : ?>
      <div class="alert alert-success" role="alert">
        Selamat pendaftaran anda berhasil
      </div>
    <?php else : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error_message ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="card-header">Formulir Pendaftaran</div>
  <div class="card-body">
    <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
    <form name="daftar" method="POST" action="">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control">
        <div id="error_name" style="color: red;">
          <?php if (isset($error_nama))  echo $error_nama ?>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <!-- TODO 4 : buatlah cek email menggunakan ajax -->
        <input type="email" name="email" id="email" class="form-control" oninput="getUser()" value="<?php if (isset($email)) echo $email; ?>">
        <div id="error_email" style="color: red;">
          <?php if (isset($error_email))  echo $error_email ?>
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
        <?php if (isset($error_gender))  echo $error_gender ?>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
        <div id="error_alamat" style="color: red;">
          <?php if (isset($error_alamat))  echo $error_alamat ?>
        </div>
      </div>
      <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <select onchange="getKabupaten(this.value)" name="provinsi" id="provinsi" class="form-control">
          <option value="">Pilih Provinsi</option>
          <?php require_once('get_provinsi.php'); ?>
        </select>
        <div id="error_provinsi" style="color: red;">
          <?php if (isset($error_provinsi))  echo $error_provinsi ?>
        </div>
      </div>
      <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <select name="kabupaten" id="kabupaten" class="form-control">
          <option value="">Pilih kabupaten</option>
          <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
        </select>
        <div id="error_kabupaten" style="color: red;">
          <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
        </div>
      </div>
      <br>
      <button id="submit" type="submit" name="submit" value="submit" class="btn btn-primary container-fluid">Daftar</button>
    </form>
  </div>
</div>

<?php include('footer.php') ?>