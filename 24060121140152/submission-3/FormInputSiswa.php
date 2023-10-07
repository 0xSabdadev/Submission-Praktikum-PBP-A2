<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 19 September 2023
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Input Siswa</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="p-3 bg-secondary text-white border rounded">Form Input Siswa</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="pria" value="pria">
                    <label class="form-check-label" for="pria">Pria</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="wanita" value="wanita">
                    <label class="form-check-label" for="wanita">Wanita</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" id="kelas" name="kelas">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII" selected>XII</option>
                </select>
            </div>
            <div class="mb-3" id="ekstrakurikuler-div">
                <label class="form-label">Pilih Ekstrakurikuler</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pramuka" name="ekstrakurikuler[]" value="pramuka">
                    <label class="form-check-label" for="pramuka">Pramuka</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="seniTari" name="ekstrakurikuler[]" value="seniTari">
                    <label class="form-check-label" for="seniTari">Seni Tari</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="sinematografi" name="ekstrakurikuler[]" value="sinematografi">
                    <label class="form-check-label" for="sinematografi">Sinematografi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="basket" name="ekstrakurikuler[]" value="basket">
                    <label class="form-check-label" for="basket">Basket</label>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $jenisKelamin = $_POST['jenisKelamin'];
            $kelas = $_POST['kelas'];
            $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : array();
            if (strlen($nis) !== 10 || !ctype_digit($nis)) {
                echo '<div class="alert alert-danger">NIS harus terdiri dari 10 angka.</div>';
            } elseif (empty($nama) || empty($jenisKelamin)) {
                echo '<div class="alert alert-danger">Semua field harus diisi.</div>';
            } elseif ($kelas == 'X' || $kelas == 'XI') {
                if (count($ekstrakurikuler) < 1 || count($ekstrakurikuler) > 3) {
                    echo '<div class="alert alert-danger">Pilih minimal 1 dan maksimal 3 ekstrakurikuler.</div>';
                } else {
                    echo '<div class="alert alert-success">Formulir berhasil disubmit.</div>';
                }
            } elseif ($kelas == 'XII') {
                echo '<div class="alert alert-success">Formulir berhasil disubmit.</div>';
            }
        }
        ?>
    </div>
    <footer class="text-center mt-5">
        Made with ❤️ by Adri Audifirst
    </footer>
    <script>
        var kelasDropdown = document.getElementById("kelas");
        var ekstrakurikulerDiv = document.getElementById("ekstrakurikuler-div");

        ekstrakurikulerDiv.style.display = "none";
        kelasDropdown.addEventListener("change", function() {
            if (kelasDropdown.value === "XII") {
                ekstrakurikulerDiv.style.display = "none";
            } else {
                ekstrakurikulerDiv.style.display = "block";
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>