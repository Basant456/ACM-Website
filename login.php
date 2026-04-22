<?php
session_start();

$conn = new mysqli("localhost", "root", "", "acm_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "<div class='alert alert-success text-center'>Registration successful. Please log in.</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['last_login'] = date("F j, Y, g:i a");

                header("Location: dashboard.php");
                exit();
            } else {
                $message = "<div class='alert alert-danger text-center'>Invalid password.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger text-center'>No account found with that email.</div>";
        }

        $stmt->close();
    } else {
        $message = "<div class='alert alert-warning text-center'>Please fill in all fields.</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UNCP ACM Chapter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">UNCP ACM Chapter</a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Join</a></li>
                <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="register-section">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-lg-6">
                <div class="register-info">
                    <span class="register-tag">Member Login</span>
                    <h1>Access Your UNCP ACM Member Portal</h1>
                    <p>
                        Log in to view your member dashboard and stay connected with
                        chapter activities, events, and opportunities.
                    </p>

                    <div class="benefit-box">
                        <h5>Member Access</h5>
                        <ul>
                            <li>View your member dashboard</li>
                            <li>Stay connected with chapter updates</li>
                            <li>Access a professional student portal experience</li>
                            <li>Continue building your ACM involvement</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="register-card">
                    <h2>Login to Your Account</h2>
                    <p class="form-subtext">Enter your email and password to continue.</p>

                    <?php echo $message; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control custom-input" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control custom-input" placeholder="Enter your password" required>
                        </div>

                        <button type="submit" class="btn btn-acm w-100">Login Now</button>
                    </form>

                    <p class="login-link mt-3 text-center">
                        Don’t have an account?
                        <a href="register.php">Register here</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>