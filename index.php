<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Estate Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="logo2.png" alt="Real Estate Logo" class="logo">
      <h1 class="site-name">Dream Home Real Estate</h1>
    </div>
    <div class="buttons">
      <button onclick="navigateTo('login')" class="btn">Login</button>
      <button onclick="navigateTo('signup')" class="btn">Sign Up</button>
    </div>
  </div>

  <script>
    function navigateTo(page) {
      if (page === 'login') {
        window.location.href = "login.php";
      } else if (page === 'signup') {
        window.location.href = "signup.php";
      }
    }
  </script>
</body>
</html>
