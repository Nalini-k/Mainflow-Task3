<?php
// Assuming session is started in your application to check login status
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - LearnQuest</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="style.css"> <!-- Assuming style.css is in the same directory -->
</head>
<body>

<!-- Header Section -->
<header>
    <div class="container">
        <a href="#" class="logo">LearnQuest</a>
        <nav>
            <ul class="nav-list">
                <li><a href="#home">Home</a></li>
                <li class="dropdown">
                    <a href="#courses">Courses</a>
                    <ul class="dropdown-content">
                        <li><a href="#web-design">Web Design</a></li>
                        <li><a href="#seo-services">SEO Services</a></li>
                        <li><a href="#programming">Programming</a></li>
                        <li><a href="#data-science">Data Science</a></li>
                    </ul>
                </li>
                <li><a href="#mylearning">My Learning</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#aboutus">About Us</a></li>

                <!-- Show account and logout links if user is logged in -->
                <?php if ($isLoggedIn): ?>
                    <li><a href="#account">Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Show login and sign-up links if user is not logged in -->
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content Section -->
<main>
    <?php if ($isLoggedIn): ?>
        <!-- If user is logged in, display personalized content -->
        <section id="home" class="hero">
            <div class="container">
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
                <p>Unlock Your Potential with LearnQuest.</p>
                <a href="#start-learning" class="cta-button">Start Learning</a>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features">
            <div class="container">
                <h2>Why Choose LearnQuest?</h2>
                <div class="feature-grid">
                    <div class="feature-item">
                        <h3>Diverse Courses</h3>
                        <p>Explore a wide range of subjects taught by expert instructors.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Flexible Learning</h3>
                        <p>Learn at your own pace with 24/7 access to course materials.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Interactive Content</h3>
                        <p>Engage with quizzes, projects, and peer discussions.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Certificates</h3>
                        <p>Earn recognized certificates upon course completion.</p>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- If user is not logged in, display a call-to-action -->
        <section id="home" class="hero">
            <div class="container">
                <h1>Unlock Your Potential with LearnQuest</h1>
                <p>Discover a world of knowledge at your fingertips. Learn anytime, anywhere.</p>
                <a href="login.php" class="cta-button">Get Started</a>
            </div>
        </section>
    <?php endif; ?>
</main>

<!-- Footer Section -->
<footer>
    <div class="container">
        <p>&copy; 2025 LearnQuest. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
