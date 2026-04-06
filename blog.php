<?php 
include('header.php'); 
include('db_connect.php'); // खात्री करा की तुमची db_connect.php फाईल बरोबर आहे
?>

<style>
    /* १. प्रोफेशनल ब्लॉग सेक्शन स्टाईलिंग */
    .blog-section { padding: 90px 0; background: #eff2f1; font-family: 'Inter', sans-serif; }
    
    .post-entry {
        background: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.4s ease;
        height: 100%;
        border: none;
    }

    .post-entry:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }

    .post-thumbnail {
        display: block;
        overflow: hidden;
        height: 240px;
    }

    .post-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .post-entry:hover .post-thumbnail img {
        transform: scale(1.1);
    }

    .post-content { padding: 25px; }
    
    .post-title { 
        font-size: 20px; 
        font-weight: 700; 
        color: #2f2f2f; 
        line-height: 1.4;
        margin-bottom: 12px;
        display: block;
        text-decoration: none;
    }

    .post-title:hover { color: #3b5d50; }

    .post-meta { font-size: 13px; color: #848484; margin-bottom: 15px; }
    .post-meta strong { color: #2f2f2f; }

    .read-more-btn {
        font-size: 14px;
        font-weight: 600;
        color: #3b5d50;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }

    .read-more-btn:hover { gap: 12px; color: #2f2f2f; }

    /* २. टेस्टिमोनियल सेक्शन फिक्स (सेंटर अलाईनमेंटसाठी) */
    .testimonial-section { 
        padding: 100px 0; 
        background: #ffffff; 
        text-align: center; 
    }

    .client-img { 
        width: 90px; 
        height: 90px; 
        border-radius: 50%; 
        border: 3px solid #3b5d50; 
        object-fit: cover; 
        margin: 0 auto 20px auto; /* इमेज सेंटरला आणण्यासाठी */
        display: block;
    }

    .testimonial-text {
        max-width: 800px;
        margin: 0 auto 30px auto; /* मजकूर सेंटरला आणि मर्यादित रुंदीत ठेवण्यासाठी */
        font-size: 18px;
        line-height: 1.8;
        color: #6c757d;
        font-style: italic;
    }
</style>

<div class="hero" style="background: #3b5d50; padding: 100px 0; color: white;">
    <div class="container text-center">
        <h1 class="fw-bold display-4 mb-3">Our Design Stories</h1>
        <p class="mx-auto" style="max-width: 700px; opacity: 0.8; font-size: 18px;">
            Expert home decor advice, interior inspiration, and professional tips for your dream home.
        </p>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <div class="row g-4">

            <?php
            // डेटाबेसमधून ब्लॉग्स ओढणे (Fetching)
            $sql = "SELECT * FROM blogs ORDER BY date DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-12 col-md-4">
                        <div class="post-entry shadow-sm">
                            <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="post-thumbnail">
                                <img src="images/<?php echo $row['image']; ?>" alt="Blog Image">
                            </a>
                            <div class="post-content">
                                <div class="post-meta">
                                    by <strong><?php echo $row['author']; ?></strong> • <?php echo date('M d, Y', strtotime($row['date'])); ?>
                                </div>
                                <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="post-title">
                                    <?php echo $row['title']; ?>
                                </a>
                                <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="read-more-btn">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='col-12 text-center'><p>No blogs found in database.</p></div>";
            }
            ?>

        </div>
    </div>
</div>

<div class="testimonial-section">
    <div class="container">
        <h2 class="fw-bold mb-5">Happy Clients</h2>
        <div class="mx-auto">
            <img src="images/person-1.png" class="client-img shadow-sm">
            <p class="testimonial-text">
                "I recently bought a custom dining set, and the craftsmanship is simply amazing. The team at Furni really understands Indian aesthetics and space requirements. Their blog is my go-to place for all my home renovation ideas!"
            </p>
            <strong class="d-block" style="font-size: 18px; color: #2f2f2f;">Priya Malik</strong>
            <span class="text-uppercase small fw-bold" style="color: #3b5d50;">Real Estate Consultant, Pune</span>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>