<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    <div class="sidebar" style="z-index: 1000;">
        <div class="text-center mb-4">
            <h4>Administrateur</h4>
            <p><i class="fas fa-circle text-success blink"></i> En ligne</p>
        </div>
        <hr>
        <a href="/ListUtilisateur"><i class="fas fa-users"></i>&ensp;Utilisateurs</a>
        <a href="/ListeCategorie"><i class="fas fa-list"></i>&ensp;Categories</a>
        <a href="/ListeSousCategorie"><i class="fas fa-list"></i>&ensp;Sous Categories</a>
        <a href="/ListCaracteristique"><i class="fas fa-cogs"></i>&ensp;Caracteristiques</a>
        <a href="/listep"><i class="fas fa-box-open"></i>&ensp;Produits</a>
        <a href="/tableInfoProduit"><i class="fas fa-box-open"></i>&ensp;Infos Produits</a>
        {{-- <a href="/ListLocalisation"><i class="fas fa-map-marker-alt"></i>&ensp;Localisation</a> --}}
        <a href="/listecom"><i class="fas fa-shopping-cart"></i>&ensp;Commandes</a>
        <a href="/listetraiter"><i class="fas fa-cog"></i>&ensp;Commandes Traiter</a>
        <a href="/listepublicite"><i class="fas fa-bullhorn"></i>&ensp;Publicité</a>



    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="d-flex align-items-center">
                <i class="fas fa-bars"></i>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <a href="/" class="text-decoration-none">
                    <h1 class="m-0 custom-h1"><span class="text-white font-weight-bold border px-3 mr-1">E</span> 2ncorporate</h1>
                </a>
            </div>
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/listenotif" class="nav-link"><i class="fas fa-bell" style="font-size: 1.5rem;"></i> <span class="badge badge-danger" id="nouv">0</span></a>
                    </li>
                    <li class="nav-item">
                        <div class="col-lg-1 col-1 text-right ms-5 ">
                            <form action="{{route('logout')}}" method="post">
                                @method("delete")
                                @csrf
                                <a href="#" class="nav-link"> <span class="d-none d-lg-block">  <button type="submit" style="all: unset;">Logout</button> </span> <i class="fas fa-sign-out-alt"></i></a>
                            </form>
                        </div>

                    </li>
                </ul>
                {{-- <div class="user-info">
                    <span>Admin</span>
                </div> --}}
            </nav>
        </div>

        <!-- Dynamic Content Container -->
        <div id="content-area">
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateHeader() {
                fetch('/header-data')
                    .then(response => response.json())
                    .then(data => {
                        // Mise à jour des éléments du header avec les nouvelles données
                        const titleElement = document.getElementById('nouv');

                        if (titleElement) {
                            titleElement.textContent = data.title;
                        }


                    })
                    .catch(error => console.error('Erreur:', error));
            }

            // Appeler updateHeader au chargement de la page
            updateHeader();

            // Rafraîchir les données du header toutes les 5 minutes (300000 ms)
            setInterval(updateHeader, 300);
        });
    </script>

    <script>
setInterval(() => {
    fetch("{{ route('notifications.count') }}")
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('notifCount');
            if (data.count > 0) {
                badge.innerText = data.count;
                badge.style.display = 'inline';
            } else {
                badge.style.display = 'none';
            }
        });
}, 5000); // Vérifie toutes les 5 secondes
</script>

</body>
</html>
