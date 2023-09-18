<!-- 
File      : index.php		18/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : Tugas pertemuan 3 (PHP form - tailwind+flowbyte)
-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        //validasi nis: tidak boleh kosong, hanya dapat berisi angka 0..9
        $nis = test_input($_POST['nis']);
        if (empty($nis)) {
            $error_nis = "NIS harus diisi";
        } else {
            if (!preg_match("/^[0-9]*$/", $nis)) {
                $error_nis = "NIS hanya dapat berisi angka";
            }
            if (strlen($nis) != 10) {
                $error_nis = "NIS harus terdiri dari 10 karakter";
            }
        }

        //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }

        //validasi jenis kelamin: tidak boleh kosong
        if (!isset($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        // validasi kelas: tidak boleh kosong
        if (!isset($_POST['kelas'])) {
            $error_kelas = "Kelas harus diisi";
        } else {
            $kelas = $_POST['kelas'];

            // Jika kelas adalah X atau XI, lakukan validasi ekstrakurikuler
            if ($kelas == 'x' || $kelas == 'xi') {
                // validasi ekstrakurikuler: minimal 1 dan maksimal 3 dipilih
                if (!isset($_POST['ekstrakurikuler'])) {
                    $error_ekstrakurikuler = "Pilih minimal 1 ekstrakurikuler";
                } elseif (count($_POST['ekstrakurikuler']) < 1 || count($_POST['ekstrakurikuler']) > 3) {
                    $error_ekstrakurikuler = "Pilih 1 hingga 3 ekstrakurikuler";
                }
            }
        }

        //validasi ekstrakurikuler: tidak boleh kosong
        if (!isset($_POST['ekstrakurikuler'])) {
            $error_ekstrakurikuler = "Ekstrakurikuler harus diisi";
        }

        if (isset($_POST['kelas'])) {
            if ($_POST['kelas'] == 'x' || $_POST['kelas'] == 'xi') {
                if (!isset($_POST['ekstrakurikuler'])) {
                    $error_ekstrakurikuler = "Minimal harus memilih 1 dan maksimal 3 ekstrakurikuler";
                } elseif (count($_POST['ekstrakurikuler']) < 1 || count($_POST['ekstrakurikuler']) > 3) {
                    $error_ekstrakurikuler = "Telah melebihi batas maksimal (maks 3)";
                }
            } elseif ($_POST['kelas'] == 'xii') {
                // Siswa kelas XII tidak boleh memilih ekstrakurikuler
                if (isset($_POST['ekstrakurikuler'])) {
                    $error_ekstrakurikuler = "Kelas XII tidak boleh memilih ekstrakurikuler";
                }
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
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo" />
                Form Mahasiswa
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form class="space-y-4 md:space-y-6" action="" method="POST" autocomplete="on">
                        <div>
                            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS:</label>
                            <input type="text" name="nis" id="nis" value="<?php if (isset($_POST['nis'])) echo $_POST['nis'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan NIS" />
                            <div class="error text-primary-danger"><?php if (isset($error_nis)) echo $error_nis; ?></div>
                        </div>
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:</label>
                            <input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) echo $_POST['nama'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan Nama" />
                            <div class="error text-primary-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin:</label>
                            <div class="flexbox items-center mb-4">
                                <input id="default-radio-1" type="radio" value="pria" name="jenis_kelamin" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria') echo 'checked'; ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                                <div class="error text-primary-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                            </div>
                            <div class="flexbox items-center">
                                <input id="default-radio-2" type="radio" value="wanita" name="jenis_kelamin" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'wanita') echo 'checked'; ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                                <div class="error text-primary-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                            </div>
                        </div>
                        <div>
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas:</label>
                            <select id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected disabled>--Pilih Kelas--</option>
                                <option value="x" <?php if (isset($_POST['kelas']) && $_POST['kelas'] == 'x') echo 'selected' ?>>X</option>
                                <option value="xi" <?php if (isset($_POST['kelas']) && $_POST['kelas'] == 'xi') echo 'selected' ?>>XI</option>
                                <option value="xii" <?php if (isset($_POST['kelas']) && $_POST['kelas'] == 'xii') echo 'selected' ?>>XII</option>
                            </select>
                            <div class="error text-primary-danger"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
                        </div>
                        <div>
                            <label for="ekstrakurikuler" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ekstrakulikuler:</label>
                            <div class="flexbox items-center mb-2">
                                <input id="default-checkbox" type="checkbox" value="pramuka" name="ekstrakurikuler[]" <?php if (isset($_POST['ekstrakurikuler']) && in_array('pramuka', $_POST['ekstrakurikuler'])) echo 'checked' ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pramuka</label>
                                <div class="error text-primary-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                            </div>
                            <div class="flexbox items-center mb-2">
                                <input id="checked-checkbox" type="checkbox" value="seni_tari" name="ekstrakurikuler[]" <?php if (isset($_POST['ekstrakurikuler']) && in_array('seni_tari', $_POST['ekstrakurikuler'])) echo 'checked' ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seni Tari</label>
                                <div class="error text-primary-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                            </div>
                            <div class="flexbox items-center mb-2">
                                <input id="checked-checkbox" type="checkbox" value="sinematografi" name="ekstrakurikuler[]" <?php if (isset($_POST['ekstrakurikuler']) && in_array('sinematografi', $_POST['ekstrakurikuler'])) echo 'checked' ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinematografi</label>
                                <div class="error text-primary-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                            </div>
                            <div class="flexbox items-center mb-2">
                                <input id="checked-checkbox" type="checkbox" value="basket" name="ekstrakurikuler[]" <?php if (isset($_POST['ekstrakurikuler']) && in_array('basket', $_POST['ekstrakurikuler'])) echo 'checked' ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Basket</label>
                                <div class="error text-primary-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" name="submit" value="submit">
                            Submit
                        </button>
                        <button type="reset" class="w-full text-white bg-primary-1red hover:bg-primary-2red focus:ring-4 focus:outline-none focus:ring-primary-0red font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-2red dark:hover:bg-primary-3red dark:focus:ring-primary-4red">
                            Reset
                        </button>
                    </form>

                    <br>

                    <?php
                    if (isset($_POST["submit"]) && isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['kelas'])) {
                        //keluaran yang akan ditampilkan
                        echo "<h3>Berikut adalah input anda:</h3>";
                        echo 'NIS = ' . $_POST['nis'] . '<br />';
                        echo 'Nama = ' . $_POST['nama'] . '<br />';
                        //mengecek apakah jenis kelamin sudah diisi atau belum
                        if (isset($_POST['jenis_kelamin'])) {
                            echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
                        } else {
                            echo 'Jenis Kelamin = ' . 'Belum dipilih' . '<br />';
                        }
                        //mengecek apakah kelas sudah diisi atau belum
                        if (isset($_POST['kelas'])) {
                            echo 'Kelas = ' . $_POST['kelas'] . '<br />';
                        } else {
                            echo 'Kelas = ' . 'Belum dipilih' . '<br />';
                        }
                        //mengecek apakah ekstrakurikuler sudah diisi atau belum
                        //sambung
                        // if (isset($_POST['ekstrakurikuler'])) {
                        //     echo 'Ekstrakurikuler = ' . implode(", ", $_POST['ekstrakurikuler']) . '<br />';
                        // } else {
                        //     echo 'Ekstrakurikuler = ' . 'Belum dipilih' . '<br />';
                        // }

                        //bentuk list
                        $ekstrakurikuler = $_POST['ekstrakurikuler'];
                        if (!empty($ekstrakurikuler)) {
                            echo 'ekstrakurikuler yang dipilih: ';
                            foreach ($ekstrakurikuler as $ekstrakurikuler_item) {
                                echo '<br />' . $ekstrakurikuler_item;
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
</body>

</html>