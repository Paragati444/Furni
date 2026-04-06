<?php include('header.php'); ?>

<div class="hero" style="background: #3b5d50; padding: 120px 0; color: white; position: relative; overflow: hidden;">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <div class="intro-excerpt">
                    <h1 class="fw-bold display-3 mb-3">Get In Touch</h1>
                    <p class="mb-5" style="opacity: 0.8; font-size: 18px; line-height: 1.8;">
                        We are here to help you transform your space. Whether you have a question about our products or need expert interior advice, feel free to reach out!
                    </p>
                    <div class="hero-buttons">
                        <a href="shop.php" class="btn" style="background: #f9bf29; color: #2f2f2f; padding: 15px 35px; border-radius: 50px; font-weight: 700; transition: 0.3s; border: none; box-shadow: 0 4px 15px rgba(249, 191, 41, 0.3); margin-right: 15px;">Shop Now</a>
                        
                        <a href="blog.php" class="btn btn-outline-white" style="padding: 15px 35px; border-radius: 50px; font-weight: 600; transition: 0.3s; border: 2px solid rgba(255,255,255,0.5);">Read Blog</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid" style="filter: drop-shadow(0 20px 30px rgba(0,0,0,0.2));" alt="Modern Furniture">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-section" style="padding: 100px 0; background: #eff2f1;">
    <div class="container">
        <div class="row g-5">
            
            <div class="col-lg-4">
                <div class="contact-info-wrap p-4 shadow-sm" style="background: #ffffff; border-radius: 20px; height: 100%;">
                    <h3 class="fw-bold mb-4" style="color: #3b5d50;">Contact Details</h3>
                    <p class="text-muted mb-5">Our team is available to assist you during business hours. Here is how you can find us.</p>
                    
                    <div class="d-flex mb-4 align-items-center">
                        <div style="width: 50px; height: 50px; background: #eff2f1; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                            <i class="fas fa-map-marker-alt" style="color: #3b5d50;"></i>
                        </div>
                        <div>
                            <p class="mb-0 small text-muted">Office Address</p>
                            <p class="mb-0 fw-bold">Akluj, Maharashtra, India</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4 align-items-center">
                        <div style="width: 50px; height: 50px; background: #eff2f1; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                            <i class="fas fa-envelope" style="color: #3b5d50;"></i>
                        </div>
                        <div>
                            <p class="mb-0 small text-muted">Email Address</p>
                            <p class="mb-0 fw-bold">support@furni.com</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4 align-items-center">
                        <div style="width: 50px; height: 50px; background: #eff2f1; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                            <i class="fas fa-phone-alt" style="color: #3b5d50;"></i>
                        </div>
                        <div>
                            <p class="mb-0 small text-muted">Phone Number</p>
                            <p class="mb-0 fw-bold">+91 98765 43210</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="form-container p-5 shadow-sm" style="background: #ffffff; border-radius: 20px; border: 1px solid rgba(0,0,0,0.05);">
                    <h3 class="fw-bold mb-4">Send a Message</h3>
                    <form action="process_contact.php" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="fw-bold mb-2">First Name</label>
                                <input type="text" name="fname" placeholder="Enter your first name" class="form-control" style="background: #f8f9fa; border: none; padding: 15px; border-radius: 10px;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-2">Last Name</label>
                                <input type="text" name="lname" placeholder="Enter your last name" class="form-control" style="background: #f8f9fa; border: none; padding: 15px; border-radius: 10px;" required>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold mb-2">Email Address</label>
                                <input type="email" name="email" placeholder="example@email.com" class="form-control" style="background: #f8f9fa; border: none; padding: 15px; border-radius: 10px;" required>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold mb-2">Message</label>
                                <textarea name="message" rows="5" placeholder="How can we help you?" class="form-control" style="background: #f8f9fa; border: none; padding: 15px; border-radius: 10px;" required></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn" style="background: #3b5d50; color: white; padding: 15px 45px; border-radius: 50px; font-weight: 600; border: none; transition: 0.3s;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Professional Styling Improvements */
    .btn:hover { opacity: 0.9; transform: translateY(-2px); }
    .hero-buttons .btn-outline-white:hover { background: white; color: #3b5d50; }
    input:focus, textarea:focus { background: #ffffff !important; border: 1px solid #3b5d50 !important; box-shadow: none !important; }
    ::placeholder { color: #adb5bd; font-size: 14px; }
</style>

<?php include('footer.php'); ?>