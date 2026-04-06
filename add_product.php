<?php
session_start();
require('config.php');

// फॉर्म सबमिट झाल्यावर डेटा सेव्ह करणे
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    $sql = "INSERT INTO products (name, price, category, image) VALUES ('$name', '$price', '$category', '$image')";
    
    if ($conn->query($sql)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        header("Location: manage_products.php?msg=success");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product - Furni Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <style>
        body { background-color: #eee; font-family: 'Roboto', sans-serif; display: flex; }
        .sidebar { width: 260px; background: #212121; min-height: 100vh; position: fixed; color: white; }
        .main-panel { margin-left: 260px; width: calc(100% - 260px); padding: 30px; }
        .card-form { background: white; border-radius: 6px; padding: 20px; margin-top: 50px; border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.14); }
        .header-purple { background: linear-gradient(60deg, #ab47bc, #8e24aa); border-radius: 3px; padding: 15px; margin-top: -40px; color: white; box-shadow: 0 4px 20px rgba(0,0,0,0.2); }
        .btn-purple { background: #9c27b0; color: white; border: none; padding: 10px 30px; }
        .btn-purple:hover { background: #8e24aa; color: white; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="p-4 text-center border-bottom border-secondary"><h5>FURNI ADMIN</h5></div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item"><a href="admin_panel.php" class="nav-link text-white-50"><i class="material-icons align-middle me-3">dashboard</i>Dashboard</a></li>
            <li class="nav-item"><a href="manage_products.php" class="nav-link text-white"><i class="material-icons align-middle me-3">content_paste</i>Product List</a></li>
        </ul>
    </div>

    <div class="main-panel">
        <div class="container-fluid">
            <div class="card card-form">
                <div class="header-purple">
                    <h4 class="m-0">Add New Furniture</h4>
                    <p class="m-0 small">Enter the details of the new item</p>
                </div>
                <div class="card-body mt-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="E.g. Luxury Sofa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price (₹)</label>
                                <input type="number" name="price" class="form-control" placeholder="5000" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select">
                                    <option value="Living Room">Living Room</option>
                                    <option value="Bedroom">Bedroom</option>
                                    <option value="Office">Office</option>
                                    <option value="Kitchen">Kitchen</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" name="add_product" class="btn btn-purple shadow">Save Product</button>
                            <a href="manage_products.php" class="btn btn-outline-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>