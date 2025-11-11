<?php
session_start();
include_once("config.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistem Monitoring Alat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #007bff, #00c6ff);
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      position: relative;
    }
    .login-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 380px;
      padding: 30px;
      text-align: center;
      animation: fadeIn 0.8s ease;
    }
    h1 {
      color: white;
      position: absolute;
      top: 60px;
      font-weight: bold;
      text-shadow: 1px 2px 5px rgba(0,0,0,0.3);
    }
    .login-card h3 {
      margin-bottom: 20px;
      color: #007bff;
      font-weight: 600;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    /* ✅ Tambahan Copyright */
    .footer {
      position: absolute;
      bottom: 15px;
      color: white;
      font-size: 0.9rem;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>

  <!-- ✅ Judul Besar di Atas Form -->
  <h1>Sistem Monitoring Alat</h1>

  <div class="login-card">
    <h3>🔐 Login</h3>
    <form method="post">
      <div class="mb-3 text-start">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
      </div>
      <div class="mb-3 text-start">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100">Masuk</button>
    </form>
  </div>

  <!-- ✅ Copyright -->
  <div class="footer">
    &copy; 2025 Angga Chean Tafarel (1202305043)
  </div>

</body>
</html>
