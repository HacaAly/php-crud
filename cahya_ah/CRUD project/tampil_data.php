
<!DOCTYPE html>
<html>
<head>
	<title>pemrograman3.com</title>
</head>
<body>
	<h2>Pemrograman 3 2024</h2>
	<br/>
	<a href="http://localhost/cahya_ah/CRUD%20project/">KEMBALI</a>
	<br/>
	<br/>
	<a href="input_user.php">+ TAMBAH USER</a>
	<br/>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Password</th>
			<th>Level</th>
			<th>Status</th>
			<th>OPSI</th>
		</tr>
		<?php
		include 'SqlConnection.php';  
		$no = 1;
		$data = mysqli_query($connection, "SELECT * FROM user");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td> 
				<td><?php echo $d['name']; ?></td> 
				<td><?php echo $d['password']; ?></td> 
				<td><?php echo $d['level']; ?></td> 
				<td><?php echo $d['status']; ?></td>
				<td>
					<a href="edit_user.php?id_user=<?php echo $d['id_user']; ?>">EDIT</a>
					<a href="hapus_user.php?id_user=<?php echo $d['id_user']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">HAPUS</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>

