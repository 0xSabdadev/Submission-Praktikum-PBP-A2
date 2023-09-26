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
    <title>Form Mahasiswa POST 1</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
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
        // validasi nama : tidak boleh kosong, hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi.";
        } elseif (!preg_match('/^[a-zA-Z ]*$/', $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi.";
        }

        // validasi email : tidak boleh kosong, format harus benar
        $email = test_input($_POST['email']);
        if ($email == '') {
            $error_email = 'Email harus diisi.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = 'Format email tidak benar.';
        }

        // validasi alamat : tidak boleh kosong
        $alamat = test_input($_POST['alamat']);
        if ($alamat == '') {
            $error_alamat = 'Alamat harus diisi.';
        }

        // validasi kota : tidak boleh kosong
        $kota = $_POST['kota'] ?? '';
        if ($kota == '' || $kota == 'default') {
            $error_kota = 'Kota harus diisi.';
        }

        // validasi jenis kelamin : tidak boleh kosong
        $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
        if ($jenis_kelamin == '') {
            $error_jenis_kelamin = 'Jenis kelamin harus diisi.';
        }

        // validasi minat : tidak boleh kosong
        $minat = $_POST['minat'] ?? [];
        if (empty($minat)) {
            $error_minat = 'Peminatan harus dipilih.';
        }
    }
    ?>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Form Mahasiswa
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form class="space-y-4 md:space-y-6" action="" method="post">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama
                            </label>
                            <input type="text" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Harry Potter" maxlength="50">
                            <?php
                            if (isset($error_nama)) {
                                print_error($error_nama);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email
                            </label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="harry@example.com">
                            <?php
                            if (isset($error_email)) {
                                print_error($error_email);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Alamat
                            </label>
                            <textarea id="alamat" rows="4" name="alamat"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Privet Drive No. 4, Little Whinging"></textarea>
                            <?php
                            if (isset($error_alamat)) {
                                print_error($error_alamat);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kota/Kabupaten
                            </label>
                            <select id="kota" name="kota"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="default" selected disabled>--Pilih Kota/Kabupaten--</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                            <?php
                            if (isset($error_kota)) {
                                print_error($error_kota);
                            }
                            ?>
                        </div>
                        <div>
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jenis Kelamin
                            </label>
                            <div class="flex items-center mb-4">
                                <input id="pria" type="radio" name="jenis_kelamin" value="Pria"
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="pria"
                                    class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Pria
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="wanita" type="radio" name="jenis_kelamin" value="Wanita"
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="wanita"
                                    class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Wanita
                                </label>
                            </div>
                        </div>
                        <?php
                        if (isset($error_jenis_kelamin)) {
                            print_error($error_jenis_kelamin);
                        }
                        ?>
                        <div>
                            <label for="minat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Peminatan
                            </label>
                            <div class="flex items-center mb-4">
                                <input id="coding" type="checkbox" name="minat[]" value="Coding"
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="coding"
                                    class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Coding
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="ux_design" type="checkbox" name="minat[]" value="UX Design"
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="ux_design"
                                    class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    UX Design
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="data_science" type="checkbox" name="minat[]" value="Data Science"
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                <label for="data_science"
                                    class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Data Science
                                </label>
                            </div>
                            <?php
                            if (isset($error_minat)) {
                                print_error($error_minat);
                            }
                            ?>
                        </div>
                        <button type="submit" name="submit" value="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                        <button type="reset"
                            class="text-white bg-gray-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
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