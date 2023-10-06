<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKORAMA</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        text-align: center;
        padding: 20px;
    }

    h1 {
        color: #333;
    }

    .menu-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .menu-item {
        margin: 10px;
        padding: 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .menu-item:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <h1>Selamat Datang di Tugas Praktikumnya Ardian</h1>

    <div class="menu-container">
        <!-- Tautan untuk melihat daftar buku -->
        <a class="menu-item" href="show_books.php">Daftar Buku</a>

        <!-- Tautan untuk menambah buku baru -->
        <a class="menu-item" href="add_books.php">Tambah Buku Baru</a>

        <!-- Tautan untuk melihat daftar pelanggan -->
        <a class="menu-item" href="show_customer.php">Daftar Pelanggan</a>

        <!-- Tautan untuk menambah pelanggan baru -->
        <a class="menu-item" href="add_customer.php">Tambah Pelanggan Baru</a>

        <!-- Tautan untuk menampilkan waktu server -->
        <a class="menu-item" href="show_server_time.php">Waktu Server</a>
    </div>
</body>

</html>