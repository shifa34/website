<?php
$conn=new mysqli("localhost","root","","mahasiswa_db");
$query=mysqli_query($conn,"select * from mahasiswa");
$data=mysqli_fetch_all($query,MYSQLI_ASSOC);
echo json_encode($data);

?>