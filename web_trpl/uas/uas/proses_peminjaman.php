<?php
    include 'koneksi.php';
if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $id_peminjaman = $_POST['id_peminjaman'];
        $id_buku = $_POST['buku'];
        $anggota = $_POST['id_login'];
       // $anggota = $_POST['anggota'];
		$tgl_pinjam = ($_POST['tgl_pinjam']);
		$tgl_kembali = ($_POST['tgl_kembali']);
        $status = $_POST['status'];

       // $jumlah_buku=mysqli_query($conn, "SELECT jumlah_buku from buku where id_buku = '$_POST[id_buku]'") 
        // $buku = $jumlah_buku-1;
		$sql=mysqli_query ($conn,"INSERT INTO peminjaman(id_peminjaman,id_anggota,id_buku,tgl_pinjam,tgl_kembali,status_peminjaman) 
        VALUES ('$id_peminjaman','$anggota','$id_buku','$tgl_pinjam','$tgl_kembali','$status')");

        
        if($sql) {
            $sql2=mysqli_query ($conn,"INSERT INTO pengembalian(id_peminjaman,tgl_kembali) 
            VALUES ('$id_peminjaman','$tgl_kembali')");
            //$sql3==mysqli_query($conn,"UPDATE buku SET
            //jumlah_buku    = '$_POST[buku]'
            //WHERE id_buku	='$_POST[id_buku]'");

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
	

