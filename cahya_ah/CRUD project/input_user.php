<!DOCTYPE html>
<html>
<head>
	<title>pemrograman3.com</title>
</head>
<?php
	// Koneksi database
	include 'SqlConnection.php';

	// Menangkap data dari form
	if(!empty($_POST['save'])){
		$nama = $_POST['name'];
		$password = $_POST['password'];
		$level = $_POST['level'];
		$status = $_POST['status'];

		// Menginput data ke database
		$a = mysqli_query($connection, "INSERT INTO user VALUES('','$nama','$password','$level','$status')");

		if($a){
			// Mengalihkan halaman
			header("location:tampil_data.php");
		}else{
			echo mysqli_error($connection);
		}
	}
?>
<body>
	<h2>Pemrograman 3 2024</h2>
	<br/>
	<a href="tampil_data.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA USER</h3>
	<form method="POST">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
					<select name="level">
						<option value="">-----Pilih</option>
						<option value="1">-----Admin</option>
						<option value="2">-----Staff</option>
						<option value="3">-----Spv</option>
						<option value="4">-----Mgr</option>
					</select>	
				</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>
					<select name="status">
						<option value="">-----Pilih</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>	
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="save"></td>
			</tr>
		</table>
	</form>
</body>
</html>