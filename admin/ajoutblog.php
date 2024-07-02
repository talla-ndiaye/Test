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
$sql = "SELECT nom_complet FROM blogeurs WHERE username = '$username'";
$result = $conn->query($sql);

// Vérifier si la requête a réussi
if ($result->num_rows > 0) {
    // Récupérer les données de l'utilisateur
    $row = $result->fetch_assoc();
    $nom_complet = $row['nom_complet'];
} else {
    // Gérer le cas où aucun utilisateur correspondant n'est trouvé
    $nom_complet = "iconnu";
}

// Fermer la connexion à la base de données
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta utf>
    <title>Forms - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
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
            </div>
                <!-- End Sidebar horizontale -->

                  <!-- Formulaire  -->
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Redactions</h3>
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
                  <a href="#">Ajouter un blogue</a>
                </li>
                
              </ul>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Formulaire de redaction</div>
                  </div>
                  <div class="card-body">
                                        <!--section Formulaire  -->
                    <form action="plusblog.php" method="post" class="row" enctype="multipart/form-data">

                      <div class="col-md-6 col-lg-4">
                                      
                        <div class="form-group">
                            <label for="titre">Gros titre</label>
                            <input type="text" class="form-control" name="titre" placeholder="Metter ici votre titre principale" />
                        </div>
                
                        <div class="form-group">
                            <label for="titre2">Titre secondaire</label>
                            <input type="text" class="form-control" name="titre2" placeholder="Metter ici votre titre secondaire" />
                        </div>
                
                        <div class="form-group">
                            <label for="titre3">Titre tertiaire</label>
                            <input type="text" class="form-control" name="titre3" placeholder="Metter ici votre titre tertiare" />
                        </div>
                
                        <div class="form-group">
                            <label for="categorie">Categorie</label>
                            <input type="text" class="form-control" name="categorie" placeholder="Metter ici la categorie" />
                        </div>
                
                      </div>

                      <div class="col-md-6 col-lg-4">
                                      
                      <div class="form-group">
                          <label for="paragraphe1">Paragraphe 1</label>
                          <textarea class="form-control" rows="5" name="paragraphe1"></textarea>
                      </div>
              
                      <div class="form-group">
                          <label for="paragraphe2">Paragraphe 2</label>
                          <textarea class="form-control" rows="5" name="paragraphe2"></textarea>
                      </div>
              
                      <div class="form-group">
                          <label for="paragraphe3">Paragraphe 3</label>
                          <textarea class="form-control" rows="5" name="paragraphe3"></textarea>
                      </div>
              
                      </div>

                      <div class="col-md-6 col-lg-4">
                                      
                    <div class="form-group">
                        <label for="image1">Insérer ici votre première image</label>
                        <input type="file" class="form-control-file" name="image1" />
                    </div>
            
                    <br><br>
            
                    <div class="form-group">
                        <label for="image2">Insérer ici votre seconde image</label>
                        <input type="file" class="form-control-file" name="image2" />
                    </div>
            
                    <br><br>
            
                    <div class="form-group">
                        <label for="lien">Lien de la vidéo reportage</label>
                        <input type="text" class="form-control" name="lien" placeholder="Metter ici le Lien de la video" />
                    </div>
            
                      </div>
                      <div class="card-action">
                        <button class="btn btn-success" >Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                      </div>

                    </form>
                                      <!--section Formulaire  -->
                  </div>


                  
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Formulaire  -->

        
      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>

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
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>


  </body>
</html>
