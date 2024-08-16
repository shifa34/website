<?php
    include 'koneksi.php';
if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $id_buku = $_POST['buku'];
        $anggota = $_POST['id_login'];
       // $anggota = $_POST['anggota'];
		$tgl_pinjam = ($_POST['tgl_pinjam']);
		$tgl_kembali = ($_POST['tgl_kembali']);
        $status = $_POST['status'];
    
		$sql=mysqli_query ($conn,"INSERT INTO peminjaman(id_anggota,id_buku,tgl_pinjam,tgl_kembali,status_peminjaman) 
        VALUES ('$anggota','$id_buku','$tgl_pinjam','$tgl_kembali','$status')");

        
        if($sql) {
			echo "<script> 
            window.location = 'index.php?p=peminjaman&msg=ok';
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

				$sql=mysqli_query($conn,"UPDATE peminjaman SET
				status_peminjaman    ='$_POST[status]'
				WHERE id_peminjaman	='$_POST[id_peminjaman]'");
				if ($sql) {
					echo "<script>window.location='index.php?p=peminjaman&msg=ok'</script>"; 
				}
	}
}
	
elseif($_GET['aksi']=='delete'){
	//delete
		include 'koneksi.php';
		$hapus = mysqli_query($conn, "DELETE FROM peminjaman where id_peminjaman = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href ='index.php?p=peminjaman';
            </script>";
        }
	}
?>
	

