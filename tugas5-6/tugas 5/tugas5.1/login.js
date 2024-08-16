function submit() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === 'user' && password === 'password') {
        // Jika login sukses
        alert('Anda berhasil Login!');
    } else {
        // Jika login gagal
        alert('Username atau password salah. Silakan coba lagi.');
    }
}