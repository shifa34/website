<?php
        if(isset($_GET['submit'])){
            $nama=$_GET['nama'];
            print 'Nama anda = '.$nama.', Lahir di hari Jum\'at <br>';
            echo "Umur anda = ".$_GET['umur']."Tahun";
        }
    ?>