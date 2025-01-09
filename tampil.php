<?php
include 'database.php';  
$db = new Database();  
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OOP PHP - Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f7ff; 
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #007acc; 
        }

        .btn-primary {
            background-color: #007acc; 
            border: none;
        }

        .btn-primary:hover {
            background-color: #005b99; 
        }

        .btn-warning {
            background-color: #ffc107; 
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #f44336; 
            border: none;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        table {
            background-color: #ffffff;
        }

        th {
            background-color: #007acc;
            color: #ffffff;
        }

        .welcome {
            text-align: center;
            font-size: 1.5rem;
            color: #007acc; 
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">CRUD OOP PHP</h1>
    <h2 class="text-center">Daftar User</h2>
    <a href="input.php" class="btn btn-primary mb-3">Tambah User</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Usia</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($db->tampil_data() as $user) { 
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $user['nama']; ?></td>
                    <td><?php echo $user['alamat']; ?></td>
                    <td><?php echo $user['usia']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?aksi=hapus&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php    
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
