<?php
	$conn = new mysqli("localhost","root","","mahasiswa_db");
	$id = $_POST["id"];
	
	$data = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
	if ($data){
		echo json_encode([
			'pesan' => 'Sukses']);
	}else {
		echo json_encode([
			'pesan' => 'Gagal']);
	}
?>
