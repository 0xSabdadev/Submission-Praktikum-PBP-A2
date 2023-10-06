<?php
require_once('db_login.php');

// Inisialisasi variabel pesan error
$title_error = $author_error = $isbn_error = $price_error = "";

// Inisialisasi variabel input
$title = $author = $isbn = $price = "";

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input judul
    if (empty($_POST["title"])) {
        $title_error = "Judul buku wajib diisi";
    } else {
        $title = test_input($_POST["title"]);
    }

    // Validasi input penulis
    if (empty($_POST["author"])) {
        $author_error = "Penulis buku wajib diisi";
    } else {
        $author = test_input($_POST["author"]);
    }

    // Validasi input ISBN
    if (empty($_POST["isbn"])) {
        $isbn_error = "ISBN wajib diisi";
    } else {
        $isbn = test_input($_POST["isbn"]);
    }

    // Validasi input harga
    if (empty($_POST["price"])) {
        $price_error = "Harga buku wajib diisi";
    } else {
        $price = test_input($_POST["price"]);
    }

    // Jika tidak ada kesalahan validasi, tambahkan buku ke database
    if (empty($title_error) && empty($author_error) && empty($isbn_error) && empty($price_error)) {
        // Escape input data
        $title = $db->real_escape_string($title);
        $author = $db->real_escape_string($author);
        $isbn = $db->real_escape_string($isbn);
        $price = $db->real_escape_string($price);

        // Query untuk menambahkan buku baru ke database
        $query = "INSERT INTO books (title, author, isbn, price) VALUES ('$title', '$author', '$isbn', '$price')";
        $result = $db->query($query);

        if (!$result) {
            die("Gagal menambahkan buku ke database: " . $db->error);
        } else {
            // Redirect ke halaman daftar buku setelah berhasil menambahkan buku
            header("Location: show_books.php");
            exit();
        }
    }
}

// Fungsi untuk membersihkan dan memvalidasi input jika belum dideklarasikan sebelumnya
if (!function_exists('test_input')) {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>

<?php include('header.php') ?>

<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Tambah Buku Baru</div>
            <div class="card-body">
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                        <div class="text-danger small">
                            <p><?php echo $title_error; ?></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Penulis:</label>
                        <input type="text" class="form-control" id="author" name="author"
                            value="<?php echo $author; ?>">
                        <div class="text-danger small">
                            <p><?php echo $author_error; ?></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN:</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $isbn; ?>">
                        <div class="text-danger small">
                            <p><?php echo $isbn_error; ?></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga:</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                        <div class="text-danger small">
                            <p><?php echo $price_error; ?></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php') ?>

<?php
// Menutup koneksi ke database
$db->close();
?>