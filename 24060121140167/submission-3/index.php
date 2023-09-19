<?php
function cleanNIS($nis)
{
    return preg_replace('/[^0-9]/', '', $nis);
}
function validateNIS($nis)
{
    $nis = cleanNIS($nis);
    if (strlen($nis) === 10 && ctype_digit($nis)) {
        return true;
    } else {
        return false;
    }
}

$nisErr = "";
$kelas = "";
$ekstrakurikulerErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST["nis"];
    $kelas = $_POST["kelas"];
    $ekstrakurikuler = isset($_POST["ekstrakulikuler"]) ? $_POST["ekstrakulikuler"] : [];

    if (!validateNIS($nis)) {
        $nisErr = "NIS harus terdiri dari 10 angka.";
    }

    if ($kelas === "X" || $kelas === "XI") {
        if (count($ekstrakurikuler) < 1 || count($ekstrakurikuler) > 3) {
            $ekstrakurikulerErr = "Pilih minimal 1 dan maksimal 3 kegiatan ekstrakurikuler.";
        }
    } elseif ($kelas === "XII") {
        $ekstrakurikuler = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Form Input Siswa</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="mb-4">
                <label for="nis" class="block text-gray-700 font-bold mb-2">NIS:</label>
                <input type="text" id="nis" name="nis" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Masukkan NIS Siswa" required>
                <span class="text-red-500"><?php echo $nisErr; ?></span>
            </div>



            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Masukkan Nama Siswa" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Jenis Kelamin:</label>
                <input type="radio" id="pria" name="jenis_kelamin" value="Pria" class="mr-2" required>
                <label for="pria" class="mr-4">Pria</label>
                <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" class="mr-2" required>
                <label for="wanita">Wanita</label>
            </div>

            <div class="mb-4">
                <label for="kelas" class="block text-gray-700 font-bold mb-2">Kelas:</label>
                <select id="kelas" name="kelas" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Ekstrakulikuler:</label>
                <input type="checkbox" id="pramuka" name="ekstrakulikuler[]" value="Pramuka" class="mr-2">
                <label for="pramuka" class="mr-4">Pramuka</label>
                <input type="checkbox" id="sen_tari" name="ekstrakulikuler[]" value="Sen Tari" class="mr-2">
                <label for="sen_tari" class="mr-4">Sen Tari</label>
                <input type="checkbox" id="sinematografi" name="ekstrakulikuler[]" value="Sinematografi" class="mr-2">
                <label for="sinematografi" class="mr-4">Sinematografi</label>
                <input type="checkbox" id="basket" name="ekstrakulikuler[]" value="Basket" class="mr-2">
                <label for="basket">Basket</label>
                <span class="text-red-500"><?php echo $ekstrakurikulerErr; ?></span>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Submit</button>
                <button type="reset" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>