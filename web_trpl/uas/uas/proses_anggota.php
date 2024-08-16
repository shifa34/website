<?php
    include 'koneksi.php';
if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama_anggota'];
        $prodi = $_POST['prodi'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir=$_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $jk = $_POST['jenis_kelamin'];
    
		$sql=mysqli_query ($conn,"INSERT INTO anggota(nim,nama_anggota,tempat_lahir,tgl_lahir,jenis_kelamin,id_prodi) 
        VALUES ('$nim','$nama','$tempat_lahir','$tgl_lahir','$jk','$prodi')");
        if($sql) {
			echo "<script> 
            window.location = 'index.php?p=agt&msg=ok';
            </script>";
		} else {
            echo "<script>alert('Data Gagal Ditambahkan.')</script>";
        }
    }
}


elseif($_GET['aksi']=='edit'){
	//update
	include 'koneksi.php';
	if (isset($_POST['submit'])) {
			$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];

				$sql=mysqli_query($conn,"UPDATE anggota SET
				nama_anggota    ='$_POST[nama_anggota]',
				id_prodi    	='$_POST[prodi]',
				tempat_lahir    ='$_POST[tempat_lahir]',
				tgl_lahir       ='$tgl_lahir',
				jenis_kelamin   ='$_POST[jenis_kelamin]'
				WHERE nim		='$_POST[nim]'");
				if ($sql) {
					echo "<script>window.location='index.php?p=agt&msg=ok'</script>"; 
				}
	}
}
	
elseif($_GET['aksi']=='delete'){
	//delete
		include 'koneksi.php';
		$hapus = mysqli_query($conn, "DELETE FROM anggota where nim = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href =							'index.php?p=agt';
            </script>";
        }
	}
?>
	

