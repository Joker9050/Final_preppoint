
    <!-- Header -->
   <?php include 'templates\header.php';?>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to PrepPoint</h1>
            <p>Your one-stop solution for MCQs and PYQs Pratice</p>
            <a href="#about" class="btn">Get Started</a>
        </div>
        
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>PrepPoint is dedicated to helping learners excel in IT and programming with a comprehensive collection of MCQs and resources.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2>Our Features</h2>
            <div class="feature-list">
                <div class="feature">
                    <h3>Comprehensive MCQs</h3>
                    <p>Access top-notch questions categorized by subject and topic.</p>
                </div>
                <div class="feature">
                    <h3>Interactive Platform</h3>
                    <p>Learn and practice with ease on a user-friendly interface.</p>
                </div>
                <div class="feature">
                    <h3>Progress Tracking</h3>
                    <p>Monitor your performance and improve continuously.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- subject grid start -->
    <section id="learning" class="learning">
    <div class="container">
        <h2>Start <span>Learning IT</span></h2>
        <div class="learning-controls">
            <button id="scrollLeft" class="scroll-btn">&#10094;</button>
            <!-- <button id="seeAll" class="see-all">See All</button> -->
            <button id="scrollRight" class="scroll-btn">&#10095;</button>
        </div>
        <div class="learning-grid" id="learningGrid">
            <div class="card">
                <h3>Machine Learning</h3>
                <!-- <p>Learn the basics of ML and AI.</p> -->
            </div>
            <div class="card">
                <h3>Computer Fundamentals</h3>
                <!-- <p>Understand the basics of computing.</p> -->
            </div>
            <div class="card">
                <h3>DBMS</h3>
                <!-- <p>Master database management systems.</p> -->
            </div>
            <div class="card">
                <h3>Operating System</h3>
                <!-- <p>Explore OS concepts and functionalities.</p> -->
            </div>
            <div class="card">
                <h3>Computer Networks</h3>
                <!-- <p>Learn about networking and protocols.</p> -->
            </div>
            <div class="card">
                <h3>PHP</h3>
                <!-- <p>Build dynamic websites with PHP.</p> -->
            </div>
            <div class="card">
                <h3>CSS</h3>
                <!-- <p>Style your websites beautifully.</p> -->
            </div>
            <div class="card">
                <h3>C</h3>
                <!-- <p>Get started with C programming.</p> -->
            </div>
            <div class="card">
                <h3>Java</h3>
                <!-- <p>Develop applications with Java.</p> -->
            </div>
            <div class="card">
                <h3>JavaScript</h3>
                <!-- <p>Create interactive web pages.</p> -->
            </div>
        </div>
        <div class="see-more-container">
            <button id="seeMore" class="see-more">SEE MORE</button>
        </div>
    </div>
</section>
    <!-- subject grid end  -->
    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
   <?php include 'templates\footer.php';?>
</body> 

</html>
<script>
    <?php include 'assets/js/user_script.js';?>
</script>
