<?php
session_start();
include('db_connect.php');

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: index.php"); 
        } else {
            $error = "Incorrect password. Please try again!";
        }
    } else {
        $error = "Email not found. Please register first!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login </title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body { 
            background: #3b5d50; 
            height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .brand-logo {
            font-size: 30px;
            font-weight: 700;
            color: #3b5d50;
            text-align: center;
            margin-bottom: 30px;
            display: block;
            text-decoration: none;
        }

        .brand-logo span { color: #f9bf29; }

        .form-control {
            background: #f8f9fa;
            border: 2px solid #f8f9fa;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .form-control:focus {
            background: #fff;
            border-color: #3b5d50;
            box-shadow: none;
        }

        .btn-login {
            background: #3b5d50;
            color: #fff;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            border: none;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #2f4b41;
            transform: translateY(-2px);
        }

        .btn-register-outline {
            border: 2px solid #3b5d50;
            color: #3b5d50;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-register-outline:hover {
            background: #3b5d50;
            color: #fff;
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            color: #888;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            width: 40%;
            height: 1px;
            background: #ddd;
            left: 0;
            top: 50%;
        }

        .divider::after {
            content: "";
            position: absolute;
            width: 40%;
            height: 1px;
            background: #ddd;
            right: 0;
            top: 50%;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: #3b5d50;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <a href="index.php" class="brand-logo">Furni<span>.</span></a>

        <h4 class="text-center mb-4 fw-bold">Welcome Back!</h4>

        <?php if(isset($error)) echo "<div class='alert alert-danger py-2 small'>$error</div>"; ?>
        <?php if(isset($_GET['msg'])) echo "<div class='alert alert-success py-2 small'>Registration successful! Please Login.</div>"; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="small fw-bold text-muted">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
            </div>
            
            <div class="mb-4">
                <label class="small fw-bold text-muted">PASSWORD</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" name="login_btn" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Login
            </button>

            <div class="divider small text-uppercase">or</div>

            <a href="register.php" class="btn btn-register-outline">
                <i class="fas fa-user-plus me-2"></i> Create New Account
            </a>
        </form>

        <div class="back-home">
            <a href="index.php"><i class="fas fa-arrow-left me-1"></i> Back to Homepage</a>
        </div>
    </div>

</body>
</html>