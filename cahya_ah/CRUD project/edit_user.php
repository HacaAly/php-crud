<!DOCTYPE html>
<html>
<head>
    <title>pemrograman3.com</title>
</head>
<body>
<?php
    // Koneksi database
    include 'SqlConnection.php';

    // Menangkap ID pengguna yang ingin diupdate
    if (isset($_GET['id_user'])) {
        $id_user = $_GET['id_user'];
        // Mengambil data pengguna dari database
        $result = mysqli_query($connection, "SELECT * FROM user WHERE id_user='$id_user'");
        $a = mysqli_fetch_assoc($result);
    }

    // Menangkap data dari form
    if (!empty($_POST['update'])) {
        $id = $_POST['id_user']; // ID pengguna yang diupdate
        $nama = $_POST['name'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $status = $_POST['status'];

        // Mengupdate data ke database tanpa prepared statement
        $query = "UPDATE user SET name='$nama', password='$password', level='$level', status='$status' WHERE id_user='$id'";

        if (mysqli_query($connection, $query)) {
            // Mengalihkan halaman
            header("location:tampil_data.php");
            exit();
        } else {
            echo mysqli_error($connection);
        }
    }
?>
    <h2>Pemrograman 3 2024</h2>
    <br/>
    <a href="tampil_data.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>UPDATE DATA USER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>ID User</td>
                <td><input type="hidden" name="id_user" value="<?php echo $a['id_user']; ?>" required><?php echo $a['id_user']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo $a['name']; ?>" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $a['password']; ?>" required></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level" required>
                        <option value="1" <?php if ($a['level'] == "1") echo "selected"; ?>>-----Admin</option>
                        <option value="2" <?php if ($a['level'] == "2") echo "selected"; ?>>-----Staff</option>
                        <option value="3" <?php if ($a['level'] == "3") echo "selected"; ?>>-----Spv</option>
                        <option value="4" <?php if ($a['level'] == "4") echo "selected"; ?>>-----Mgr</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" required>
                        <option value="1" <?php if ($a['status'] == "1") echo "selected"; ?>>Aktif</option>
                        <option value="0" <?php if ($a['status'] == "0") echo "selected"; ?>>Tidak Aktif</option>
                    </select>	
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update Data"></td>
            </tr>
        </table>
    </form>
</body>
</html>
