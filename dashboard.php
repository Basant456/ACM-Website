<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];
$lastLogin = isset($_SESSION['last_login']) ? $_SESSION['last_login'] : "Not available";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UNCP ACM Chapter</title>

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
                 <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 55%, #e9eef5 45%); min-height: 100vh;">
    <div class="container">

        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="register-card h-100">
                    <span class="register-tag">Member Dashboard</span>
                    <h1 class="mb-3">
                        Welcome, <?php echo htmlspecialchars($userName); ?>!
                        <span class="badge bg-success ms-2">Active Member</span>
                    </h1>
                    <p class="mb-4">
                        Welcome to your member dashboard. Use this dashboard to stay connected
                        with chapter opportunities and updates.
                    </p>

                    <div class="benefit-box">
                        <h5>Your Member Information</h5>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($userName); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($userEmail); ?></p>
                        <p class="mb-0"><strong>Status:</strong> Registered ACM Chapter Member</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="register-card h-100">
                    <h3 class="mb-3">Member Quick Links</h3>
                    <div class="d-grid gap-3">
                        <a href="index.php" class="btn btn-acm">Go to Homepage</a>
                        <a href="events.php" class="btn btn-dark">View Events</a>
                        <a href="contact.php" class="btn btn-outline-dark">Contact Chapter</a>
                        <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
                    </div>

                    <hr class="my-4">

                    <h5>Upcoming ACM Focus</h5>
                    <ul class="mb-0">
                        <li>Workshops and coding sessions</li>
                        <li>Networking opportunities</li>
                        <li>Student collaboration projects</li>
                        <li>Career development support</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="benefit-box h-100">
                    <h5>Registered Member Area</h5>
                    <p class="mb-0">
                        As a registered member, you now have access to the ACM member portal
                        and chapter-related updates through your account.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-box h-100">
                    <h5>Chapter Opportunities</h5>
                    <p class="mb-0">
                        Stay involved in workshops, team activities, discussions, and projects
                        that strengthen both technical and professional skills.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-box h-100">
                    <h5>Professional Growth</h5>
                    <p class="mb-0">
                        Use your involvement in ACM to build experience, strengthen teamwork,
                        and prepare for internships and future career opportunities.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="register-card h-100">
                    <h3 class="mb-3">Member Announcements</h3>
                    <ul class="mb-0">
                        <li class="mb-2">Next coding workshop will focus on web development basics.</li>
                        <li class="mb-2">Students are encouraged to participate in upcoming chapter events.</li>
                        <li class="mb-2">New members can explore chapter activities through the events page.</li>
                        <li class="mb-0">Continue checking the portal for updates and involvement opportunities.</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="register-card h-100">
                    <h3 class="mb-3">Member Benefits Snapshot</h3>
                    <ul class="mb-0">
                        <li class="mb-2">Hands-on technical learning</li>
                        <li class="mb-2">Stronger collaboration and communication skills</li>
                        <li class="mb-2">Connection with other students in tech</li>
                        <li class="mb-0">Support for academic and career development</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5>UNCP ACM Chapter</h5>
                <p class="mb-0">
                    Supporting students in computing, collaboration, innovation,
                    and professional growth.
                </p>
            </div>

            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>Member Access</h5>
                <ul class="footer-links">
                    <li><a href="register.php">Join ACM</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-line">
        <p class="text-center mb-0">© 2026 UNCP ACM Student Chapter. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>