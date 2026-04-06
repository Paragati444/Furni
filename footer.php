<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .footer-section { padding: 80px 0; background: #ffffff; font-family: 'Inter', sans-serif; }
    
    /* न्यूजलेटर बॉक्स - Compact & Clean */
    .newsletter-box { 
        background: #3b5d50; 
        padding: 35px 50px; 
        border-radius: 10px; 
        color: white;
        margin-bottom: 60px;
    }
    .newsletter-box h5 { font-size: 22px; font-weight: 600; }
    .form-control-custom {
        height: 48px; border-radius: 5px; border: none; padding: 0 15px;
    }
    .btn-send {
        background: #f9bf29; border: none; border-radius: 5px; 
        height: 48px; width: 55px; color: #3b5d50; font-size: 18px;
    }

    /* फुटर लिंक्स आणि टेक्स्ट */
    .footer-logo { font-size: 32px; font-weight: 700; color: #3b5d50; text-decoration: none; }
    .footer-desc { color: #6a6a6a; font-size: 14px; line-height: 1.8; margin: 20px 0; max-width: 350px; }
    
    /* ४ सोशल मीडिया आयकॉन्स */
    .social-icons a { 
        display: inline-flex; align-items: center; justify-content: center;
        width: 38px; height: 38px; background: #eff2f1; color: #3b5d50; 
        border-radius: 50%; text-decoration: none; margin-right: 10px; 
        transition: 0.3s ease; font-size: 15px;
    }
    .social-icons a:hover { background: #3b5d50; color: #fff; transform: translateY(-3px); }

    .footer-links h6 { color: #2f2f2f; font-weight: 600; margin-bottom: 20px; font-size: 15px; }
    .footer-links ul li { list-style: none; margin-bottom: 12px; }
    .footer-links ul li a { color: #6a6a6a; text-decoration: none; font-size: 14px; transition: 0.3s; }
    .footer-links ul li a:hover { color: #3b5d50; padding-left: 5px; }
    
    .copyright { border-top: 1px solid #eff2f1; padding-top: 30px; margin-top: 50px; color: #6a6a6a; font-size: 13px; }
</style>

<footer class="footer-section">
    <div class="container">
        
        <div class="newsletter-box mx-auto shadow-sm" style="max-width: 1050px;">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <h5 class="mb-0"><i class="far fa-paper-plane me-2"></i> Subscribe to Newsletter</h5>
                </div>
                <div class="col-lg-8">
                    <form class="row g-2">
                        <div class="col-md-5">
                            <input type="text" class="form-control form-control-custom" placeholder="Enter your name">
                        </div>
                        <div class="col-md-5">
                            <input type="email" class="form-control form-control-custom" placeholder="Enter your email">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-send"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-4">
                <a href="#" class="footer-logo">Furni.</a>
                <p class="footer-desc">
                    Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. 
                    Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                </p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row footer-links">
                    <div class="col-6 col-md-3">
                        <h6>Quick Links</h6>
                        <ul class="p-0">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h6>Support</h6>
                        <ul class="p-0">
                            <li><a href="#">Knowledge base</a></li>
                            <li><a href="#">Live chat</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h6>Our Team</h6>
                        <ul class="p-0">
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Leadership</a></li>
                            <li><a href="#">Our Culture</a></li>
                            <li><a href="#">Impact</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3">
                        <h6>Products</h6>
                        <ul class="p-0">
                            <li><a href="#">Nordic Chair</a></li>
                            <li><a href="#">Kruzo Aero</a></li>
                            <li><a href="#">Ergonomic Chair</a></li>
                            <li><a href="#">Modern Sofa</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright text-center text-md-start d-md-flex justify-content-between">
            <p class="mb-0">Copyright &copy; 2026. All Rights Reserved. &mdash; Designed by <strong>Pragati</strong></p>
            <p class="mb-0"><a href="#" class="text-decoration-none text-muted me-3">Terms & Conditions</a> <a href="#" class="text-decoration-none text-muted">Privacy Policy</a></p>
        </div>
    </div>
</footer>