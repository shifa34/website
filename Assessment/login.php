<?php
$conn = new mysqli("localhost", "root", "", "mahasiswa_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $response = array(
        'status' => 'success',
        'message' => 'Login successful'
    );
    echo json_encode($response);
} else {
    $response = array(
        'status' => 'error',
        'message' => 'username atau password salah'
    );
    echo json_encode($response);
}
$conn->close();
?>
