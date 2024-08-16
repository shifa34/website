<?php
    include 'koneksi.php';
if($_GET['aksi']=='create'){
    if(isset($_POST['submit'])) {
        $judul_buku = $_POST['judul_buku'];
        $pengarang_buku = $_POST['pengarang_buku'];
        $penerbit_buku = $_POST['penerbit_buku'];
        $isbn = $_POST['isbn'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $lokasi = $_POST['lokasi'];
        $tgl_input = $_POST['tgl_input'] ;
        $tahun_terbit = $_POST['tahun_terbit'] ;
    
		$sql=mysqli_query ($conn,"INSERT INTO buku(judul_buku,pengarang_buku,penerbit_buku,tahun_terbit,isbn,jumlah_buku,lokasi,tgl_input) 
        VALUES ('$judul_buku','$pengarang_buku','$penerbit_buku','$tahun_terbit','$isbn','$jumlah_buku','$lokasi','$tgl_input')");
        if($sql) {
			echo "<script> 
            window.location = 'index.php?p=buku&msg=ok';
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

				$sql=mysqli_query($conn,"UPDATE buku SET
				judul_buku    ='$_POST[judul_buku]',
				pengarang_buku    	='$_POST[pengarang_buku]',
				penerbit_buku    ='$_POST[penerbit_buku]',
				tahun_terbit       ='$_POST[tahun_terbit]',
				isbn   ='$_POST[isbn]',
				jumlah_buku   ='$_POST[jumlah_buku]',
				lokasi   ='$_POST[lokasi]'
				WHERE id_buku		='$_POST[id_buku]'");
				if ($sql) {
					echo "<script>window.location='index.php?p=buku&msg=ok'</script>"; 
				}
	}
}
	
elseif($_GET['aksi']=='delete'){
	//delete
		include 'koneksi.php';
		$hapus = mysqli_query($conn, "DELETE FROM buku where id_buku = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href ='index.php?p=buku';
            </script>";
        }
	}
?>
	

