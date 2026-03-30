<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Administration Responsive</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #14363b;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            color: #ecf0f1;
        }
        
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #14363b;
        }
        .sidebar .dropdown-menu {
            background-color: #14363b;
            border: none;
        }

        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #14363b;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .navbar {
            background-color: transparent;
            padding: 0;
        }
        .header .navbar-nav {
            flex-direction: row;
        }
        .header .navbar-nav .nav-item {
            margin-right: 20px;
        }
        .header .navbar-nav .nav-item .nav-link {
            color: white;
        }
        .card {
            margin-bottom: 20px;
            border: none;
        }
        .card h5 {
            font-size: 18px;
            font-weight: bold;
        }
        .card .card-body {
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card .icon {
            font-size: 30px;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .user-info img {
            border-radius: 50%;
            width: 40px;
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            .header .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
            }
        }
            @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blink {
            animation: blink 1s linear infinite;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4">
            {{-- <img src="https://via.placeholder.com/50" alt="Profile Image" class="rounded-circle"> --}}
            <h4>Secretaire</h4>
            <p><i class="fas fa-circle text-success blink"></i> Online</p>
        </div>
        <hr>
        <hr>
        <a href="#"><i class="fas fa-list"></i>&ensp;Commandes</a>
        <a href="#"><i class="bi bi-graph-up icon-button"></i>&ensp;Ventes</a>
        <a href="#"><i class="bi bi-cart fs-3"></i>&ensp;Achats</a>

        <a href="#"><i class="fas fa-credit-card"></i>&ensp;Autres</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="d-flex align-items-center">
                <i class="fas fa-bars"></i>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 custom-h1"><span class="text-white font-weight-bold border px-3 mr-1">E</span> 2ncorporate</h1>
                </a>  
            </div>
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-bell"></i> <span class="badge badge-danger">2</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"> LogOut <i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
                <div class="user-info">
                    <span>Secretaire</span>
                </div>
            </nav>
        </div>

        <!-- Dashboard Cards -->
        <div class="row mt-4">
            <div class="col-lg-2 col-md-4 col-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <div>
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div>
                            <h5>1805</h5>
                            <p>Commandes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
                    
