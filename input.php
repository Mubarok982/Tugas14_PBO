<?php
include 'database.php';
$db = new Database();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $aksi == 'tambah_data') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $usia = $_POST['usia'];

    $query = "INSERT INTO user (nama, alamat, usia) VALUES (?, ?, ?)";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("ssi", $nama, $alamat, $usia);

    if ($stmt->execute()) {
        header("Location: tampil.php");
        exit();
    } else {
        echo "Error: " . $db->conn->error;
    }
}
?>

<style>
        body {
            background-color: #f2f2f2;
            font-family: 'Arial', sans-serif;
        }
        
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #007acc;
        }

        .form-group label {
            color: #555555;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #cccccc;
        }

        .btn-primary {
            background-color: #007acc;
            border: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #005b99;
        }

        .form-control:focus {
            border-color: #007acc;
            box-shadow: 0 0 8px rgba(0, 122, 204, 0.5);
        }

        .btn {
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Tambah User</h1>
    <form method="POST" action="?aksi=tambah_data">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="usia">Usia:</label>
            <input type="number" name="usia" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
</body>
</html>
