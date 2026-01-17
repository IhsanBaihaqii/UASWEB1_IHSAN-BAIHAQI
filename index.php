<?php
include "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email = '$email'");
    if ($row = mysqli_fetch_assoc($result)) {
        if ($password == $row["password"]) {
            $_SESSION["email"] = $row["email"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["role"] = $row["role"];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POLGAN MART</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body
    class="min-h-screen flex items-center justify-center bg-gray-100"
  >
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
      <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">
        POLGAN MART
      </h2>

      <?php if (!empty($error)) : ?>
       <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg border-l-2 border-red-500">
           <?= $error ?>
       </div>
      <?php endif; ?>

      <form action="" method="post" class="space-y-4">
        <div>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Masukkan email anda"
            required
            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
          />
        </div>

        <div>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Masukkan password"
            required
            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
          />
        </div>

        <div class="flex gap-3">
          <button
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold transition"
          >
            Login
          </button>

          <button
            type="reset"
            class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold transition"
          >
            Batal
          </button>
        </div>
      </form>

      <!-- buatkan sosmednya -->
          

      <div class="mt-6 text-center text-sm text-gray-500">
        &copy; 2026 POLGAN MART
      </div>
    </div>
  </body>
</html>
