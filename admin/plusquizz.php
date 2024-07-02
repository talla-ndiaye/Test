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


// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données du formulaire
    $categorie = $_POST['categorie'];
    $reponse_correcte = $_POST['correct'];
    $question = $_POST['question'];
    $reponse1 = $_POST['reponse1'];
    $reponse2 = $_POST['reponse2'];
    $reponse3 = $_POST['reponse3'];
    $reponse4 = $_POST['reponse4'];

  

    // Création de la connexion
    $conn = new mysqli($servername, $dbusername, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Récupérer la date actuelle
    $date = date('M j, Y');

    // Préparation de la requête SQL pour l'insertion
    $sql = "INSERT INTO quizz (auteur, date, categorie, question, a, b, c, d, correct)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Utilisation d'une requête préparée pour sécuriser l'insertion
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $username,$date, $categorie, $question, $reponse1, $reponse2, $reponse3, $reponse4,$reponse_correcte);

    // Exécution de la requête
    if ($stmt->execute()) {
      header("Location: ./succes.html");

    } else {
        echo "Erreur lors de l'ajout du quizz : " . $stmt->error;
    }

    // Fermeture du statement et de la connexion
    $stmt->close();
    $conn->close();
}
?>
