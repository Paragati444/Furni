<?php
session_start();
require('config.php'); 

// १. डेटाबेसमधून लॉगिन असलेल्या ॲडमिनची माहिती काढणे (Optional: जर तुला डायनॅमिक हवं असेल तर)
// समजा तुझ्या 'users' टेबलमध्ये ॲडमिनचा डेटा आहे.
$admin_name = "Monalisa Panda";
$admin_email = "monalisa@furni.com";
$admin_title = "CEO / CO-FOUNDER";
$admin_bio = "Hi! I'm Monalisa, a web developer working on the Furni E-commerce project.";
$admin_about_me = "Software Developer specializing in Full Stack Web Development.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Furni Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    
    <style>
        body { background-color: #eee; font-family: 'Roboto', sans-serif; margin: 0; display: flex; }
        
        /* Sidebar Styling */
        .sidebar { width: 260px; background: #212121; min-height: 100vh; position: fixed; color: white; z-index: 1000; box-shadow: 4px 0 10px rgba(0,0,0,0.3); }
        .sidebar-header { padding: 25px; text-align: center; border-bottom: 1px solid #333; font-weight: bold; font-size: 20px; color: #fff; }
        .sidebar ul { list-style: none; padding: 0; margin-top: 20px; }
        .sidebar ul li { margin-bottom: 5px; }
        .sidebar ul li a { padding: 12px 25px; display: block; color: #bbb; text-decoration: none; transition: 0.3s; font-size: 14px; border-radius: 4px; margin: 0 15px; }
        
        /* Active Link */
        .sidebar ul li.active a { background: #9c27b0; color: white; box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
        .sidebar ul li a:hover:not(.active) { background: rgba(255,255,255,0.1); color: #fff; }
        .sidebar ul li a i { vertical-align: middle; margin-right: 15px; font-size: 20px; }

        /* Main Panel */
        .main-panel { margin-left: 260px; width: calc(100% - 260px); padding: 30px; min-height: 100vh; }

        /* Profile Cards */
        .card-edit { background: white; border-radius: 6px; position: relative; padding: 20px; margin-top: 50px; border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.14); }
        .card-header-purple { background: linear-gradient(60deg, #ab47bc, #8e24aa); border-radius: 3px; padding: 15px; margin-top: -40px; margin-bottom: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); color: white; }
        
        .profile-card { text-align: center; background: white; border-radius: 6px; box-shadow: 0 1px 4px rgba(0,0,0,0.14); padding: 30px; margin-top: 80px; }
        .profile-photo-container { margin-top: -80px; }
        .profile-photo-container img { width: 130px; height: 130px; border-radius: 50%; border: 5px solid white; box-shadow: 0 4px 15px rgba(0,0,0,0.2); object-fit: cover; }
        
        .btn-purple { background-color: #9c27b0; color: white; border: none; padding: 10px 25px; border-radius: 4px; }
        .btn-purple:hover { background-color: #8e24aa; color: white; box-shadow: 0 4px 10px rgba(156, 39, 176, 0.3); }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">FURNI ADMIN</div>
        <ul>
            <li>
                <a href="admin_panel.php"><i class="material-icons">dashboard</i> Dashboard</a>
            </li>
            <li class="active">
                <a href="user_profile.php"><i class="material-icons">person</i> User Profile</a>
            </li>
            <li>
                <a href="manage_products.php"><i class="material-icons">content_paste</i> Manage Products</a>
            </li>
            <li>
                <a href="logout.php"><i class="material-icons">logout</i> Logout</a>
            </li>
        </ul>
    </div>

    <div class="main-panel">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-8">
                    <div class="card card-edit shadow-sm">
                        <div class="card-header-purple">
                            <h4 class="mb-1">Edit Profile</h4>
                            <p class="mb-0 small text-white-50">Complete your profile details</p>
                        </div>
                        <div class="card-body mt-3">
                            <form>
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label text-muted small fw-bold">Company</label>
                                        <input type="text" class="form-control bg-light" value="Furni Inc." disabled>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label text-muted small fw-bold">Username</label>
                                        <input type="text" class="form-control" value="<?php echo $admin_name; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label text-muted small fw-bold">Email address</label>
                                        <input type="email" class="form-control" value="<?php echo $admin_email; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label text-muted small fw-bold">About Me</label>
                                        <textarea class="form-control" rows="4"><?php echo $admin_about_me; ?></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-purple shadow">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="profile-card">
                        <div class="profile-photo-container">
                            <img src="images/person-1.jpg" alt="Admin Profile Photo">
                        </div>
                        <p class="text-muted small mt-2 fw-bold text-uppercase"><?php echo $admin_title; ?></p>
                        <h4 class="profile-card-title text-dark"><?php echo $admin_name; ?></h4>
                        <p class="profile-card-bio mt-2"><?php echo $admin_bio; ?></p>
                        <button class="btn btn-purple rounded-pill px-4 mt-3">Follow</button>
                    </div>
                </div>

            </div>

            <footer class="text-center mt-5 text-muted small">
                &copy; 2026 Furni Admin - Dashboard Design by Pragati
            </footer>
        </div>
    </div>

</body>
</html>