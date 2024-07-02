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


// Créer la connexion à la base de données
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
 
    // Vérifiez et récupérez les données du formulaire
    $titre = $_POST['titre'];
    $titre2 = $_POST['titre2'];
    $titre3 = $_POST['titre3'];
    $categorie = $_POST['categorie'];
    $paragraphe1 = $_POST['paragraphe1'];
    $paragraphe2 = $_POST['paragraphe2'];
    $paragraphe3 = $_POST['paragraphe3'];
    $lien = $_POST['lien'];
    $date = date('Y-m-d H:i:s');

    // Traitez les fichiers téléchargés
    $image1 = null;
    $image2 = null;

    if (isset($_FILES['image1']) && $_FILES['image1']['error'] == 0) {
        $image1 = file_get_contents($_FILES['image1']['tmp_name']);
    }

    if (isset($_FILES['image2']) && $_FILES['image2']['error'] == 0) {
        $image2 = file_get_contents($_FILES['image2']['tmp_name']);
    }

   

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Récupérer la date actuelle
    $date = date('M j, Y');
    // Préparation de la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO blog (categorie, auteur,username, titre, date, paragraphe1, titre2, paragraphe2, titre3, paragraphe3, lien, image1, image2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssbb", $categorie, $nom_complet,$username, $titre, $date, $paragraphe1, $titre2, $paragraphe2, $titre3, $paragraphe3, $lien, $image1, $image2);

    // Exécution de la requête
    if ($stmt->execute()) {
        header("Location: ./succes.html");
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermeture de la connexion
    $stmt->close();
    $conn->close();
} else {
    echo "Méthode de requête non prise en charge.";
}
?>
