<?php
include 'koneksi.php';

if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $id_peminjaman = $_POST['peminjaman'];
        $tgl_dikembalikan = $_POST['tgl_dikembalikan'];

        $tgl_kembali=mysqli_query($conn, "SELECT tgl_kembali FROM transaksi WHERE id_transaksi = '$id_peminjaman'");
        
        if(strtotime($tgl_kembali) > strtotime($tgl_dikembalikan) || strtotime($tgl_kembali) == strtotime($tgl_dikembalikan)){
            $keterangan = "terlambat";
        }
       

		$sql=mysqli_query ($conn,"INSERT INTO pengembalian(id_peminjaman,tgl_dikembalikan,keterangan) 
        VALUES ('$id_peminjaman','$tgl_dikembalikan','$keterangan')");
        if($sql) {
            echo "<script>alert('Data Gagal Ditambahkan.')</script>";

			//echo "<script> 
           // window.location = 'index.php?p=pengembalian&msg=ok';
           // </script>";
		} else {
            echo "<script>alert('Data Gagal Ditambahkan.')</script>";
        }
    }
}


elseif($_GET['aksi']=='edit'){
	//update
	include 'koneksi.php';
	if (isset($_POST['submit'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $tgl_dikembalikan = $_POST['tgl_dikembalikan'];

        $tgl_kembali=mysqli_query($conn, "SELECT tgl_kembali FROM transaksi WHERE id_transaksi = '$id_transaksi'");
        if($tgl_kembali > $tgl_dikembalikan){
            $keterangan = "terlambat";
            echo "";

    
        }else{
            $keterangan = "terlambat";
        }
				$sql=mysqli_query($conn,"UPDATE pengembalian SET
				tgl_dikembalikan    ='$_POST[judul_buku]',
				keterangan    ='$_POST[keterangan]'
				WHERE id_pengembalian	='$_POST[id_pengembalian]'");
				if ($sql) {
					echo "<script>window.location='index.php?p=pengembalian&msg=ok'</script>"; 
				}
	}
}
	
elseif($_GET['aksi']=='delete'){
	//delete
		include 'koneksi.php';
		$hapus = mysqli_query($conn, "DELETE FROM pengembalian where id_pengembalian = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href ='index.php?p=pengembalian';
            </script>";
        }
	}
?>
	

