<!-- 
Nama : Dorino Baharson
NIM : 24060121130090
File : index.php
Deskripsi : Tugas Form Mahasiswa menggunakan php
-->


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body>
    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;
    }

    //Validasi nis hanya boleh karakter 0-9
    if (isset($_POST['submit'])) {
        $nis = test_input($_POST['nis']);
        $nis = $_POST['nis'];
        if (!preg_match("/^[0-9]*$/",$nis)) {
            $error_nis = "NIS hanya boleh input angka";
        }elseif(
            empty($_POST['nis'])){
            $error_nis = "NIS tidak boleh kosong";
        }elseif(strlen($_POST['nis']) != 10){
            $error_nis = "NIS terdiri dari 10 angka";
    }
    //Validasi nama harus diisi
    $nama = test_input($_POST['nama']);
    $nama = $_POST['nama'];
    if (empty($_POST['nama'])) {
        $error_nama = "Nama tidak boleh kosong";
    
    //Validasi jenis kelamin harus dipilih
    if(!isset($_POST['jenis_kelamin'])){
        $error_jenis_kelamin = "\nJenis kelamin harus diisi";
    }else{
        $jenis_kelamin = $_POST['jenis_kelamin'];
    }

    $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : array();


    //Pengecekan siswa kelas berapa jika kelas 12 maka tidak boleh memilih ekstrakurikuler jika kelas 10 dan 11 harus memilih ekstrakurikuler minimal 1 maksimal 3
    if (isset($_POST['kelas']) || isset($_POST['ekstrakurikuler'])) {
        $kelas = $_POST['kelas'];
        if (isset($_POST['ekstrakurikuler'])){
            $ekstrakurikuler = $_POST['ekstrakurikuler'];
        }
    
        if ($kelas == "XII") {
            if (!empty($ekstrakurikuler)) {
                $error_ekstrakurikuler = "\nEkstrakurikuler tidak boleh dipilih";
            }
        } elseif ($kelas == "XI" || $kelas == "X") {
            $ekstrakurikuler = $_POST['ekstrakurikuler'];
            if (empty($ekstrakurikuler)) {
                $error_ekstrakurikuler = "\nEkstrakurikuler minimal 1";
            } elseif (count($ekstrakurikuler) > 3) {
                $error_ekstrakurikuler = "\nEkstrakurikuler maksimal 3";
            }
        }
    }
    
    if(isset($_POST['reset'])) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    
}}
    ?>
    <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto ">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="./R.png" alt="logo">
            Form Mahasiswa    
        </a>
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">

            Tugas Praktikum Pembelajaran Berbasis Web   
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form class="space-y-4 md:space-y-6" action="" method="POST">

                    <!-- Sub-Form NIS -->

                    <div>
                        <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input type="text" name="nis" id="nis"value="<?php if (isset($_POST['nis'])) echo $_POST['nis']; ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                            focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        <div class="error text-danger" style="color: red;"><?php if (isset($error_nis)) echo $error_nis; ?></div>
                    </div>

                    <!-- Sub-Form  Nama-->

                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name = "nama" id="nama" required="" <?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 
                            focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <div class="error text-danger" style="color: red;"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                    </div>

                    <!-- Sub-Form Jenis Kelamin -->

                    <div>
                        <label class = "ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Jenis Kelamin :</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="pria" type="radio" value="pria" name="jeniskelamin" <?php if (isset($_POST['jeniskelamin']) && $_POST['jeniskelamin'] == 'pria') echo 'checked' ?> required=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 
                            dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="pria" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 \br">Pria</label>
                        
                    </div>
                    <div class="flex items-center">
                        <input id="wanita" type="radio" value="wanita" name="jeniskelamin" <?php if (isset($_POST['jeniskelamin']) && $_POST['jeniskelamin'] == 'wanita') echo 'checked' ?> required=""
                            dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wanita" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                        
                    </div>
                    <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>

                    <!-- Sub-Form Kelas -->

                    <div>
                        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>-- Pilih Kelas --</option>
                            <option value="X" <?php if (isset($_POST['kelas'])) echo 'selected'?>>X</option>
                            <option value="XI"  <?php if (isset($_POST['kelas'])) echo 'selected'?>>XI</option>
                            <option value="XII" <?php if (isset($_POST['kelas'])) echo 'selected'?>>XII</option>
                        </select>
                    </div>

                    <!-- Sub-Form Ekstrakurikuler -->

                    <div>
                        <label class = "ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Ekstrakurikuler:</label>
                    </div>                    
                    <div class="flex items-center mb-2">
                    <input id="pramuka" type="checkbox" value="pramuka" name="ekstrakurikuler[]" <?php if (isset($_POST ['ekstrakurikuler']) && in_array('pramuka', $_POST['ekstrakurikuler'])) echo 'checked' ?>
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                        dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="pramuka" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pramuka</label>
                        
                    </div>
                    <div class="flex items-center mb-2">
                        <input  id="senitari" type="checkbox" value="senitari" name="ekstrakurikuler[]" <?php if (isset($_POST ['ekstrakurikuler']) && in_array('senitari', $_POST['ekstrakurikuler'])) echo 'checked' ?>
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 
                            rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="senitari" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seni Tari</label>
                        
                    </div>
                    <div class="flex items-center mb-2">
                        <input  id="sinematografi" type="checkbox" value="sinematografi" name="ekstrakurikuler[]" <?php if (isset($_POST ['ekstrakurikuler']) && in_array('sinematografi', $_POST['ekstrakurikuler'])) echo 'checked' ?>
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded 
                            focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="sinematografi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinematografi</label>
                        
                    </div>
                    <div class="flex items-center mb-2">
                        <input  id="Basket" type="checkbox" value="basket" value="ekstrakurikuler[]"  <?php if (isset($_POST ['ekstrakurikuler']) && in_array('basket', $_POST['ekstrakurikuler'])) echo 'checked' ?>
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 
                            rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="Basket" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Basket</label>
                        
                    </div>
                    <div class="error text-danger"style="color: red;"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler?></div>
                    <!-- Sub-Form Tombol -->


                    <div>
                        <button type="submit" name="reset" value="reset" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 
                            font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reset</button>
                        <button type="submit" name="submit"value="submit"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                            font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                    </div>



                </form>
            </div>
        </div>
    </div>
    </section>

    <?php

    if (isset($_POST['submit']) && empty($error_nis) && empty($error_ekstrakurikuler) && empty($error_jeniskelamin)) {
        if (isset($_POST['submit'])) {
            echo "<h2>Hasil Input</h2>";
            echo "NIS : " . $_POST['nis'] . "<br/>";
            echo "Nama : " . $_POST['nama'] . "<br/>";
            if (isset($_POST['jeniskelamin'])){
                echo "Jenis Kelamin : " . $_POST['jeniskelamin'] . "<br/>";
            }
    
            if (isset($_POST['kelas'])) {
                echo "Kelas : " . $_POST['kelas'] . "<br/>";
            }

            if (!empty($_POST['ekstrakurikuler'])) {
                echo "Ekstrakurikuler : ";
                foreach ($_POST['ekstrakurikuler'] as $ekstrakurikuler) {
                    echo $ekstrakurikuler . " ";
                }
                echo "<br/>";
            }
        }
    }
    ?>

</body>
</html>