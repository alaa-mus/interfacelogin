<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $role = $_POST['role'];

    // Database connection
    $servername = "localhost";
    $dbUsername = "root"; // Replace with your DB username
    $dbPassword = ""; // Replace with your DB password
    $dbName = "real_estate"; // Replace with your DB name

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the data into the database
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('Account created successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not create account.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Estate Login</title>
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
  <form class="modern-form" method="POST" action="">
    <div class="form-title">Sign Up</div>

    <div class="form-body">
      <!-- Username -->
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

      <!-- Email -->
      <div class="input-group">
        <div class="input-wrapper">
          <svg fill="none" viewBox="0 0 24 24" class="input-icon">
            <path
              stroke-width="1.5"
              stroke="currentColor"
              d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z"
            ></path>
          </svg>
          <input
            required
            placeholder="Email"
            class="form-input"
            type="email"
            name="email"
          />
        </div>
      </div>

      <!-- Password -->
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

      <!-- Role Dropdown -->
      <div class="input-group">
        <div class="input-wrapper">
          <select required name="role" class="form-input">
            <option value="" disabled selected>Choose Role</option>
            <option value="seller">User (Seller)</option>
            <option value="client">Client (Buyer/Renter)</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Submit Button -->
    <button class="submit-button" type="submit">
      <span class="button-text">Create Account</span>
      <div class="button-glow"></div>
    </button>

    <div class="form-footer">
  <a class="login-link" href="login.php">
    Already have an account? <span>Login</span>
  </a>
</div>
  </form>
</body>
</html>