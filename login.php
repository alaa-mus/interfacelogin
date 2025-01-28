<!-- ?php/*
// Start session
session_start();

// Database connection
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your DB username
$password = "";            // Replace with your DB password
$dbname = "real_estate_db"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$error = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, log them in
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to a dashboard or home page
        exit();
    } else {
        // User does not exist
        $error = "Invalid username or password.";
    }
}*/
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="stylesign.css">
  <style>
/*
.modern-form {
  --primary: #3b82f6;
  --primary-dark: #2563eb;
  --primary-light: rgba(59, 130, 246, 0.1);
  --success: #10b981;
  --text-main: #1e293b;
  --text-secondary: #64748b;
  --bg-input: #f8fafc;

  position: relative;
  width: 300px;
  padding: 24px;
  background: #ffffff;
  border-radius: 16px;
  box-shadow:
    0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -2px rgba(0, 0, 0, 0.05),
    inset 0 0 0 1px rgba(148, 163, 184, 0.1);
  font-family:
    system-ui,
    -apple-system,
    sans-serif;
}

.form-title {
  font-size: 22px;
  font-weight: 600;
  color: var(--text-main);
  margin: 0 0 24px;
  text-align: center;
  letter-spacing: -0.01em;
}

.input-group {
  margin-bottom: 16px;
}

.input-wrapper {
  position: relative;
  display: flex;
  align-items: center;
}

.form-input {
  width: 100%;
  height: 40px;
  padding: 0 36px;
  font-size: 14px;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  background: var(--bg-input);
  color: var(--text-main);
  transition: all 0.2s ease;
}

.form-input::placeholder {
  color: var(--text-secondary);
}

.input-icon {
  position: absolute;
  left: 12px;
  width: 16px;
  height: 16px;
  color: var(--text-secondary);
  pointer-events: none;
}

.password-toggle {
  position: absolute;
  right: 12px;
  display: flex;
  align-items: center;
  padding: 4px;
  background: none;
  border: none;
  color: var(--text-secondary);
  cursor: pointer;
  transition: all 0.2s ease;
}

.eye-icon {
  width: 16px;
  height: 16px;
}

.submit-button {
  position: relative;
  width: 100%;
  height: 40px;
  margin-top: 8px;
  background: var(--primary);
  color: white;
  border: none;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  overflow: hidden;
  transition: all 0.2s ease;
}

.button-glow {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    transparent
  );
  transform: translateX(-100%);
  transition: transform 0.5s ease;
}

.form-footer {
  margin-top: 16px;
  text-align: center;
  font-size: 13px;
}

.login-link {
  color: var(--text-secondary);
  text-decoration: none;
  transition: all 0.2s ease;
}

.login-link span {
  color: var(--primary);
  font-weight: 500;
}


.form-input:hover {
  border-color: #cbd5e1;
}

.form-input:focus {
  outline: none;
  border-color: var(--primary);
  background: white;
  box-shadow: 0 0 0 4px var(--primary-light);
}

.password-toggle:hover {
  color: var(--primary);
  transform: scale(1.1);
}

.submit-button:hover {
  background: var(--primary-dark);
  transform: translateY(-1px);
  box-shadow:
    0 4px 12px rgba(59, 130, 246, 0.25),
    0 2px 4px rgba(59, 130, 246, 0.15);
}

.submit-button:hover .button-glow {
  transform: translateX(100%);
}

.login-link:hover {
  color: var(--text-main);
}

.login-link:hover span {
  color: var(--primary-dark);
}


.submit-button:active {
  transform: translateY(0);
  box-shadow: none;
}

.password-toggle:active {
  transform: scale(0.9);
}


.form-input:not(:placeholder-shown):valid {
  border-color: var(--success);
}

.form-input:not(:placeholder-shown):valid ~ .input-icon {
  color: var(--success);
}


@keyframes shake {
  0%,
  100% {
    transform: translateX(0);
  }
  25% {
    transform: translateX(-4px);
  }
  75% {
    transform: translateX(4px);
  }
}

.form-input:not(:placeholder-shown):invalid {
  border-color: #ef4444;
  animation: shake 0.2s ease-in-out;
}

.form-input:not(:placeholder-shown):invalid ~ .input-icon {
  color: #ef4444;
}
*/

  </style>
</head>
<body>
  <div class="form-body">
    
    <!--<//?php if ($error): ?>-->
      <div class="error-message">
      <!--  </?php echo $error; ?>-->
      </div>
    <!--<//?php endif; ?>-->
    <form class="modern-form" method="POST" action="">
    <div class="form-title">Login</div>
    <div class="input-group">
        <div class="input-wrapper">
          <svg fill="none" viewBox="0 0 24 24" class="input-icon">
            <circle stroke-width="1.5" stroke="currentColor" r="4" cy="8" cx="12"></circle>
            <path stroke-linecap="round" stroke-width="1.5" stroke="currentColor" d="M5 20C5 17.2386 8.13401 15 12 15C15.866 15 19 17.2386 19 20"></path>
          </svg>
          <input
            required
            placeholder="Username"
            class="form-input"
            type="text"
            name="username"
          />
        </div>
      </div>
      <div class="input-group">
      <div class="input-group">
        <div class="input-wrapper">
          <svg fill="none" viewBox="0 0 24 24" class="input-icon">
            <path
              stroke-width="1.5"
              stroke="currentColor"
              d="M12 10V14M8 6H16C17.1046 6 18 6.89543 18 8V16C18 17.1046 17.1046 18 16 18H8C6.89543 18 6 17.1046 6 16V8C6 6.89543 6.89543 6 8 6Z"
            ></path>
          </svg>
          <input
            required
            placeholder="Password"
            class="form-input"
            type="password"
            name="password"
          />
          <button class="password-toggle" type="button">
            <svg fill="none" viewBox="0 0 24 24" class="eye-icon">
              <path
                stroke-width="1.5"
                stroke="currentColor"
                d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z"
              ></path>
              <circle
                stroke-width="1.5"
                stroke="currentColor"
                r="3"
                cy="12"
                cx="12"
              ></circle>
            </svg>
          </button>
        </div>
      </div>
      <button type="submit" class="submit-button">Login</button>
    </form>
    <div class="form-footer">
  <a class="login-link" href="signup.php">
    don't have acount ? <span>sign up</span>
  </a>
</div>
  </div>
</body>
</html>
