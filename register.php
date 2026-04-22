<?php
$conn = new mysqli("localhost", "root", "", "acm_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($password)) {

        $checkSql = "SELECT id FROM users WHERE email = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $message = "<div class='alert alert-warning text-center'>This email is already registered.</div>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                header("Location: login.php?success=1");
                exit();
            } else {
                $message = "<div class='alert alert-danger text-center'>Something went wrong. Please try again.</div>";
            }

            $stmt->close();
        }

        $checkStmt->close();
    } else {
        $message = "<div class='alert alert-danger text-center'>Please fill in all fields.</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - UNCP ACM Chapter</title>

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
                <li class="nav-item"><a class="nav-link active" href="register.php">Join</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="register-section">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-lg-6">
                <div class="register-info">
                    <span class="register-tag">Join the Community</span>
                    <h1>Become a Member of the UNCP ACM Chapter</h1>
                    <p>
                        Connect with students who are passionate about computing, coding,
                        innovation, networking, and professional growth.
                    </p>

                    <div class="benefit-box">
                        <h5>Why Join?</h5>
                        <ul>
                            <li>Participate in coding workshops and events</li>
                            <li>Build teamwork and project experience</li>
                            <li>Grow your network with other tech students</li>
                            <li>Strengthen your resume and career readiness</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="register-card">
                    <h2>Create Your Account</h2>
                    <p class="form-subtext">Start your journey with the UNCP ACM Chapter.</p>

                    <?php echo $message; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control custom-input" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control custom-input" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control custom-input" placeholder="Create a password" required>
                        </div>

                        <button type="submit" class="btn btn-acm w-100">Register Now</button>
                    </form>

                    <p class="login-link mt-3 text-center">
                        Already have an account?
                        <a href="login.php">Login here</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>