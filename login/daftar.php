<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Pendonatur</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color:rgb(243, 248, 241);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background-color: #ffffff;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.08);
      width: 280px;
    }

    h2 {
      text-align: center;
      font-size: 18px;
      color:green;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 13px;
      color: #444;
    }

    input, textarea {
      width: 100%;
      padding: 6px 8px;
      font-size: 13px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
      transition: border-color 0.2s ease;
    }

    input:focus, textarea:focus {
      border-color: #0077b6;
      outline: none;
    }

    textarea {
      resize: vertical;
    }

    button {
      width: 100%;
      padding: 8px;
      background-color: #0077b6;
      color: white;
      font-size: 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    button:hover {
      background-color: #005f8a;
    }

    p {
      text-align: center;
      font-size: 12px;
      margin-top: 12px;
    }

    a {
      color: #0077b6;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <form action="../login/prosesdftar.php" method="post">
    <h2>Daftar Pendonatur</h2>

    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <label for="telepon">Telepon</label>
    <input type="text" name="telepon" id="telepon">

    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3"></textarea>

    <button type="submit">Daftar</button>

    <p>Sudah punya akun? <a href="../login/login.php">Login di sini</a></p>
  </form>

</body>
</html>
