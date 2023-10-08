/*Nida' Naafilatul Haniifah
24060121120039
*/


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body>
    <?php 
        if(isset($_POST['submit'])){
            //Validasi nis : tidak boleh kosong, hanya berisi angka 0...9
            $nis = test_input($_POST['nis']);
            if($nis==""){
                $error_nis = "NIS harus diisi";
            }
            elseif(!preg_match("/^[0-9]*$/",$nis)){
                $error_nis = "nis hanya dapat berisi angka 0-9";
            }
            //Validasi nama : tidak boleh kosong, hanya berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if(empty($nama)){
                $error_nama = "Nama harus diisi";
            }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
            //validasi jenis kelamin : tidak boleh kosong
            $jenis_kelamin = $_POST['jenisKelamin'];
            if($jenis_kelamin==''){
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
            //validasi kelas : tidak boleh kosong
            $kelas = $_POST['kelas'];
            if($kelas==''){
                $error_kelas = "Kelas harus diisi";
            }
            //validasi ekstrakurikuler : tidak boleh kosong jika kelas X dan XI
            $ekstrakurikuler = $_POST['ekstrakurikuler'];
            if(empty($ekstrakurikuler)){
                $error_ekstrakurikuler = "Ekstrakurikuler harus diisi, minimal 1";
            }else if(sizeof($ekstrakurikuler) > 3){
                $error_ekstrakurikuler = "Ekstrakurikuler yang dipilih maksimal 3";
            }

        }
        function test_input($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }    
    ?>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto ">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Form Mahasiswa    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form name="formInputMahasiswa" class="space-y-4 md:space-y-6" action="#" method="POST">
                        <div>
                            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS:</label>
                            <input type="number" name="nis" id="nis" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value ="<?php if(isset($nis)) {echo $nis;} ?>">
                            <div class="error"><?php if(isset($error_nis)) echo $error_nis; ?></div>
                        </div>
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php if(isset($nama)) {echo $nama;} ?>">
                            <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
                        </div>
                        <div>
                            <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin:</label>
                            <div class="flex items-center">
                                <input id="pria" type="radio" value="pria" name="jenisKelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "pria") {echo "checked";} ?>>
                                <label for="pria" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                            </div>
                            <div class="flex items-center">
                                <input id="wanita" type="radio" value="wanita" name="jenisKelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "wanita") {echo "checked";} ?>>
                                <label for="wanita" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                            </div>
                            <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                        </div>
                        <div>
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas:</label>
                            <select name="kelas" id="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="get_kelas()">
                                <option selected disabled>---Pilih Kelas----</option>
                                <option value="x" <?php if(isset($kelas) && $kelas == "x") {echo "selected='true'";} ?>>X</option>
                                <option value="xi" <?php if(isset($kelas) && $kelas == "xi") {echo "selected='true'";} ?>>XI</option>
                                <option value="xii" <?php if(isset($kelas) && $kelas == "xii") {echo "selected='true'";} ?>>XII</option>
                            </select>
                            <div class="error"><?php if(isset($error_kelas)) echo $error_kelas; ?></div>
                        </div>
                        <div style="display:none;" id="ekskul">
                            <label for="ekstrakurikuler" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ekstrakurikuler:</label>
                            <div class="flex items-center">
                                <input id="pramuka" type="checkbox" value="pramuka" name="ekstrakurikuler[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($ekstrakurikuler) && in_array('pramuka',$ekstrakurikuler)) {echo "checked";} ?>>
                                <label for="pramuka" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pramuka</label>
                            </div>
                            <div class="flex items-center">
                                <input id="seni_tari" type="checkbox" value="seni_tari" name="ekstrakurikuler[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($ekstrakurikuler) && in_array('seni_tari',$ekstrakurikuler)) {echo "checked";} ?>>
                                <label for="seni_tari" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seni Tari</label>
                            </div>
                            <div class="flex items-center">
                                <input id="sinematografi" type="checkbox" value="sinematografi" name="ekstrakurikuler[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($ekstrakurikuler) && in_array('sinematografi',$ekstrakurikuler)) {echo "checked";} ?>>
                                <label for="sinematografi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinematografi</label>
                            </div>
                            <div class="flex items-center">
                                <input id="basket" type="checkbox" value="basket" name="ekstrakurikuler[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($ekstrakurikuler) && in_array('basket',$ekstrakurikuler)) {echo "checked";} ?>>
                                <label for="basket" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Basket</label>
                            </div>
                            <div class="error"><?php if(isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                        </div>
                        <!-- <div>
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" onchange="get_kategori()">
                                <option value="">--Pilih Kategori--</option>
                                <option value="baju">Baju</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="alat_tulis">Alat Tulis</option>
                            </select>
                        </div>
                        <div>
                        <label for="sub_kategori">Sub Kategori</label>
                            <select name="sub_kategori" id="sub_kategori">
                                <option value="o">--Pilih Sub Kategori--</option>
                            </select>
                        </div> -->
                        <div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" name="submit" value="submit" >Submit</button>
                            <button type="reset" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        if(isset($_POST['submit'])){
            echo "<h3>Your Input:</h3>";
            echo 'NIS =' .$_POST['nis']. '<br />';
            echo 'Nama =' .$_POST['nama']. '<br />';
            echo 'Jenis Kelamin =' .$_POST['jenisKelamin']. '<br />';
            echo 'Kelas =' .$_POST['kelas']. '<br />';
            // echo 'Minat = ' .$_POST['minat']. '<br />';

            $ekstrakurikuler = $_POST['ekstrakurikuler'];
            if(!empty($ekstrakurikuler)){
                echo 'Ekstrakurikuler yang dipilih: ';
                foreach($ekstrakurikuler as $ekstrakurikuler_item){
                    echo '<br />' .$ekstrakurikuler_item;
                }
            }
        }
    ?>
    <script>
        function get_kelas(){
            const kelas = document.forms['formInputMahasiswa']['kelas'];
            const ekskul = document.getElementById('ekskul');

            if (kelas.value == 'x' || kelas.value == 'xi') {
                    ekskul.style.display = 'block';
            }else {
                    ekskul.style.display = 'none';
            }
        }
    </script>
</body>
</html>