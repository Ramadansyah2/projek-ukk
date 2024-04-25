<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom styles -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      margin-top: 100px;
    }
    .login-box {
      max-width: 400px;
      margin: auto;
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .login-box form input[type="email"],
    .login-box form input[type="password"] {
      width: 100%;
      border: 1px solid #ced4da;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      box-sizing: border-box;
      border-radius: 4px;
    }
    .login-box form button {
      width: 100%;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 14px 20px;
      margin: 8px 0;
      cursor: pointer;
      border-radius: 4px;
    }
    .login-box form button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Galeri</h2>
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
      </form>
      <p class="text-center">Belum Punya Akun? <a href="{{ route('auth.register') }}">Register Sekarang</a></p>
    </div>
  </div>
</body>
</html>
