<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez vos styles personnalisés ici */
        .sidebar {
            background-color: #333;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px;
            transition: all 0.3s;
            z-index: 1;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.5);
        }

        .sidebar .nav-link.active {
            color: white;
        }

        .content {
            padding: 20px;
            transition: margin-left 0.3s;
            margin-left: 0;
        }

        @media (min-width: 768px) {
            .content {
                margin-left: 250px;
            }

            .sidebar {
                left: 0;
            }

            .sidebar.show {
                left: 250px;
            }
        }

        /* Style pour les icônes Bootstrap */
        .sidebar .nav-link .bi {
            margin-right: 5px;
        }

        /* Style pour le bouton de basculement du sidebar */
        #sidebarToggle {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.show {
                left: 0;
            }

            #sidebarToggle {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span class="bi bi-house-door"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="bi bi-people"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="bi bi-grid"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="bi bi-cart"></span>
                                Orders
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <button class="btn btn-sm btn-secondary d-md-none" id="sidebarToggle">Toggle Sidebar</button>
                </div>

                <h2>Section title</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1,001</td>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <!-- Autres lignes ici -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
            console.log("show");
        });
        document.addEventListener('DOMContentLoaded', function() {
    // Vérifie si l'état du sidebar est stocké dans localStorage
    const isSidebarShown = localStorage.getItem('sidebarShown') === 'true';

    // Met à jour la classe du sidebar en fonction de l'état stocké
    if (isSidebarShown) {
        document.querySelector('.sidebar').classList.add('show');
        console.log("show");
    }

    document.getElementById('sidebarToggle').addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('show');
        console.log("show");

        localStorage.setItem('sidebarShown', sidebar.classList.contains('show'));
    });
});

    </script>
</body>
</html>
