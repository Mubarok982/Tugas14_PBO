<?php
include 'database.php';
$db = new Database();

$id = $_GET['id'];
$user = $db->get_user($id); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $usia = $_POST['usia'];

    $query = "UPDATE user SET nama = ?, alamat = ?, usia = ? WHERE id = ?";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("ssii", $nama, $alamat, $usia, $id);  

    if ($stmt->execute()) {
        header("Location: tampil.php");
        exit();
    } else {
        echo "Error: " . $db->conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc; 
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        h1 {
            color: #007bff; 
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff; 
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; 
        }

        .form-control {
            border: 1px solid #ced4da; 
        }

        .form-group {
            margin-bottom: 1.5rem; 
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Edit User</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $user['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $user['alamat']; ?>" required>
        </div>
        <div class="form-group">
            <label for="usia">Usia:</label>
            <input type="number" name="usia" class="form-control" value="<?php echo $user['usia']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
</div>
</body>
</html>
