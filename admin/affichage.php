<?php
session_start();
include "db.php";
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username']) AND !isset($_SESSION['nom_complet'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./Formulaire/index.html");
    exit(); // Arrêter l'exécution du script après la redirection
}

// Récupérer le nom d'utilisateur depuis la session
$nom_complet = $_SESSION['nom_complet'];
$username = $_SESSION['username'];


// Création de la connexion
$conn = new mysqli($servername, $dbusername, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour sélectionner tous les blogs
$sql1 = "SELECT id, titre, categorie, date FROM blog";
$result1 = $conn->query($sql1);

$sql2 = "SELECT id,categorie,question, correct  FROM quizz";
$result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datatables - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    
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

    

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
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
            
            <div class="page-header">
              <h3 class="fw-bold mb-3">Historiques</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Acceuil</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#"> Historiques</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Tables des mes publications</h4>
                  </div>

                    <!-- End Custom template -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Category</th>
                            <th>Date de publication</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Category</th>
                            <th>Date de publication</th>
                          </tr>
                        </tfoot>
                        <tbody>

                        <?php
                            // Afficher les données de chaque blog
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["titre"] . "</td>";
                                    echo "<td>" . $row["categorie"] . "</td>";
                                    echo "<td>" . $row["date"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Aucun blog trouvé</td></tr>";
                            }
                            ?>
                          
                        </tbody>
                      </table>
                       <!-- End Custom template -->

                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Tables des Quizz</h4>
                  </div>

                    <!-- End Custom template -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Categorie</th>
                            <th>Question</th>
                            <th>Réponse</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Categorie</th>
                            <th>Question</th>
                            <th>Réponse</th>
                          </tr>
                        </tfoot>
                        <tbody>

                        <?php
                            // Afficher les données de chaque blog
                            if ($result2->num_rows > 0) {
                                while ($row = $result2->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["categorie"] . "</td>";
                                    echo "<td>" . $row["question"] . "</td>";
                                    echo "<td>" . $row["correct"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Aucun blog trouvé</td></tr>";
                            }
                            ?>
                          
                          
                        </tbody>
                      </table>
                       <!-- End Custom template -->

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
