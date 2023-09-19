<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <title>Form</title>
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

        $error_nis = $error_nama = $error_jenis_kelamin = $error_kelas = $error_ekstrakurikuler = "";

        if (isset($_POST['submit'])) {
            // validasi NIS
            $NIS = test_input($_POST['nis']);
            if (empty($NIS)) {
                $error_nis = "You must fill your NIS";
            } elseif (!preg_match("/^[0-9]*$/", $NIS)) {
                $error_nis = "Nis format is not correct";
            }

            // Validasi Nama
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = 'You must fill your name';
            } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Names can only contain letters and Spaces";
            }

            // Validasi Jenis Kelamin
            $jenis_kelamin = $_POST['jenis_kelamin'];
            if (empty($jenis_kelamin)) {
                $error_jenis_kelamin = "You must fill gender";
            }

            // Validasi Kelas
            $kelas = $_POST['kelas'];
            $ekstrakurikuler = $_POST['ekstrakurikuler'];
            if (empty($kelas) || $kelas == 'kelas') {
                $error_kelas = "You must fill the class";
            } else if ($kelas == 'X' || $kelas == 'XI') {
                if (empty($ekstrakurikuler)) {
                    $error_ekstrakurikuler = "Extracurriculars should be selected at least 1 maximum 3";
                } else if (count($ekstrakurikuler) > 3) {
                    $error_ekstrakurikuler = "Extracurriculars, three Max";
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

   
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
               <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white"> 
               </a>
               <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                   <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                       <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                           Form Input Mahasiswa
                       </h1>
                       <form id="formDataProduk" method="POST" autocomplete="on"  class="space-y-4 md:space-y-5" action="#">
                           <!-- NIS -->
                           <div>
                               <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS: </label>
                               <input type="text" name="nis" id="nis" minlength="10" maxlength="10" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="<?php if (isset($nis)) {echo $nis;} ?>"required="">
                               <div class="error"><?php if (isset($error_nis)) {echo $error_nis;} ?></div>
                           </div>

                           <!-- Nama -->
                           <div>
                               <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:</label>
                               <input type="text" name="nama" id="nama" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="<?php if (isset($nama)) {echo $nama;} ?>"required="">
                               <div class="error"><?php if (isset($error_nama)) {echo $error_nama;} ?></div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                              <label>Jenis Kelamin: </label>
                               <div class="flex items-center mb-4">
                                   <input id="jenis_kelamin" type="radio" value="pria" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                   <label for="jenis_kelamin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked"; ?>>Pria</label>
                               </div>
                               <div class="flex items-center">
                                   <input id="jenis_kelamin" type="radio" value="wanita" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                   <label for="jenis_kelamin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked"; ?>>Wanita</label>
                               </div>
                               <div class="error"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                           </div>

                           <!-- Kelas -->
                           <div>
                               <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas:</label>
                               <select name="kelas" id="kelas" onchange="show()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                   <option value="kelas" <?php if (isset($kelas) && $kelas == "kelas") {echo 'selected="true"';}?>>Pilih kelas</option>
                                   <option value="X" <?php if (isset($kelas) && $kelas == "X") {echo 'selected="true"';} ?>>X</option>
                                   <option value="XI" <?php if (isset($kelas) && $kelas == "XI") {echo 'selected="true"';} ?>>XI</option>
                                   <option value="XII"<?php if (isset($kelas) && $kelas == "XII") {echo 'selected="true"';} ?>>XII</option>
                               </select>
                               <div class="error"><?php if (isset($error_kelas)) {echo $error_kelas;} ?></div>
                           </div>

                           <!-- Ekstrakulikuler -->
                          <div id="ekstrakurikuler">
                               <label>Ekstrakurikuler: </label>
                               <div class="flex items-center mb-1">
                                   <input type="checkbox" name="ekstrakurikuler[]" value="pramuka" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if (isset($ekstrakurikuler) && in_array('pramuka', $ekstrakurikuler)) {echo 'checked';} ?>>
                                   <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pramuka</label>
                               </div>
                               <div class="flex items-center">
                                   <input type="checkbox" name="ekstrakurikuler[]" value="seniTari" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if (isset($ekstrakurikuler) && in_array('seniTari', $ekstrakurikuler)) {echo 'checked';} ?>>
                                   <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seni Tari</label>
                               </div>
                               <div class="flex items-center">
                                   <input type="checkbox" name="ekstrakurikuler[]" value="sinematografi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if (isset($ekstrakurikuler) && in_array('sinematografi', $ekstrakurikuler)) {echo 'checked';} ?>>
                                   <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinematografi</label>
                               </div>
                               <div class="flex items-center">
                                   <input type="checkbox" name="ekstrakurikuler[]" value="basket" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if (isset($ekstrakurikuler) && in_array('basket', $ekstrakurikuler)) {echo 'checked';} ?>>
                                   <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Basket</label>
                               </div>
                               <div class="error"><?php if (isset($error_ekstrakurikuler)) {echo $error_ekstrakurikuler;} ?></div>
                           </div>

                           <!-- Submit dan Reset -->
                           <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit" value="submit">Submit</button>
                           <button type="reset" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" name="reset" value="reset">Reset</button>
                       </form>
                   </div>
               </div>
        </div>
    </section>
</body>
</html>