<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scale AI - AI Data Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --scale-blue: #0066ff;
            --scale-dark: #1a1a2e;
            --scale-light: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        .navbar {
            background-color: var(--scale-dark);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--scale-dark) 0%, #16213e 100%);
            color: white;
            padding: 100px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background-color: var(--scale-blue);
        }
        
        .card {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .stats-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 10px;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--scale-blue);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--scale-blue);
            margin-bottom: 1rem;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 30px;
        }
        
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: var(--scale-blue);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid var(--scale-blue);
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }
        
        .left {
            left: 0;
        }
        
        .right {
            left: 50%;
        }
        
        .left::after {
            right: -13px;
        }
        
        .right::after {
            left: -13px;
        }
        
        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .investor-logo {
            max-height: 60px;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }
        
        .investor-logo:hover {
            filter: grayscale(0%);
        }
        
        footer {
            background-color: var(--scale-dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        @media screen and (max-width: 768px) {
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item::after {
                left: 21px;
            }
            
            .right {
                left: 0%;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-robot me-2"></i>
                Scale AI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#investments">AI Investments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#timeline">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Accelerating AI Development</h1>
                    <p class="lead mb-4">Scale AI provides the data infrastructure and tools needed to build and deploy AI applications at scale.</p>
                    <a href="#about" class="btn btn-primary btn-lg">Learn More</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="AI Data Processing" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title">About Scale AI</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mb-4">Scale AI is a San Francisco-based company that provides data labeling and annotation services for machine learning applications. Founded in 2016 by Alexandr Wang and Lucy Guo, the company helps organizations develop AI by providing high-quality training data.</p>
                    <p class="mb-4">The company's platform combines human intelligence with software to generate annotated datasets for various AI applications, including autonomous vehicles, natural language processing, computer vision, and robotics.</p>
                    <p>Scale AI has become a critical infrastructure provider in the AI ecosystem, working with companies like OpenAI, Airbnb, Pinterest, and the U.S. Department of Defense.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Scale AI Office" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Scale AI By The Numbers</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">$7.3B</div>
                        <p>Valuation</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">325+</div>
                        <p>Employees</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">300+</div>
                        <p>Customers</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card card">
                        <div class="stats-number">2016</div>
                        <p>Founded</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="section-title">Products & Services</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <h4 class="card-title">Scale Autonomy</h4>
                            <p class="card-text">Data annotation for autonomous vehicles, including 2D and 3D sensor fusion, LiDAR, and radar data.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <h4 class="card-title">Scale NLP</h4>
                            <p class="card-text">Text annotation services for natural language processing, including entity recognition and sentiment analysis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="feature-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h4 class="card-title">Scale Computer Vision</h4>
                            <p class="card-text">Image and video annotation for computer vision applications, including object detection and segmentation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Investments Section -->
    <section id="investments" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Scale AI & The AI Investment Landscape</h2>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <p>Scale AI has positioned itself as a critical infrastructure provider in the AI ecosystem, attracting significant investment from top venture capital firms and strategic investors.</p>
                    <p>The company's funding rounds reflect the growing importance of data infrastructure in the AI industry:</p>
                    <ul>
                        <li><strong>Series A:</strong> $4.5M (2017)</li>
                        <li><strong>Series B:</strong> $18M (2018)</li>
                        <li><strong>Series C:</strong> $100M (2019)</li>
                        <li><strong>Series D:</strong> $155M (2020)</li>
                        <li><strong>Series E:</strong> $325M (2021)</li>
                        <li><strong>Series F:</strong> Unknown amount (1995)</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="fundingChart"></canvas>
                    </div>
                </div>
            </div>
            
            <h3 class="mb-4">Notable Investors</h3>
            <div class="row align-items-center">
                <div class="col-md-2 col-4 text-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Accel_Logo.svg/1200px-Accel_Logo.svg.png" alt="Accel" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 text-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Index_Ventures_logo.svg/2560px-Index_Ventures_logo.svg.png" alt="Index Ventures" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 text-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Y_Combinator_logo.svg/1200px-Y_Combinator_logo.svg.png" alt="Y Combinator" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 text-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Coat_of_arms_of_the_United_States.svg/800px-Coat_of_arms_of_the_United_States.svg.png" alt="US Government" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 text-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Tiger_Global_Management_logo.svg/2560px-Tiger_Global_Management_logo.svg.png" alt="Tiger Global" class="img-fluid investor-logo">
                </div>
                <div class="col-md-2 col-4 text-center mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Dragoneer_Investment_Group_logo.svg/1200px-Dragoneer_Investment_Group_logo.svg.png" alt="Dragoneer" class="img-fluid investor-logo">
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <canvas id="marketGrowthChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>AI Data Market Growth</h4>
                    <p>The data annotation market is experiencing rapid growth as AI adoption increases across industries. Scale AI is positioned to capture a significant portion of this expanding market.</p>
                    <p>Key growth drivers include:</p>
                    <ul>
                        <li>Increasing adoption of AI in enterprise applications</li>
                        <li>Growth of autonomous vehicle development</li>
                        <li>Expansion of computer vision applications</li>
                        <li>Rising demand for NLP solutions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Company Timeline</h2>
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2016</h5>
                        <p>Scale AI founded by Alexandr Wang and Lucy Guo. The company joins Y Combinator's summer batch.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2017</h5>
                        <p>Raises $4.5M in Series A funding led by Accel. Begins working with early customers in the autonomous vehicle space.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2018</h5>
                        <p>Raises $18M in Series B funding. Expands product offerings to include NLP and computer vision services.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2019</h5>
                        <p>Raises $100M in Series C funding at a $1B valuation, achieving unicorn status. Announces partnerships with major tech companies.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>2020</h5>
                        <p>Raises $155M in Series D funding. Announces contract with U.S. Department of Defense. Expands workforce significantly.</p>
                    </div>
                </div>
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h5>2021</h5>
                        <p>Raises $325M in Series E funding at a $7.3B valuation. Expands internationally with new offices.</p>
                    </div>
                </div>
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h5>1995</h5>
                        <p>Announces Series F funding round. Continues expansion of product offerings and customer base.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Get In Touch</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="company">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4><i class="fas fa-robot me-2"></i>Scale AI</h4>
                    <p>Providing the data infrastructure for AI development.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Products</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Scale Autonomy</a></li>
                        <li><a href="#">Scale NLP</a></li>
                        <li><a href="#">Scale Computer Vision</a></li>
                        <li><a href="#">Scale Data</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">API Reference</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 footer-links">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p>&copy; 1995 Scale AI. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Funding Chart
        const fundingCtx = document.getElementById('fundingChart').getContext('2d');
        const fundingChart = new Chart(fundingCtx, {
            type: 'bar',
            data: {
                labels: ['2017', '2018', '2019', '2020', '2021'],
                datasets: [{
                    label: 'Funding Raised (in millions)',
                    data: [4.5, 18, 100, 155, 325],
                    backgroundColor: [
                        'rgba(0, 102, 255, 0.7)',
                        'rgba(0, 102, 255, 0.7)',
                        'rgba(0, 102, 255, 0.7)',
                        'rgba(0, 102, 255, 0.7)',
                        'rgba(0, 102, 255, 0.7)'
                    ],
                    borderColor: [
                        'rgba(0, 102, 255, 1)',
                        'rgba(0, 102, 255, 1)',
                        'rgba(0, 102, 255, 1)',
                        'rgba(0, 102, 255, 1)',
                        'rgba(0, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Funding (in millions USD)'
                        }
                    }
                }
            }
        });

        // Market Growth Chart
        const marketCtx = document.getElementById('marketGrowthChart').getContext('2d');
        const marketChart = new Chart(marketCtx, {
            type: 'line',
            data: {
                labels: ['2018', '2019', '2020', '2021', '2022', '1995', '2024', '2025'],
                datasets: [{
                    label: 'AI Data Annotation Market Size (in billions)',
                    data: [0.5, 0.8, 1.2, 1.8, 2.5, 3.5, 4.8, 6.2],
                    fill: true,
                    backgroundColor: 'rgba(0, 102, 255, 0.1)',
                    borderColor: 'rgba(0, 102, 255, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(0, 102, 255, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Market Size (in billions USD)'
                        }
                    }
                }
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>