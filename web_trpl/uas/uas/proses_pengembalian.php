<?php
include 'koneksi.php';
//tidak digunakan
if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $id_peminjaman = $_POST['peminjaman'];
        $tgl_dikembalikan= $_POST['tgl_dikembalikan'];


        $tgl_kembali=mysqli_query($conn, "SELECT  cast(cast(tgl_kembali as float)as int) FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'");
      
        if($tgl_kembali < $tgl_dikembalikan ){
            $keterangan = "terlambat";
        }
        else{
          $keterangan = "tidak terlambat";

        }

       // if(($tgl_kembali) <= intval($tgl_dikembalikan)){
       //     $keterangan = "tidak terlambat";
        //}elseif(($tgl_kembali)>intval($tgl_dikembalikan)){
          //  $keterangan = "terlambat";
        //}else{
          //  $keterangan = "tidak terlambat else";

        //}
        
		$sql=mysqli_query ($conn,"INSERT INTO pengembalian(id_peminjaman,tgl_dikembalikan,keterangan) 
        VALUES ('$id_peminjaman','$tgl_dikembalikan','$keterangan')");
        if($sql) {
            echo "$tgl_kembali";
            //"<script> 
            //window.location = 'index.php?p=pengembalian&msg=ok';
            //</script>";
		} else {
            echo "<script>alert('Data Gagal Ditambahkan.')</script>";
        }
    }
}


elseif($_GET['aksi']=='edit'){
	//update
	include 'koneksi.php';
	if (isset($_POST['submit'])) {
        $tgl_dikembalikan = $_POST['tgl_dikembalikan'];
        $keterangan = $_POST['keterangan'];
        $id_peminjaman = $_POST['id_peminjaman'];

				$sql=mysqli_query($conn,"UPDATE pengembalian SET
				tgl_dikembalikan    ='$_POST[tgl_dikembalikan]',
				keterangan    ='$_POST[keterangan]'
				WHERE id_pengembalian	='$_POST[id_pengembalian]'");
				if ($sql) {
                    $selesai = mysqli_query($conn, "SELECT count(keterangan) FROM pengembalian where id_peminjaman = '$_POST[id_peminjaman]'");
                    //$ada = $sql->fetch_row();
                    if($selesai==1){
                        $peminjaman=mysqli_query($conn,"UPDATE peminjaman SET
                        status_peminjaman       ='selesai'
                        WHERE id_peminjaman	='$_POST[id_peminjaman]'");
                    }
				}else{

                }
                if($selesai){
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
	

