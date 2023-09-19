<!DOCTYPE html>
<html lang="en">
<!-- 
Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 4 September 2023
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script>
        function checkKelas(select) {
            checkboxes = document.querySelectorAll('input[type="checkbox"]');
            if (select.value !== "XII") {
                checkboxes.forEach(function (checkbox) {
                    checkbox.removeAttribute("disabled");
                    checkbox.classList.remove("disabled-checkbox");
                });
            } else {
                checkboxes.forEach(function (checkbox) {
                    checkbox.setAttribute("disabled", "disabled");
                    checkbox.checked = false;
                    checkbox.classList.add("disabled-checkbox");
                });
            }
        }
    </script>
    <style>
        .disabled-checkbox {
            opacity: 0.5;
            background-color: grey;
        }
    </style>
</head>

<body>
    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function print_error($message)
    {
        echo '<div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">';
        echo '<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">';
        echo '<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z">';
        echo '</svg>';
        echo '<span class="sr-only">Info</span>';
        echo '<div>';
        echo '<span class="font-medium">Perhatian!</span> ' . $message;
        echo '</div>';
        echo '</div>';
    }

    if (isset($_POST['submit'])) {
        // validasi NIS : tidak boleh kosong, maks 10 karakter, hanya berisi angka 0..9 
        $nis = test_input($_POST['nis']);
        if ($nis == '') {
            $error_nis = 'NIS harus diisi.';
        } elseif (strlen($nis) != 10) {
            $error_nis = 'NIS memiliki panjang 10 karakter';
        } elseif (!is_numeric($nis)) {
            $error_nis = 'NIS hanya berisi angka';
        }
        
        // validasi nama : tidak boleh kosong, hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi.";
        } elseif (!preg_match('/^[a-zA-Z ]*$/', $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi.";
        }

        // validasi jenis kelamin : tidak boleh kosong
        $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
        if ($jenis_kelamin == '') {
            $error_jenis_kelamin = 'Jenis kelamin harus diisi.';
        }

        // validasi kelas : tidak boleh kosong, jika kelas XII, ekstrakurikuler dinonaktifkan
        $kelas = $_POST['kelas'] ?? '';
        if ($kelas == '' || $kelas == 'default') {
            $error_kelas = 'Kelas harus diisi.';
        }

        // validasi ekstrakurikuler : tidak boleh kosong
        if (isset($_POST['kelas']) && (($_POST['kelas'] == 'X') || ($_POST['kelas'] == 'XI'))) {
            $kelas = $_POST['kelas'];
            $ekstrakurikuler = $_POST['ekstrakurikuler'] ?? [];
            
            if (empty($ekstrakurikuler)) {
                $error_ekstrakurikuler = 'Setidaknya pilih satu ekstrakurikuler';
            } elseif (count($ekstrakurikuler) > 3) {
                $error_ekstrakurikuler = 'Maksimal hanya tiga ekstrakurikuler yang dapat dipilih';
            }
        }

        
        // if (empty($ekstrakurikuler)) {
        //     $error_ekstrakurikuler = 'Ekstrakurikuler harus dipilih.';
        // }
    }
    ?>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Form Siswa
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form class="space-y-4 md:space-y-6" action="" method="post">
                        <div>
                            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NIS
                            </label>
                            <input 
                                type="text" 
                                name="nis" 
                                id="nis" 
                                maxlength="10"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="1234567890"> 
                            <?php
                            if (isset($error_nis)) {
                                print_error($error_nis);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama
                            </label>
                            <input 
                                type="text" 
                                name="nama" 
                                id="nama" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="Harry Potter">
                            <?php
                            if (isset($error_nama)) {
                                print_error($error_nama);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jenis Kelamin
                            </label>
                            <div class="flex items-center mb-4">
                                <input 
                                    id="pria" 
                                    type="radio" 
                                    name="jenis_kelamin" 
                                    value="Pria" 
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="pria" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Pria
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input 
                                    id="wanita" 
                                    type="radio" 
                                    name="jenis_kelamin" 
                                    value="Wanita" 
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="wanita" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Wanita
                                </label>
                            </div>
                        <?php
                        if (isset($error_jenis_kelamin)) {
                            print_error($error_jenis_kelamin);
                        }
                        ?>
                        </div>
                        <div>
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelas
                            </label>
                            <select 
                                id="kelas" 
                                name="kelas" 
                                onchange="checkKelas(this)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="default" selected disabled>--Pilih Kelas--</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                            </select>
                            <?php
                            if (isset($error_kelas)) {
                                print_error($error_kelas);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="ekstrakurikuler" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Ekstrakurikuler
                            </label>
                            <div class="flex items-center mb-2">
                                <input 
                                id="pramuka" 
                                type="checkbox" 
                                name="ekstrakurikuler[]" 
                                value="Pramuka" 
                                disabled
                                class="disabled-checkbox w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="Pramuka" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Pramuka
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input 
                                id="seni_tari" 
                                type="checkbox" 
                                name="ekstrakurikuler[]" 
                                value="Seni Tari" 
                                disabled
                                class="disabled-checkbox w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="Seni Tari" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Seni Tari
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input 
                                id="sinematografi" 
                                type="checkbox" 
                                name="ekstrakurikuler[]" 
                                value="Sinematografi" 
                                disabled
                                class="disabled-checkbox w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="Sinematografi" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Sinematografi
                                </label>
                            </div>
                            <div class="flex items-center mb-2">
                                <input 
                                id="basket" 
                                type="checkbox" 
                                name="ekstrakurikuler[]" 
                                value="Basket" 
                                disabled
                                class="disabled-checkbox w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="Basket" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Basket
                                </label>
                            </div>
                            <?php
                            if (isset($error_ekstrakurikuler)) {
                                print_error($error_ekstrakurikuler);
                            }
                            ?>
                        </div>
                        <button type="submit" name="submit" value="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                        <button type="reset" class="text-white bg-gray-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Reset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


</body>

</html>