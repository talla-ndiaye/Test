<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
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
          <!-- End Navbar -->
            </div>
                <!-- End Sidebar horizontale -->

                  <!-- Formulaire  -->
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Ajout</h3>
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
                  <a href="#">Quizz</a>
                </li>
                
              </ul>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Remplisez le formulaire</div>
                  </div>
                  <div class="card-body">
                    <form action="plusquizz.php" method="post" class="row">
                      <!--section Formulaire  -->
                      <div class="col-md-6 col-lg-4">
                        
                        <div class="form-group">
                          <label for="categorie"
                            >Categorie</label
                          >
                          <select
                            class="form-select"
                            id="categorie" name="categorie"
                          >
                            <option name="categorie">histoire</option>
                            <option name="categorie">education</option>
                            <option name="categorie">personge</option>
                            <option name="categorie">paysage</option>
                            <option name="categorie">culture</option>
                            <option name="categorie">sport</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="correct">La question:</label>
                          <input type="text" name="question" class="form-control" placeholder= "Metter ici votre la question .."/>
                        </div>
                       
                        <div class="form-group">
                          <label for="correct">Reponse Correcte</label>
                          <input type="text" name="correct" class="form-control" placeholder= "Metter ici votre la Réponse correct.."/>
                        </div>
                        
                      </div>
                      <!--section Formulaire  -->

                      <!--section Formulaire  -->
                      <div class="col-md-6 col-lg-4">
                        
                                  
                                  
                                  <div class="form-group">
                                    <label for="reponse1">Réponse 1</label>
                                    <input type="text" name="reponse1" class="form-control" placeholder= "Metter ici votre la Réponse.."/>
                                  </div>
                                  <div class="form-group">
                                    <label for="reponse2">Réponse 2</label>
                                    <input type="text" name="reponse2" class="form-control" placeholder= "Metter ici votre la Réponse.."/>
                                  </div>
                                  
                                  
                      </div>
                      <!--section Formulaire  -->
                      
                      <!--section Formulaire  -->
                      <div class="col-md-6 col-lg-4">
                                  <div class="form-group">
                                    <label for="reponse3">Réponse 3</label>
                                    <input type="text" name="reponse3" class="form-control" placeholder= "Metter ici votre la Réponse.."/>
                                  </div>
                                  <div class="form-group">
                                    <label for="reponse4">Réponse 4</label>
                                    <input type="text" name="reponse4" class="form-control" placeholder= "Metter ici votre la Réponse.."/>
                                  </div>
                      </div>
                      <!--section Formulaire  -->
                      <div class="card-action">
                        <button class="btn btn-success">Soummettre</button>
                        <button class="btn btn-danger">Cancel</button>
                      </div>

                      

                    </form>
                  </div>


                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Formulaire  -->

        
      </div>

      
    </div>
    
    

  </body>
</html>
