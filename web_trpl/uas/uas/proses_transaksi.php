<?php
    include 'koneksi.php';
if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $id_buku = $_POST['buku'];
        $anggota = $_POST['anggota'];
		$tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
		$tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
        $status = $_POST['status'];
    
		$sql=mysqli_query ($conn,"INSERT INTO transaksi(id_buku,nim_anggota,tgl_pinjam,tgl_kembali,status) 
        VALUES ('$id_buku','$anggota','$tgl_pinjam','$tgl_kembali','$status')");
        if($sql) {
			echo "<script> 
            window.location = 'index.php?p=transaksi&msg=ok';
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

				$sql=mysqli_query($conn,"UPDATE transaksi SET
				id_buku    ='$_POST[buku]',
				nim_anggota    	='$_POST[anggota]',
				status    ='$_POST[status]'
				WHERE id_transaksi	='$_POST[id_transaksi]'");
				if ($sql) {
					echo "<script>window.location='index.php?p=transaksi&msg=ok'</script>"; 
				}
	}
}
	
elseif($_GET['aksi']=='delete'){
	//delete
		include 'koneksi.php';
		$hapus = mysqli_query($conn, "DELETE FROM transaksi where id_transaksi = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href ='index.php?p=transaksi';
            </script>";
        }
	}
?>
	

