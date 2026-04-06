<?php
session_start();
require('config.php');

// डेटाबेसमधून सर्व फर्निचर प्रॉडक्ट्स मिळवणे
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Furni Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    
    <style>
        body { background-color: #eee; font-family: 'Roboto', sans-serif; margin: 0; display: flex; }
        .sidebar { width: 260px; background: #212121; min-height: 100vh; position: fixed; color: white; z-index: 100; }
        .sidebar-header { padding: 20px; text-align: center; border-bottom: 1px solid #333; font-weight: bold; font-size: 20px; }
        .sidebar ul { list-style: none; padding: 0; margin-top: 20px; }
        .sidebar ul li a { padding: 15px 25px; display: block; color: #bbb; text-decoration: none; font-size: 14px; }
        .sidebar ul li.active a { background: #9c27b0; color: white; border-radius: 4px; margin: 0 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
        .sidebar ul li a i { vertical-align: middle; margin-right: 15px; font-size: 20px; }

        .main-panel { margin-left: 260px; width: calc(100% - 260px); padding: 30px; }
        
        /* Material Table Card */
        .table-card { background: white; border-radius: 6px; position: relative; padding: 20px; margin-top: 50px; border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.14); }
        .table-header-purple { background: linear-gradient(60deg, #ab47bc, #8e24aa); border-radius: 3px; padding: 15px; margin-top: -40px; margin-bottom: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); color: white; }
        
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; }
        .btn-add { background: #4caf50; color: white; border: none; padding: 10px 20px; border-radius: 4px; margin-bottom: 20px; display: inline-flex; align-items: center; text-decoration: none; }
        .btn-add i { margin-right: 8px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">FURNI ADMIN</div>
        <ul>
            <li><a href="admin_panel.php"><i class="material-icons">dashboard</i> Dashboard</a></li>
            <li><a href="user_profile.php"><i class="material-icons">person</i> User Profile</a></li>
            <li class="active"><a href="manage_products.php"><i class="material-icons">content_paste</i> Table List</a></li>
            <li><a href="logout.php"><i class="material-icons">logout</i> Logout</a></li>
        </ul>
    </div>

    <div class="main-panel">
        <div class="container-fluid">
            
            <a href="add_product.php" class="btn-add shadow">
                <i class="material-icons">add</i> Add New Furniture
            </a>

            <div class="table-card">
                <div class="table-header-purple shadow">
                    <h4 class="mb-1">Product Inventory</h4>
                    <p class="mb-0">Manage your furniture listings and stock</p>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover mt-3">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $products->fetch_assoc()) { ?>
                            <tr>
                                <td>#<?php echo $row['id']; ?></td>
                                <td><img src="images/<?php echo $row['image']; ?>" class="product-img shadow-sm"></td>
                                <td class="fw-bold"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['category'] ?? 'Furniture'; ?></td>
                                <td class="text-success fw-bold">₹<?php echo number_format($row['price'], 2); ?></td>
                                <td>
                                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="text-primary me-2"><i class="material-icons">edit</i></a>
                                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" 
   class="text-danger" 
   onclick="return confirm('Are you shore delete your product?')">
   <i class="material-icons">delete</i>
</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>