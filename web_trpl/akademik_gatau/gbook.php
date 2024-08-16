<div class="row">
	<div class="col-md-8">
		<form action="" method="post">
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-9">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input type="email" name="email" class="form-control" required>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Komentar</label>
				<div class="col-sm-9">
					<textarea name="komentar" class="form-control" rows="4" required></textarea>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<input type="submit" name="submit" value="Submit" class="btn btn-success">
					<input type="reset" name="reset" value="Reset" class="btn btn-warning">
					<a href="index.php?p=tamu">
						<input type="button" name="kembali" value="Kembali" class="btn btn-primary">
					</a>
				</div>
			</div>
		</form>
		<?php
			if(isset ($_POST ['submit'])){
				include 'koneksi.php';
				
				$sql = mysqli_query ($db, "INSERT INTO Tamu (nama,email,komentar)
				VALUES ('$_POST[nama]', '$_POST[email]', '$_POST[komentar]')");

				if($sql){
					echo "Terimakasih telah mengisi buku tamu <br>";
					// echo "<a href = list.php> Tampilkan list tamu </a>"; 
					echo "<script>window.location='index.php?p=tamu'</script>"; ////redirect js
				}
				else {
					echo "Proses input buku tamu, Gagal ... ";
				}
			}
		?>		
	</div>
</div>