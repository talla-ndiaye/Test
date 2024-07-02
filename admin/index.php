<?php
include 'db.php';

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./Formulaire/index.html");
    exit(); // Arrêter l'exécution du script après la redirection
}

// Récupérer le nom d'utilisateur depuis la session
$username = $_SESSION['username'];

// Créer la connexion à la base de données
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparer la requête SQL pour récupérer le nom et le prénom de l'utilisateur
$sql = "SELECT nom_complet FROM blogeurs WHERE username = '$username' ";
$result = $conn->query($sql);

// Vérifier si la requête a réussi
if ($result->num_rows > 0) {
    // Récupérer les données de l'utilisateur
    $row = $result->fetch_assoc();
    $nom_complet = $row['nom_complet'];
    $_SESSION['nom_complet'] = $nom_complet;

} else {
    // Gérer le cas où aucun utilisateur correspondant n'est trouvé
    $nom_complet = "inconnu";
}

// Fermer la connexion à la base de données
$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SENEGALWEB</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <meta charset="UTF-8">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Kaiadmin JS -->
    <link rel="stylesheet" href="assets/css/kaiadmin.css" />

    
  </head>
  <body>
    <div class="wrapper">

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta utf>
    <title>Forms - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <meta charset="UTF-8">
  </head>
  <body>
    
    <div class="wrapper">
     
      <!-- Sidebar vertivale -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
              <h1 Style="color: White;">SenegalWeb<span Style="color: red;">.</span></h1>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
            
              <li class="nav-item active">
                <a data-bs-toggle="collapse" href="index.php" class="collapsed"aria-expanded="false">
                  <i class="fas fa-home"></i>
                  <p>Acceuil</p>
                  <span class="caret"></span>
                </a>
              </li>

              <li class="nav-item">
                <a  href="affichage.php">
                  <i class="fas fa-table"></i>
                  <p>Mes Publication</p>
                  <span class="caret"></span>
                </a>
                
              </li>

              <li class="nav-item">
                <a  href="affichage.php">
                  <i class="fas fa-table"></i>
                  <p>Mes Quizz</p>
                  <span class="caret"></span>
                </a>
                
              </li>

              <li class="nav-item">
                <a  href="ajoutblog.php">
                  <i class="fas fa-pen-square"></i>
                  <p>Ajouter un blogue</p>
                  <span class="caret"></span>
                </a>
                
              </li>

              <li class="nav-item">
                <a  href="supprimer.php">
                  <i class="fas fa-pen-square"></i>
                  <p>Supprimer un blogue</p>
                  <span class="caret"></span>
                </a>
                
              </li>

              <li class="nav-item">
                <a  href="modifierblog.php">
                  <i class="fas fa-pen-square"></i>
                  <p>Modifier un blog</p>
                  <span class="caret"></span>
                </a>
                
              </li>

              <li class="nav-item">
                <a  href="ajoutquizz.php">
                  <i class="fas fa-pen-square"></i>
                  <p>Ajouter un quizz</p>
                  <span class="caret"></span>
                </a>
                
              </li>

              
                
              </li>

              <li class="nav-item">
                <a  href="supprimer.php">
                  <i class="fas fa-pen-square"></i>
                  <p>Supprimer un quizz</p>
                  <span class="caret"></span>
                </a>
                
              </li>

            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar Verticale -->
      

      <div class="main-panel">

              <!-- End Sidebar horizontale -->
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" >
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <h1 Style="color: Black;">Bienvenue</h1>
              </nav>
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?php echo "$username"?></span>
                    </span>
                  </a>
                  
                  <!-- voir le profil-->
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>Talla</h4>
                            <p class="text-muted">hello@esp.sn</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Mon Profil</a>
                        <a class="dropdown-item" href="#">Messagerie</a>
                        <a class="dropdown-item" href="#">Paramètre </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Se Déconnetre</a>
                      </li>
                    </div>
                  </ul>
                  <!-- voir le profil-->

                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
          <!-- End Navbar -->
        </div>
            <!-- End Sidebar horizontale -->

        <div class="container">
          <div class="page-inner">

            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Gestion des blogues</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">

                <a href="ajoutblog.html" class="btn btn-success btn-round">Ajouter un blogue </a>
                <a href="supprimer.html" class="btn btn-danger btn-round">Supprimer une blogue</a>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total des blogues</p>
                          <h4 class="card-title">100</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Mes Blogues</p>
                          <h4 class="card-title">11</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Nombres de categories</p>
                          <h4 class="card-title">11</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Réactions</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="page-inner">

            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Gestion des quizz</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="ajoutquizz.html" class="btn btn-success btn-round">Ajouter un quizz </a>
                <a href="supprimer.html" class="btn btn-danger btn-round">Supprimer un quizz</a>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total des quizz</p>
                          <h4 class="card-title">100</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Mes Quizz</p>
                          <h4 class="card-title">10</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Nombre de Categories</p>
                          <h4 class="card-title">6</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Réactions</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        
      </div>

     
    </div>

  </body>
</html>
