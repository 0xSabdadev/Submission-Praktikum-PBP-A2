<?php
// Nama : Reza Hilmi Dafa
// Nim  : 24060121130044
// lab  : A2

include('header.html');

require_once 'lib/db_login.php';

/*TODO 2 : Buatlah
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

// 1. server side validation
// Submit Response
if (isset($_POST['submit'])) {
    $submit = true;
  // Nama is empty
    if (empty($_POST['nama'])) {
    $error_nama = "Nama harus diisi";
    $submit = false;
    } else {
    $nama = $db->real_escape_string(trim($_POST['nama']));
    }

  // Email is empty
    if (empty($_POST['email'])) {
    $error_email = "Email harus diisi";
    $submit = false;
    } else {
    // Check email is valid
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error_email = "Email tidak valid";
        $submit = false;
    } else {
        $email = $db->real_escape_string(trim($_POST['email']));
      // Email is already registered
        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $result = $db->query($query);
    if ($result->num_rows > 0) {
        $error_email = "Email sudah terdaftar";
        $submit = false;
    }
    }
}

  // Gender is empty
if (empty($_POST['gender'])) {
    $error_gender = "Gender harus diisi";
    $submit = false;
} else {
    $gender = $db->real_escape_string(trim($_POST['gender']));
}

  // Alamat is empty
if (empty($_POST['alamat'])) {
    $error_alamat = "Alamat harus diisi";
    $submit = false;
} else {
    $alamat = $db->real_escape_string(trim($_POST['alamat']));
}

  // Provinsi is empty
if (empty($_POST['provinsi'])) {
    $error_provinsi = "Provinsi harus diisi";
    $submit = false;
} else {
    $provinsi = $db->real_escape_string(trim($_POST['provinsi']));
}

  // Kabupaten is empty
if (empty($_POST['kabupaten'])) {
    $error_kabupaten = "Kabupaten harus diisi";
    $submit = false;
} else {
    $kabupaten = $db->real_escape_string(trim($_POST['kabupaten']));
}

  // Submit is true, 2. insert new user
if ($submit) {
    $query = "INSERT INTO tb_user (nama, email, jenis_kelamin, alamat, kode_prov, kode_kab) VALUES ('$nama', '$email', '$gender', '$alamat', $provinsi, $kabupaten)";
    $result = $db->query($query);

    if (!$result) {
        $success = false;
        $error_message = "Gagal melakukan pendaftaran";
    } else {
        $success = true;
      // Clear all the input
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

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <!-- 3. tampilkan hasilnya error/berhasil -->
    <?php if (isset($success)) : ?>
        <?php if ($success) : ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                Berhasil melakukan pendaftaran
            </div>
        <?php else : ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <?php echo $error_message ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="mb-6">
        <div class="text-xl font-bold mb-2">Form Input Pendaftaran</div>
        <!-- TODO 3 : definisikan method dan actions pada tags <form> -->
        <form name="daftar" method="POST" action="">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="nama" id="nama" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($error_nama) ? 'border-red-500' : '' ?>">
                <div id="error_name" class="text-red-500 text-xs italic">
                    <?php if (isset($error_nama))  echo $error_nama ?>
                </div>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <!-- TODO 4 : buatlah cek email menggunakan ajax -->
                <input type="email" name="email" id="email" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($error_email) ? 'border-red-500' : '' ?>" oninput="getUser()" value="<?php if (isset($email)) echo $email; ?>">
                <div id="error_email" class="text-red-500 text-xs italic">
                    <?php if (isset($error_email))  echo $error_email ?>
                </div>
            </div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio <?php echo isset($error_gender) ? 'text-red-500' : '' ?>" name="gender" value="Laki-laki">
                    <span class="ml-2">Laki-laki</span>
                </label>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio <?php echo isset($error_gender) ? 'text-red-500' : '' ?>" name="gender" value="Perempuan">
                    <span class="ml-2">Perempuan</span>
                </label>
            </div>
            <div id="error_gender" class="text-red-500 text-xs italic">
                <?php if (isset($error_gender))  echo $error_gender ?>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($error_alamat) ? 'border-red-500' : '' ?>"></textarea>
                <div id="error_alamat" class="text-red-500 text-xs italic">
                    <?php if (isset($error_alamat))  echo $error_alamat ?>
                </div>
            </div>
            <div class="mb-4">
                <label for="provinsi" class="block text-gray-700 text-sm font-bold mb-2">Provinsi</label>
                <select onchange="getKabupaten(this.value)" name="provinsi" id="provinsi" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($error_provinsi) ? 'border-red-500' : '' ?>">
                    <option value="">--Pilih Provinsi--</option>
                    <?php require_once('get_provinsi.php'); ?>
                </select>
                <div id="error_provinsi" class="text-red-500 text-xs italic">
                    <?php if (isset($error_provinsi))  echo $error_provinsi ?>
                </div>
            </div>
            <div class="mb-4">
                <label for="kabupaten" class="block text-gray-700 text-sm font-bold mb-2">Kabupaten</label>
                <select name="kabupaten" id="kabupaten" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($error_kabupaten) ? 'border-red-500' : '' ?>">
                    <option value="">--Pilih Kabupaten--</option>
                    <!-- TODO 5 : tampilkan daftar kabupaten berdasarkan pilihan provinsi yang dipilih, menggunakan ajax -->
                </select>
                <div id="error_kabupaten" class="text-red-500 text-xs italic">
                    <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
                </div>
            </div>
            <br>
            <button id="submit" type="submit" name="submit" value="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full">Daftar</button>
        </form>
    </div>
</div>


<?php include('footer.html') ?>