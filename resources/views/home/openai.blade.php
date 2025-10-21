<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI - AI Investment Analysis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --dark-green: #0a2e1a;
            --medium-green: #1a4d2e;
            --light-green: #2e8b57;
            --accent-green: #3cb371;
            --text-color: #e8f5e9;
        }

        body {
            background-color: var(--dark-green);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Floating code numbers background */
        #code-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        .code-number {
            position: absolute;
            color: var(--accent-green);
            font-family: monospace;
            font-size: 14px;
            opacity: 0;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.7;
            }

            90% {
                opacity: 0.7;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Navigation */
        .navbar {
            background-color: rgba(10, 46, 26, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--accent-green);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--accent-green) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--accent-green) !important;
        }

        /* Hero Section */
        .hero-section {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--medium-green) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            /* Increased from 700 to 900 for thickness */
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--accent-green), #7cfc00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
            /* Added shadow effect */
            letter-spacing: 0.5px;
            /* Slightly increased letter spacing for better readability */
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Company Cards */
        .company-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(60, 179, 113, 0.3);
            height: 100%;
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-green);
        }

        .company-logo {
            height: 60px;
            margin-bottom: 15px;
            object-fit: contain;
            max-width: 100%;
        }

        .stock-widget {
            background: rgba(10, 46, 26, 0.8);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-green);
        }

        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-green);
        }

        .stock-change {
            font-size: 0.9rem;
        }

        .positive {
            color: #7cfc00;
        }

        .negative {
            color: #ff4d4d;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-green);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-green);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Stock Charts Section */
        .stock-charts-section {
            padding: 80px 0;
            background: rgba(26, 77, 46, 0.3);
        }

        .chart-container {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            height: 100%;
        }

        .chart-title {
            color: var(--accent-green);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        /* Content Cards */
        .content-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-green);
        }

        .content-card h3 {
            color: var(--accent-green);
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .content-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            height: auto;
        }

        /* Stats Cards */
        .stats-card {
            background: rgba(26, 77, 46, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(60, 179, 113, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-green);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--accent-green);
            margin-bottom: 10px;
        }

        .stats-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
            margin-top: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--accent-green);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -23px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--accent-green);
        }

        .timeline-date {
            font-weight: bold;
            color: var(--accent-green);
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 46, 26, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--accent-green);
        }

        .footer-heading {
            color: var(--accent-green);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .stats-number {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Code Background -->
    <div id="code-background"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <i class="fas fa-brain me-2"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Companies
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="companiesDropdown">
                            <li><a class="dropdown-item" href="nvidia">Nvidia</a></li>
                            <li><a class="dropdown-item" href="openai">OpenAI</a></li>
                            <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                            <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                            <li><a class="dropdown-item" href="google">Google</a></li>
                            <li><a class="dropdown-item" href="facebook">Facebook</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="anthropic">Anthropic</a></li>
                            <li><a class="dropdown-item" href="stability">Stability AI</a></li>
                            <li><a class="dropdown-item" href="cohere">Cohere</a></li>
                            <li><a class="dropdown-item" href="huggingface">Hugging Face</a></li>
                            <li><a class="dropdown-item" href="scale">Scale AI</a></li>
                            <li><a class="dropdown-item" href="runway">Runway AI</a></li>
                            <li><a class="dropdown-item" href="character">Character.AI</a></li>
                            <li><a class="dropdown-item" href="inflection">Inflection AI</a></li>
                            <li><a class="dropdown-item" href="mistral">Mistral AI</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="investment">Investment Tiers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="insurance">Insurance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etf&funds">Etf&Funds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About</a>
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
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/OpenAI_Logo.svg/1200px-OpenAI_Logo.svg.png"
                        alt="OpenAI" class="company-logo mb-4" style="height: 80px;">
                    <h1 class="hero-title">OpenAI</h1>
                    <p class="hero-subtitle">Pioneering Artificial General Intelligence for the benefit of humanity</p>
                    <div class="mt-4">
                        <a href="#investment-analysis" class="btn btn-primary btn-lg me-3">Investment Analysis</a>
                        <br><br>
                        <a href="#company-overview" class="btn btn-outline-light btn-lg">Company Overview</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-card">
                        <div class="stock-widget">
                            <div class="stock-price">$86B</div>
                            <div class="stock-change positive">Microsoft Backed <i class="fas fa-arrow-up"></i></div>
                            <small>Latest Valuation</small>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">2015</div>
                                    <div class="stats-label">Founded</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">$11B+</div>
                                    <div class="stats-label">Funding Raised</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">100M+</div>
                                    <div class="stats-label">Weekly ChatGPT Users</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stats-card">
                                    <div class="stats-number">92%</div>
                                    <div class="stats-label">Fortune 500 Usage</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Overview Section -->
    <section id="company-overview" class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Company Overview</h2>
                <p>Understanding OpenAI's mission, history, and impact on the AI landscape</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="content-card">
                        <h3>About OpenAI</h3>
                        <p>OpenAI is an American artificial intelligence research laboratory consisting of the
                            for-profit OpenAI LP and its parent company, the non-profit OpenAI Inc. Founded in December
                            2015, the organization aims to promote and develop friendly AI in a way that benefits
                            humanity as a whole.</p>

                        <p>The company is best known for its GPT (Generative Pre-trained Transformer) series of language
                            models, including GPT-3 and GPT-4, which power its popular ChatGPT application. OpenAI's
                            mission is to ensure that artificial general intelligence (AGI) benefits all of humanity.
                        </p>

                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Technology" class="img-fluid">

                        <h4 class="mt-4">Key Focus Areas</h4>
                        <ul>
                            <li><strong>Large Language Models (LLMs):</strong> Developing advanced AI models capable of
                                understanding and generating human-like text</li>
                            <li><strong>AI Safety Research:</strong> Ensuring AI systems are aligned with human values
                                and can be controlled safely</li>
                            <li><strong>Multimodal AI:</strong> Creating systems that can process and understand
                                multiple types of data (text, images, audio)</li>
                            <li><strong>AI Deployment:</strong> Building practical applications that make AI accessible
                                to businesses and individuals</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="content-card">
                        <h3>Leadership Team</h3>
                        <div class="mb-4">
                            <h5>Sam Altman</h5>
                            <p class="mb-1"><strong>CEO</strong></p>
                            <p>Former president of Y Combinator, leading OpenAI's mission and strategic direction</p>
                        </div>
                        <div class="mb-4">
                            <h5>Greg Brockman</h5>
                            <p class="mb-1"><strong>President & Chairman</strong></p>
                            <p>Former CTO of Stripe, overseeing technical strategy and research</p>
                        </div>
                        <div class="mb-4">
                            <h5>Ilya Sutskever</h5>
                            <p class="mb-1"><strong>Chief Scientist</strong></p>
                            <p>AI researcher and co-inventor of AlexNet, leading research efforts</p>
                        </div>
                        <div>
                            <h5>Mira Murati</h5>
                            <p class="mb-1"><strong>CTO</strong></p>
                            <p>Leading product development and technology implementation</p>
                        </div>
                    </div>

                    <div class="content-card">
                        <h3>Major Investors</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1200px-Microsoft_logo.svg.png"
                                alt="Microsoft" style="height: 30px; margin-right: 10px; width: 70px;">
                            <div>
                                <strong>Microsoft</strong>
                                <div class="small">$13B+ Investment</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img src="data:image/jpeg;base64,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"
                                alt="Khosla Ventures" style="height: 30px; margin-right: 10px; width: 70px;">
                            <div>
                                <strong>Khosla Ventures</strong>
                                <div class="small">Early Stage Investor</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://npr.brightspotcdn.com/dims3/default/strip/false/crop/4176x2784+0+0/resize/1100/quality/50/format/jpeg/?url=http%3A%2F%2Fnpr-brightspot.s3.amazonaws.com%2F32%2F45%2Fcfb9d8e94c1293ce30dff83c9d3e%2Fgettyimages-1833911986.jpg"
                                alt="Reid Hoffman" style="height: 30px; margin-right: 10px; width: 70px;">
                            <div>
                                <strong>Reid Hoffman</strong>
                                <div class="small">LinkedIn Co-founder</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Timeline -->
            <div class="content-card mt-4">
                <h3>Company Timeline</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">December 2015</div>
                        <p>OpenAI founded as a non-profit AI research company with $1 billion in funding from Elon Musk,
                            Sam Altman, and others.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">June 2018</div>
                        <p>Release of GPT-1, the first in the Generative Pre-trained Transformer series.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 2019</div>
                        <p>Transition to "capped-profit" model with OpenAI LP to attract investment while maintaining
                            mission alignment.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">July 2019</div>
                        <p>Microsoft invests $1 billion in OpenAI, forming a strategic partnership.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">June 2020</div>
                        <p>Release of GPT-3, a 175-billion parameter language model that demonstrated remarkable
                            capabilities.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">November 2022</div>
                        <p>Launch of ChatGPT, which quickly becomes the fastest-growing consumer application in history.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">January 1995</div>
                        <p>Microsoft announces additional multi-billion dollar investment in OpenAI.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">March 1995</div>
                        <p>Release of GPT-4, a more advanced multimodal model capable of processing both text and
                            images.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products & Technology Section -->
    <section class="py-5" style="background: rgba(26, 77, 46, 0.3);">
        <div class="container">
            <div class="section-header">
                <h2>Products & Technology</h2>
                <p>OpenAI's revolutionary AI models and applications</p>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="content-card h-100">
                        <h3>ChatGPT</h3>
                        <img src="https://images.unsplash.com/photo-1682687221363-72518513620e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="ChatGPT Interface">
                        <p>An AI-powered conversational agent that can answer questions, write content, and assist with
                            various tasks. ChatGPT reached 100 million monthly active users just two months after
                            launch.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">GPT-3.5</span>
                            <span class="badge bg-primary me-2">GPT-4</span>
                            <span class="badge bg-primary">Plus Version</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="content-card h-100">
                        <h3>GPT-4</h3>
                        <img src="data:image/png;base64,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"
                            alt="AI Model Visualization">
                        <p>The latest large language model with multimodal capabilities, able to process both text and
                            image inputs. GPT-4 demonstrates improved reasoning, creativity, and problem-solving
                            abilities compared to previous versions.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Multimodal</span>
                            <span class="badge bg-primary me-2">Advanced Reasoning</span>
                            <span class="badge bg-primary">Safer Responses</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="content-card h-100">
                        <h3>DALL-E</h3>
                        <img src="https://images.unsplash.com/photo-1682687220499-d9c06b872eee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="AI Generated Art">
                        <p>An AI system that can create realistic images and art from natural language descriptions.
                            DALL-E demonstrates the creative potential of AI and has applications in design, marketing,
                            and content creation.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Image Generation</span>
                            <span class="badge bg-primary me-2">Creative AI</span>
                            <span class="badge bg-primary">DALL-E 3</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>API & Developer Tools</h3>
                        <p>OpenAI provides API access to its models, allowing developers to integrate advanced AI
                            capabilities into their applications. The API has been adopted by thousands of companies for
                            various use cases:</p>
                        <ul>
                            <li>Content generation and summarization</li>
                            <li>Customer service automation</li>
                            <li>Code generation and assistance</li>
                            <li>Data analysis and insight generation</li>
                            <li>Educational tools and tutoring systems</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-success me-2">API Access</span>
                            <span class="badge bg-success me-2">Fine-tuning</span>
                            <span class="badge bg-success">Enterprise Solutions</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Research & Safety</h3>
                        <p>OpenAI maintains a strong focus on AI safety and alignment research to ensure that advanced
                            AI systems remain beneficial to humanity. Key research areas include:</p>
                        <ul>
                            <li>AI alignment with human values</li>
                            <li>Interpretability of neural networks</li>
                            <li>Robustness against adversarial attacks</li>
                            <li>Scalable oversight techniques</li>
                            <li>Cooperative AI development</li>
                        </ul>
                        <div class="mt-3">
                            <span class="badge bg-warning me-2 text-dark">AI Safety</span>
                            <span class="badge bg-warning me-2 text-dark">Alignment Research</span>
                            <span class="badge bg-warning text-dark">Policy Development</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Position & Competition -->
    <section class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Market Position & Competition</h2>
                <p>OpenAI's standing in the competitive AI landscape</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Competitive Landscape</h3>
                        <p>OpenAI faces competition from several major tech companies and AI startups:</p>

                        <div class="mb-3">
                            <h5>Google (Alphabet)</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 35%;"
                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">Bard & PaLM</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Anthropic</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 15%;"
                                    aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Claude</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Meta</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 20%;"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">LLaMA</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Other Competitors</h5>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 30%;"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Cohere, AI21 Labs, etc.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="content-card">
                        <h3>Market Share Analysis</h3>
                        <canvas id="marketShareChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Strategic Advantages</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-rocket fa-2x mb-3" style="color: var(--accent-green);"></i>
                                    <h5>First-Mover Advantage</h5>
                                    <p>Established brand recognition and user base with ChatGPT</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-handshake fa-2x mb-3" style="color: var(--accent-green);"></i>
                                    <h5>Microsoft Partnership</h5>
                                    <p>Deep integration with Azure and Microsoft products</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-flask fa-2x mb-3" style="color: var(--accent-green);"></i>
                                    <h5>Research Leadership</h5>
                                    <p>Continuous innovation in model architecture and capabilities</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Analysis Section -->
    <section id="investment-analysis" class="stock-charts-section">
        <div class="container">
            <div class="section-header">
                <h2>Investment Analysis</h2>
                <p>Comprehensive financial and strategic assessment of OpenAI</p>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Valuation Growth</h4>
                        <canvas id="valuationChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Revenue Projection</h4>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">User Growth Metrics</h4>
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <h4 class="chart-title">Market Opportunity</h4>
                        <canvas id="marketOpportunityChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="content-card">
                        <h3>Investment Thesis</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Bull Case</h5>
                                <ul>
                                    <li>Dominant position in rapidly growing generative AI market</li>
                                    <li>Strong Microsoft partnership providing distribution and infrastructure</li>
                                    <li>Continuous innovation maintaining technology leadership</li>
                                    <li>Multiple revenue streams (API, ChatGPT Plus, enterprise solutions)</li>
                                    <li>Potential to become foundational technology platform</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Risk Factors</h5>
                                <ul>
                                    <li>Intense competition from well-funded tech giants</li>
                                    <li>Regulatory uncertainty around AI development and deployment</li>
                                    <li>High computational costs impacting profitability</li>
                                    <li>AI safety concerns potentially limiting capabilities</li>
                                    <li>Dependence on key personnel and research breakthroughs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">$1B</div>
                        <div class="stats-label">Projected 2024 Revenue</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">50%</div>
                        <div class="stats-label">Annual Growth Rate</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="stats-card">
                        <div class="stats-number">2025</div>
                        <div class="stats-label">Potential IPO Timeline</div>
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
                    <h5 class="footer-heading">AI Investment Platform</h5>
                    <p>Harnessing the power of artificial intelligence to revolutionize investment strategies and
                        portfolio management.</p>
                    <div class="mt-3">
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/')}}" class="text-light">Home</a></li>
                        <li><a href="about" class="text-light">About Us</a></li>
                        <li><a href="contact" class="text-light">Contact</a></li>
                        <li><a href="faq" class="text-light">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Companies</h5>
                    <ul class="list-unstyled">
                        <li><a href="nvidia" class="text-light">Nvidia</a></li>
                        <li><a href="openai" class="text-light">OpenAI</a></li>
                        <li><a href="tesla" class="text-light">Tesla</a></li>
                        <li><a href="oracle" class="text-light">Oracle</a></li>
                        <li><a href="google" class="text-light">Google</a></li>
                        <li><a href="facebook" class="text-light">Facebook</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="footer-heading">Subscribe</h5>
                    <p>Get the latest investment insights delivered to your inbox.</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </div>
            </div>

            <hr class="mt-4" style="border-color: rgba(60, 179, 113, 0.3);">

            <div class="text-center py-3">
                <p class="mb-0">&copy; 1995 AI Investment Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Create floating code numbers
        document.addEventListener('DOMContentLoaded', function() {
            const codeBackground = document.getElementById('code-background');
            const codeNumbers = ['1010', '1100', '1001', '0110', '0101', '1110', '0011', '1011'];
            
            for (let i = 0; i < 50; i++) {
                const codeElement = document.createElement('div');
                codeElement.className = 'code-number';
                codeElement.textContent = codeNumbers[Math.floor(Math.random() * codeNumbers.length)];
                codeElement.style.left = Math.random() * 100 + 'vw';
                codeElement.style.animationDelay = Math.random() * 15 + 's';
                codeElement.style.fontSize = (Math.random() * 10 + 10) + 'px';
                codeBackground.appendChild(codeElement);
            }
            
            // Initialize charts
            initCharts();
        });
        
        // Initialize charts
        function initCharts() {
            // Market Share Chart
            const marketShareCtx = document.getElementById('marketShareChart').getContext('2d');
            new Chart(marketShareCtx, {
                type: 'doughnut',
                data: {
                    labels: ['OpenAI', 'Google', 'Anthropic', 'Meta', 'Others'],
                    datasets: [{
                        data: [40, 25, 10, 15, 10],
                        backgroundColor: [
                            '#3cb371',
                            '#4285F4',
                            '#8B5CF6',
                            '#1877F2',
                            '#FFA500'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Valuation Growth Chart
            const valuationCtx = document.getElementById('valuationChart').getContext('2d');
            new Chart(valuationCtx, {
                type: 'line',
                data: {
                    labels: ['2019', '2020', '2021', '2022', '1995'],
                    datasets: [{
                        label: 'Valuation ($B)',
                        data: [1, 14, 29, 20, 86],
                        borderColor: '#3cb371',
                        backgroundColor: 'rgba(60, 179, 113, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Revenue Projection Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['2022', '1995', '2024', '2025', '2026'],
                    datasets: [{
                        label: 'Revenue ($M)',
                        data: [30, 200, 1000, 2500, 5000],
                        backgroundColor: 'rgba(60, 179, 113, 0.7)',
                        borderColor: '#3cb371',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // User Growth Chart
            const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
            new Chart(userGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['Nov 2022', 'Dec 2022', 'Jan 1995', 'Feb 1995', 'Mar 1995', 'Apr 1995'],
                    datasets: [{
                        label: 'Monthly Active Users (Millions)',
                        data: [1, 10, 57, 100, 130, 173],
                        borderColor: '#7cfc00',
                        backgroundColor: 'rgba(124, 252, 0, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
            
            // Market Opportunity Chart
            const marketOpportunityCtx = document.getElementById('marketOpportunityChart').getContext('2d');
            new Chart(marketOpportunityCtx, {
                type: 'bar',
                data: {
                    labels: ['Content Creation', 'Customer Service', 'Software Development', 'Education', 'Healthcare', 'Research'],
                    datasets: [{
                        label: 'Market Size ($B)',
                        data: [150, 90, 70, 50, 40, 30],
                        backgroundColor: [
                            'rgba(60, 179, 113, 0.7)',
                            'rgba(124, 252, 0, 0.7)',
                            'rgba(46, 139, 87, 0.7)',
                            'rgba(102, 205, 170, 0.7)',
                            'rgba(143, 188, 143, 0.7)',
                            'rgba(60, 179, 113, 0.7)'
                        ],
                        borderColor: [
                            '#3cb371',
                            '#7cfc00',
                            '#2e8b57',
                            '#66cdaa',
                            '#8fbc8f',
                            '#3cb371'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e8f5e9'
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(232, 245, 233, 0.1)'
                            },
                            ticks: {
                                color: '#e8f5e9'
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>