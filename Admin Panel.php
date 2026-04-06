<?php
session_start();
require('config.php');

// १. डेटाबेसमधून खरी आकडेवारी मिळवणे
$total_orders = $conn->query("SELECT COUNT(id) as total FROM orders")->fetch_assoc()['total'] ?? 0;
$total_revenue = $conn->query("SELECT SUM(total_amt) as total FROM orders")->fetch_assoc()['total'] ?? 0;
$total_messages = $conn->query("SELECT COUNT(id) as total FROM contact_messages")->fetch_assoc()['total'] ?? 0;
$recent_orders = $conn->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Admin Dashboard - Furni</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body { background-color: #eee; font-family: 'Roboto', sans-serif; margin: 0; display: flex; }
        
        /* Sidebar Styling */
        .sidebar { width: 260px; background: #212121; min-height: 100vh; position: fixed; color: white; z-index: 100; box-shadow: 4px 0 10px rgba(0,0,0,0.3); }
        .sidebar-header { padding: 25px; text-align: center; border-bottom: 1px solid #333; font-weight: bold; font-size: 20px; color: #fff; letter-spacing: 1px; }
        .sidebar ul { list-style: none; padding: 0; margin-top: 20px; }
        .sidebar ul li { margin-bottom: 5px; }
        .sidebar ul li a { padding: 12px 25px; display: block; color: #bbb; text-decoration: none; transition: 0.3s; font-size: 14px; border-radius: 4px; margin: 0 15px; }
        
        /* Active Link Styling */
        .sidebar ul li.active a { background: #9c27b0; color: white; box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
        .sidebar ul li a:hover:not(.active) { background: rgba(255,255,255,0.1); color: #fff; }
        .sidebar ul li a i { vertical-align: middle; margin-right: 15px; font-size: 20px; }

        /* Main Panel */
        .main-panel { margin-left: 260px; width: calc(100% - 260px); padding: 30px; min-height: 100vh; }

        /* Floating Card Styling */
        .card-stats { background: white; border-radius: 6px; position: relative; padding: 15px; margin-top: 40px; border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.14); }
        .card-icon { border-radius: 3px; padding: 20px; position: absolute; top: -25px; left: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); }
        .card-icon i { font-size: 36px; color: white; }
        
        .orange { background: linear-gradient(60deg, #ffa726, #fb8c00); }
        .green { background: linear-gradient(60deg, #66bb6a, #43a047); }
        .red { background: linear-gradient(60deg, #ef5350, #e53935); }
        .blue { background: linear-gradient(60deg, #26c6da, #00acc1); }

        .card-content { text-align: right; }
        .card-category { color: #999; font-size: 14px; margin: 0; }
        .card-title { color: #3c4858; font-size: 25px; font-weight: 500; }

        /* Chart Cards */
        .card-chart { margin-top: 50px; border: none; border-radius: 6px; box-shadow: 0 1px 4px rgba(0,0,0,0.14); background: white; padding: 15px; }
        .chart-header { border-radius: 3px; padding: 15px; margin-top: -40px; margin-bottom: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); }

        /* Table Styling */
        .table-card { background: white; border-radius: 6px; padding: 20px; margin-top: 40px; box-shadow: 0 1px 4px rgba(0,0,0,0.14); }
        .table thead th { color: #9c27b0; border: none; font-size: 14px; text-transform: uppercase; padding: 12px; }
        .table tbody td { padding: 12px; border-bottom: 1px solid #eee; font-size: 14px; color: #555; }
        
        /* Badge for Notifications */
        .notification-badge { background: #f44336; color: white; border-radius: 50%; padding: 2px 6px; font-size: 10px; position: absolute; right: 25px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">FURNI ADMIN</div>
        <ul>
            <li class="active">
                <a href="admin_panel.php"><i class="material-icons">dashboard</i> Dashboard</a>
            </li>
            <li>
                <a href="user_profile.php"><i class="material-icons">person</i> User Profile</a>
            </li>
            <li>
                <a href="manage_products.php"><i class="material-icons">content_paste</i> manage_products</a>
            </li>
            <li>
                <a href="view_messages.php">
                    <i class="material-icons">notifications</i> Notifications 
                    <?php if($total_messages > 0): ?>
                        <span class="notification-badge"><?php echo $total_messages; ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="mt-5">
                <a href="logout.php" style="color: #ef5350;"><i class="material-icons">logout</i> Logout</a>
            </li>
        </ul>
    </div>

    <div class="main-panel">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-icon orange"><i class="material-icons">shopping_cart</i></div>
                        <div class="card-content">
                            <p class="card-category">Total Orders</p>
                            <h3 class="card-title"><?php echo $total_orders; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-icon green"><i class="material-icons">payments</i></div>
                        <div class="card-content">
                            <p class="card-category">Revenue</p>
                            <h3 class="card-title">₹<?php echo number_format($total_revenue, 2); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-icon blue"><i class="material-icons">message</i></div>
                        <div class="card-content">
                            <p class="card-category">Messages</p>
                            <h3 class="card-title"><?php echo $total_messages; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-icon red"><i class="material-icons">people</i></div>
                        <div class="card-content">
                            <p class="card-category">Customers</p>
                            <h3 class="card-title">+45</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="chart-header green"><canvas id="dailySalesChart" height="180"></canvas></div>
                        <div class="card-body">
                            <h4 class="card-title">Daily Sales</h4>
                            <p class="card-category">Sales Performance (Weekly)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="chart-header orange"><canvas id="emailsChart" height="180"></canvas></div>
                        <div class="card-body">
                            <h4 class="card-title">Order Growth</h4>
                            <p class="card-category">Monthly Order Comparison</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="chart-header red"><canvas id="tasksChart" height="180"></canvas></div>
                        <div class="card-body">
                            <h4 class="card-title">Completed Tasks</h4>
                            <p class="card-category">Project Delivery Status</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-card shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-light m-0">Recent Orders (Furni Project)</h4>
                            <a href="add_product.php" class="btn btn-sm btn-success me-2">
                          <i class="material-icons align-middle"style="font: size 18px;">add</i>Add Product
                         </a>
                         <a href="manage_products.php" class="btn btn-sm btn-outline-primary">View All Orders</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = $recent_orders->fetch_assoc()) { ?>
                                    <tr>
                                        <td>#<?php echo $row['id']; ?></td>
                                        <td><?php echo $row['full_name']; ?></td>
                                        <td class="fw-bold">₹<?php echo number_format($row['total_amt'], 2); ?></td>
                                        <td><span class="badge bg-success">PAID</span></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="text-center mt-5 text-muted small pb-4">
                &copy; 2026 Furni Dashboard - Created by Pragati Nirali
            </footer>
        </div>
    </div>

    <script>
        const chartOptions = { 
            responsive: true, 
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { display: false }, x: { ticks: { color: '#fff' }, grid: { display: false } } }
        };

        new Chart(document.getElementById('dailySalesChart'), {
            type: 'line',
            data: { labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'], datasets: [{ data: [12, 17, 7, 17, 23, 18, 38], borderColor: '#fff', tension: 0.4 }] },
            options: chartOptions
        });

        new Chart(document.getElementById('emailsChart'), {
            type: 'bar',
            data: { labels: ['J', 'F', 'M', 'A', 'M', 'J'], datasets: [{ data: [542, 443, 320, 780, 553, 453], backgroundColor: '#fff' }] },
            options: chartOptions
        });

        new Chart(document.getElementById('tasksChart'), {
            type: 'line',
            data: { labels: ['12p', '3p', '6p', '9p', '12a'], datasets: [{ data: [230, 750, 450, 300, 280], borderColor: '#fff', tension: 0.4 }] },
            options: chartOptions
        });
    </script>
</body>
</html>