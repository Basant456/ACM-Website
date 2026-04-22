<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - UNCP ACM Chapter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
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
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Join</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contact Section -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 55%, #e9eef5 45%); min-height: 100vh;">
    <div class="container">

        <!-- Title -->
        <div class="text-center mb-5">
            <span class="register-tag">Get In Touch</span>
            <h2 class="mt-3">Contact the UNCP ACM Chapter</h2>
            <p class="text-muted">
                Have questions, suggestions, or want to get involved? Reach out to us below.
            </p>
        </div>

        <div class="row g-4">

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="register-card">
                    <h4 class="mb-3">Send Us a Message</h4>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" placeholder="Write your message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-acm w-100">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="register-card">
                    <h4 class="mb-3">Contact Information</h4>

                    <p><strong>Email:</strong> acm@uncp.edu</p>
                    <p><strong>Location:</strong> UNCP Campus</p>
                    <p><strong>Office Hours:</strong> Mon–Fri, 2:00 PM – 5:00 PM</p>

                    <hr>

                    <h5>Why Contact Us?</h5>
                    <ul class="mb-0">
                        <li>Ask about upcoming events</li>
                        <li>Get help joining ACM</li>
                        <li>Collaborate on projects</li>
                        <li>Learn about workshops and opportunities</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
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