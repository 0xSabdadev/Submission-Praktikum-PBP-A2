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
            //Validasi nama : tidak boleh kosong, hanya berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if(empty($nama)){
                $error_nama = "Nama harus diisi";
            }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
            //Validasi email : tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if($email==''){
                $error_email = "Email harus diisi";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "Format email tidak benar";
            }
            //Validasi alamat : tidak boleh kosong
            $alamat = test_input($_POST['alamat']);
            if($alamat==''){
                $error_alamat = "alamat harus diisi";
            }
            //validasi jenis kelamin : tidak boleh kosong
            $jenis_kelamin = $_POST['jenisKelamin'];
            if($jenis_kelamin==''){
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
            //validasi Kota : tidak boleh kosong
            $kota = $_POST['kota'];
            if($kota==''){
                $error_kota = "Kota harus diisi";
            }
            //validasi minat : tidak boleh kosong
            $minat = $_POST['minat'];
            if(empty($minat)){
                $error_minat = "Peminatan harus diisi";
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
                    <form class="space-y-4 md:space-y-6" action="#" method="POST">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <div class="error"><?php if(isset($error_email)) echo $error_email; ?></div>
                        </div>
                        <div>                           
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat :</label>
                            <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
                            <div class="error"><?php if(isset($error_alamat)) echo $error_alamat; ?></div>
                        </div>
                        <div>
                            <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/ Kabupaten:</label>
                            <select name="kota" id="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>---Pilih Kabupaten/ Kota----</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                            <div class="error"><?php if(isset($error_kota)) echo $error_kota; ?></div>
                        </div>
                        <div>
                            <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin:</label>
                            <div class="flex items-center">
                                <input id="pria" type="radio" value="pria" name="jenisKelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="pria" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                            </div>
                            <div class="flex items-center">
                                <input id="wanita" type="radio" value="wanita" name="jenisKelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="wanita" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                            </div>
                            <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                        </div>
                        <div>
                            <label for="peminatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peminatan:</label>
                            <div class="flex items-center">
                                <input id="coding" type="checkbox" value="coding" name="minat[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="coding" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Coding</label>
                            </div>
                            <div class="flex items-center">
                                <input id="uiDesign" type="checkbox" value="uiDesign" name="minat[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="uiDesign" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">UI Design</label>
                            </div>
                            <div class="flex items-center">
                                <input id="dataScience" type="checkbox" value="dataScience" name="minat[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="dataScience" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data Science</label>
                            </div>
                            <div class="error"><?php if(isset($error_minat)) echo $error_minat; ?></div>
                        </div>
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
            echo 'Nama =' .$_POST['nama']. '<br />';
            echo 'Email =' .$_POST['email']. '<br />';
            echo 'Kota =' .$_POST['kota']. '<br />';
            echo 'Jenis Kelamin =' .$_POST['jenisKelamin']. '<br />';
            // echo 'Minat = ' .$_POST['minat']. '<br />';

            $minat = $_POST['minat'];
            if(!empty($minat)){
                echo 'Peminatan yang dipilh: ';
                foreach($minat as $minat_item){
                    echo '<br />' .$minat_item;
                }
            }
        }
    ?>
</body>
</html>