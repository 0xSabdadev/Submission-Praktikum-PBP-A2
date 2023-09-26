<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body>
    <?php
        $error_NIS = $error_nama = $error_jenis_kelamin = $error_kelas = $error_ekstrakurikuler = "";
        if(isset($_POST['submit'])) {
            $NIS = test_input($_POST['NIS']);
            $nama = test_input($_POST['nama']);
            $jenis_kelamin = test_input($_POST['jenis_kelamin']);
            $kelas = test_input($_POST['kelas']);
            
            if(empty($NIS)) {
                $error_NIS = "NIS harus diisi!";
            } elseif(strlen($NIS) !== 10 || !ctype_digit($NIS)) {
                $error_NIS = "NIS harus terdiri dari 10 angka dan hanya boleh berisi angka 0-9.";
            }
            
            if(empty($nama)) {
                $error_nama = "Nama harus diisi";
            }

            if(empty($jenis_kelamin)) {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }

            if(empty($kelas)) {
                $error_kelas = "Kelas harus diisi.";
            } elseif($kelas !== "X" && $kelas !== "XI" && $kelas !== "XII") {
                $error_kelas = "Kelas yang valid adalah X, XI, atau XII.";
            }

            if ($kelas === "X" || $kelas === "XI") {
                // Jika kelas X atau XI, validasi ekstrakurikuler
                $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : array();
                
                if(count($ekstrakurikuler) < 1) {
                    $error_ekstrakurikuler = "Siswa harus memilih minimal 1 kegiatan ekstrakurikuler.";
                } elseif(count($ekstrakurikuler) > 3) {
                    $error_ekstrakurikuler = "Siswa hanya dapat memilih maksimal 3 kegiatan ekstrakurikuler.";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Form Input Siswa
                    </h1>
                    <form class="space-y-4 md:space-y-4" method="POST" autocomplete="" action="">
                        <div>
                            <label for="NIS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS :</label>
                            <input type="text" name="NIS" id="NIS"
                                value="<?php if(isset($_POST['NIS'])) echo $_POST['NIS']?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <div class="text-red-800 text-sm font-medium">
                                <?php echo $error_NIS; ?>
                            </div>
                        </div>
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama :</label>
                            <input type="text" name="nama" id="nama"
                                value="<?php if(isset($_POST['nama'])) echo $_POST['nama']?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <div class="text-red-800 text-sm font-medium">
                                <?php echo $error_nama; ?>
                            </div>
                        </div>
                        <!-- Jenis Kelamin -->
                        <div>
                            <fieldset>
                                <legend class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin :</legend>
                                <div class="flex items-center mb-2">
                                    <input id="Laki-laki" type="radio" name="jenis_kelamin" value="Laki-laki" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Laki-laki') echo 'checked'?>
                                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Laki-laki" class="block ml-2 mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Laki-laki
                                    </label>
                                    <input id="Perempuan" type="radio" name="jenis_kelamin" value="Perempuan" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Perempuan') echo 'checked'?>
                                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="Perempuan" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Perempuan
                                    </label>
                                </div>
                            </fieldset>
                            <div class="text-red-800 text-sm font-medium">
                                <?php echo $error_jenis_kelamin; ?>
                            </div>
                        </div>
                        <!-- Kelas -->
                        <div>
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas :</label>
                            <select id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>--Pilih Kelas--</option>
                                <option value="X" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == 'X') echo 'selected'?>>X</option>
                                <option value="XI" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == 'XI') echo 'selected'?>>XI</option>
                                <option value="XII" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == 'XII') echo 'selected'?>>XII</option>
                            </select>
                            <div class="text-red-800 text-sm font-medium">
                                <?php echo $error_kelas; ?>
                            </div>
                        </div>
                        <!-- Ekstrakurikuler -->
                        <div id="ekstrakurikulerDiv" <?php if(isset($_POST['kelas']) && $_POST['kelas'] == 'XII') echo 'style="display: none;"' ?>>
                            <fieldset>
                                <legend class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ekstrakurikuler :</legend>
                                <div class="flex items-center mb-2">
                                    <input id="pramuka" type="checkbox" name="ekstrakurikuler[]" value="pramuka"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        <?php if(isset($_POST['ekstrakurikuler']) && in_array('pramuka', $_POST['ekstrakurikuler'])) echo 'checked'?>>
                                    <label for="pramuka" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pramuka</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="seni_tari" type="checkbox" name="ekstrakurikuler[]" value="seni tari"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        <?php if(isset($_POST['ekstrakurikuler']) && in_array('seni tari', $_POST['ekstrakurikuler'])) echo 'checked'?>>
                                    <label for="seni_tari" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seni Tari</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="sinematografi" type="checkbox" name="ekstrakurikuler[]" value="sinematografi"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        <?php if(isset($_POST['ekstrakurikuler']) && in_array('sinematografi', $_POST['ekstrakurikuler'])) echo 'checked'?>>
                                    <label for="sinematografi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinematografi</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="basket" type="checkbox" name="ekstrakurikuler[]" value="basket"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        <?php if(isset($_POST['ekstrakurikuler']) && in_array('basket', $_POST['ekstrakurikuler'])) echo 'checked'?>>
                                    <label for="basket" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Basket</label>
                                </div>
                            </fieldset>
                            <div class="text-red-800 text-sm font-medium">
                                <?php echo $error_ekstrakurikuler; ?>
                            </div>
                        </div>
                        <script>
                            function toggleEkstrakurikuler() {
                                var kelas = document.getElementById("kelas").value;
                                var ekstrakurikulerDiv = document.getElementById("ekstrakurikulerDiv");

                                if (kelas === "XII") {
                                    ekstrakurikulerDiv.style.display = "none";
                                } else {
                                    ekstrakurikulerDiv.style.display = "block";
                                }
                            }

                            window.onload = toggleEkstrakurikuler;
                            document.getElementById("kelas").addEventListener("change", toggleEkstrakurikuler);
                        </script>
                        <button type="submit" name="submit" value="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 mr-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                        <button type="reset" name="reset" value="reset"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reset</button>
                    </form>
                    <?php if(isset($_POST['submit']) && $error_NIS === '' && $error_nama === '' && $error_jenis_kelamin === '' && $error_kelas === '' && $error_ekstrakurikuler === ''): ?>
                        <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Your Input :</span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                    <li>NIS = <?php echo $_POST['NIS']; ?></li>
                                    <li>Nama = <?php echo $_POST['nama']; ?></li>
                                    <li>Jenis Kelamin = <?php echo $_POST['jenis_kelamin']; ?></li>
                                    <li>Kelas = <?php echo $_POST['kelas']; ?></li>
                                    <?php if(!empty($_POST['ekstrakurikuler'])): ?>
                                        <li>Ekstrakurikuler yang dipilih =<br>
                                            <?php foreach($_POST['ekstrakurikuler'] as $ekstra): ?>
                                                <?php echo $ekstra; ?><br>
                                            <?php endforeach; ?>
                                        </li>
                                    <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
