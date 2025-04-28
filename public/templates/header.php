<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header class="header">
    <div class="main-nav">
        <div class="logo-container">
            <img src="assets/images/logo.png" alt="TutorialsPoint Logo" class="logo">
        </div>

        <div class="category-dropdown">
                <button class="category-toggle">
                    <i class="fas fa-th-large"></i>
                    Categories
                    <i class="fas fa-chevron-down"></i>
                </button>
                
                <div class="mega-menu">
                    <div class="menu-wrapper">
                        <!-- Sidebar -->
                        <div class="menu-sidebar">
                            <div class="category-list">
                                <div class="category-item active" data-category="it">
                                    <span>Information Technology</span>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="category-item" data-category="government">
                                    <span>Government Exams</span>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <div class="category-item" data-category="bank">
                                    <span>Banking Exams</span>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                            <!-- <button class="all-categories-btn">
                                <i class="fas fa-list-ul"></i>
                                View All Categories
                            </button> -->
                        </div>

                        <!-- Content Area -->
                        <div class="menu-content">
                            <!-- IT Content -->
                            <div class="category-panel active" data-category="it">
                                <div class="subcategory-group">
                                    <h3>Programming Languages</h3>
                                    <div class="subcategory-grid">
                                        <a href="#" class="subcategory-item">
                                            <i class="fab fa-php"></i>
                                            PHP
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fab fa-css3-alt"></i>
                                            CSS
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fab fa-html5"></i>
                                            HTML5
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fab fa-js-square"></i>
                                            JavaScript
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fab fa-python"></i>
                                            Python
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fab fa-java"></i>
                                            Java
                                        </a>
                                    </div>
                                </div>

                                <div class="subcategory-group">
                                    <h3>Core Subjects</h3>
                                    <div class="subcategory-grid">
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-database"></i>
                                            DBMS
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-project-diagram"></i>
                                            DSA
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-cogs"></i>
                                            Operating Systems
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-network-wired"></i>
                                            Computer Networks
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Government Content -->
                            <div class="category-panel" data-category="government">
                                <div class="subcategory-group">
                                    <h3>SSC CGL Subjects</h3>
                                    <div class="subcategory-grid">
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-brain"></i>
                                            Aptitude
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-puzzle-piece"></i>
                                            Reasoning
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-calculator"></i>
                                            Quantitative Aptitude
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-book-open"></i>
                                            English
                                        </a>
                                    </div>
                                </div>

                                <div class="subcategory-group">
                                    <h3>Other Government Exams</h3>
                                    <div class="subcategory-grid">
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-university"></i>
                                            UPSC Prelims
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-train"></i>
                                            RRB NTPC
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-file-alt"></i>
                                            SSC CHSL
                                        </a>
                                        <a href="#" class="subcategory-item">
                                            <i class="fas fa-landmark"></i>
                                            Bank PO
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Content -->
                            <div class="category-panel" data-category="bank">
                                <div class="coming-soon">
                                    <i class="fas fa-coins"></i>
                                    <h3>Banking Categories Coming Soon</h3>
                                    <p>We're working on comprehensive banking exam content!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="search-bar">
            <input type="text" placeholder="Search your favourite Mcqs..." class="search-input">
        </div>

        <nav class="nav-links">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-book"></i>
                <span>Library</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Courses</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-certificate"></i>
                <span>Certifications</span>
            </a>
            <!-- Modified Login Button -->
           <!-- <a href="#" class="login-btn">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="20" width="20">
                   <path fill="currentColor" d="M23.15 2.587L18.21 0.210001C17.9308 0.075557 17.6167 0.031246 17.3113 0.083204C17.0058 0.135162 16.724 0.280818 16.505 0.500001L7.04499 9.13L2.92499 6.002C2.73912 5.86101 2.50976 5.78953 2.27669 5.79994C2.04363 5.81035 1.82156 5.902 1.64899 6.059L0.326993 7.261C0.223973 7.35465 0.141644 7.46878 0.0852761 7.59608C0.0289081 7.72339 -0.00025659 7.86106 -0.000350724 8.00028C-0.000444857 8.1395 0.0285336 8.27721 0.0847294 8.40459C0.140925 8.53197 0.2231 8.64621 0.325993 8.74L3.89899 12L0.325993 15.26C0.2231 15.3538 0.140925 15.468 0.0847294 15.5954C0.0285336 15.7228 -0.000444857 15.8605 -0.000350724 15.9997C-0.00025659 16.1389 0.0289081 16.2766 0.0852761 16.4039C0.141644 16.5312 0.223973 16.6454 0.326993 16.739L1.64999 17.94C1.82256 18.097 2.04463 18.1887 2.27769 18.1991C2.51076 18.2095 2.74012 18.138 2.92599 17.997L7.04599 14.869L16.506 23.499C16.7248 23.7182 17.0064 23.8639 17.3117 23.9159C17.6171 23.9679 17.931 23.9235 18.21 23.789L23.152 21.412C23.4062 21.2893 23.6207 21.0973 23.7707 20.8581C23.9207 20.619 24.0002 20.3423 24 20.06V3.939C24 3.65647 23.9203 3.37967 23.7699 3.14048C23.6195 2.90129 23.4046 2.70943 23.15 2.587ZM18.004 17.448L10.826 12L18.004 6.552V17.448Z"></path>
               </svg>
               <span class="btn-text">Login</span>
           </a> -->
           <a href="user/login_signup.html" class="login-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                    <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM8 20H4V4h4v16zm6 0h-4V4h4v16zm6 0h-4V4h4v16z"/>
                </svg>
                <span class="btn-text">Login</span>
            </a>
        </nav>
    </div>

    <div class="sub-nav-container">
        <nav class="sub-nav">
            <!-- Keep your existing sub-nav links here -->
            <a href="#"><i class="fa-brands fa-database"></i> SQL</a>
        <a href="#"><i class="fa-brands fa-html5"></i> HTML</a>
        <a href="#"><i class="fa-brands fa-css3-alt"></i> CSS</a>
        <a href="#"><i class="fa-brands fa-js"></i> JavaScript</a>
        <a href="#"><i class="fa-brands fa-python"></i> Python</a>
        <a href="#"><i class="fa-brands fa-java"></i> Java</a>
        <a href="#"><i class="fa-solid fa-code"></i> C</a>
        <a href="#"><i class="fa-solid fa-code"></i> C++</a>
        <a href="#"><i class="fa-brands fa-php"></i> PHP</a>
        <a href="#"><i class="fa-brands fa-java"></i> Scala</a>
        <a href="#"><i class="fa-brands fa-microsoft"></i> C#</a>
        <a href="#"><i class="fa-brands fa-css3-alt"></i> Tailwind CSS</a>
        <a href="#"><i class="fa-brands fa-node-js"></i> Node.js</a>
        </nav>
    </div>
</header>
    
<script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     const categoryItems = document.querySelectorAll('.category-item');
        //     const categoryPanels = document.querySelectorAll('.category-panel');

        //     categoryItems.forEach(item => {
        //         item.addEventListener('mouseenter', () => {
        //             // Remove active classes
        //             categoryItems.forEach(c => c.classList.remove('active'));
        //             categoryPanels.forEach(p => p.classList.remove('active'));
                    
        //             // Get target category
        //             const category = item.dataset.category;
                    
        //             // Add active classes
        //             item.classList.add('active');
        //             document.querySelector(`.category-panel[data-category="${category}"]`)
        //                 .classList.add('active');
        //         });
        //     });

        //     // Close dropdown when clicking outside
        //     document.addEventListener('click', (e) => {
        //         if (!e.target.closest('.category-dropdown')) {
        //             document.querySelector('.mega-menu').style.opacity = '0';
        //             document.querySelector('.mega-menu').style.visibility = 'hidden';
        //         }
        //     });
        // });
        
    </script>
</body>
</html>
