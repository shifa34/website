<?php
include 'koneksi.php';

if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $id_peminjaman = $_POST['peminjaman'];
        $tgl_dikembalikan= $_POST['tgl_dikembalikan'];

        $tgl_dikembalikan_pecah = explode('-', $tgl_dikembalikan);
        $tgl_dikembalikan_pecah = $tgl_dikembalikan_pecah[2].'-'.$tgl_dikembalikan_pecah[1].'-'.$tgl_dikembalikan_pecah[0];

       $tgl_kembali=mysqli_query($conn, "SELECT tgl_kembali FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'");
       $tgl_kembali_pecah = explode('-', $tgl_kembali);
       $tgl_kembali_pecah = $tgl_kembali_pecah[2].'-'.$tgl_kembali_pecah[1].'-'.$tgl_kembali_pecah[0];

        if(strtotime($tgl_kembali_pecah) < strtotime($tgl_dikembalikan_pecah) ){
            $keterangan = "terlambat";
        }
        else{
            $keterangan = "tidak terlambat";

        }
        

		$sql=mysqli_query ($conn,"INSERT INTO pengembalian(id_peminjaman,tgl_dikembalikan,keterangan) 
        VALUES ('$id_peminjaman','$tgl_dikembalikan','$keterangan')");
        if($sql) {
            
			echo "<script> 
            window.location = 'index.php?p=pengembalian&msg=ok';
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
        $id_transaksi = $_POST['id_transaksi'];
        $tgl_dikembalikan = $_POST['tgl_dikembalikan'];

        $tgl_kembali=mysqli_query($conn, "SELECT tgl_kembali FROM transaksi WHERE id_transaksi = '$id_transaksi'");
        $tgl_kembali2= date('Y-m-d',$tgl_kembali);
        if($tgl_kembali2 > $tgl_dikembalikan){
            $keterangan = "tidak terlambat";
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
	

